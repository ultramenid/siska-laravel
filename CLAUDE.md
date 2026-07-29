# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## CLAUDE.md maintenance

Keep this file current as the project evolves. Whenever you add, remove, or significantly change any of the following, update this file in the same change set:

- Technology stack, framework/library versions, build tools, package managers, or external services
- Common commands for setup, development, build, linting, testing, deployment, or running a single test
- High-level architecture, request/data flow, route organization, authentication/authorization model, or background jobs
- Major domain concepts, roles, permissions, business logic, database tables, seed data, or integrations
- Repository-specific conventions that future Claude Code sessions need to know

Do not update this file for trivial implementation details, one-off bug fixes, generated files, or file lists that are obvious from the repository tree. Prefer concise, durable guidance over chronological notes.

## Project overview

SISKA is a Laravel 13 / PHP 8.3+ (running 8.4) application for plantation and palm-oil information in Kalimantan Tengah, using Livewire 4 and Tailwind CSS 4. It is primarily a Blade/Livewire app: Laravel routes render Blade pages, Livewire handles login and the interactive data table, and most charts/maps are inline JavaScript in Blade templates.

The project was upgraded from Laravel 9 / Livewire 2 / Tailwind 3. `UPGRADE-LARAVEL-13.md` is a point-in-time log of that upgrade, not a description of current state — its version numbers are already stale. Trust `composer.json` / `package.json` instead.

## Common commands

### Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

The default environment uses MySQL (`DB_CONNECTION=mysql`). Seeders currently do not populate domain data.

### Development

```bash
php artisan serve
npm run dev
```

Run the Laravel server and Vite dev server in separate terminals.

### Build

```bash
npm run build
```

### Tests

```bash
php artisan test
vendor/bin/phpunit
php artisan test --filter ExampleTest
vendor/bin/phpunit tests/Feature/ExampleTest.php
```

`phpunit.xml` configures the test environment with array cache/mail drivers, sync queue, array session driver, and lower bcrypt rounds. SQLite in-memory settings exist but are commented out.

### Useful Laravel commands

```bash
php artisan migrate
php artisan tinker
composer dump-autoload
php artisan vendor:publish --force --tag=livewire:assets --ansi
```

`composer dump-autoload` triggers Laravel package discovery and republishes Livewire assets via Composer scripts.

## Architecture

### Routing and request flow

Web routes are defined in `routes/web.php`; `routes/api.php` only contains the default Sanctum-protected `/api/user` route.

Important web routes:

- `/` → `IndexController@index` → `frontends.index`; the controller also passes `$sawit`, the latest-year headline figures queried from `tbsawit`
- `/tentang` → `TentangController@index` → `frontends.siska`
- `/map` → `PetaDataController@index` → `frontends.map`
- `/data` → `DataController@index` → `frontends.data` with `<livewire:table-sawit />`
- `/dashboard/sawit` → `sawitController@index` → `frontends.sawit` (the chart page)
- `/login` → closure redirecting to `/` with `openLogin` flashed; kept only so old links and bookmarks still resolve (see "Authentication pattern")
- `/dashboard/sawit/pabrik` → closure redirecting to `/dashboard/sawit`; the pabrik content is now a section on the sawit dashboard
- `/logout` → closure that flushes the session and redirects to `/`

`php artisan route:list --except-vendor` shows 9 routes total. `TentangController@tim`/`@faq` and `PetaDataController@daftaristilah` were removed, but their views (`frontends/tim`, `frontends/faq`, `frontends/daftaristilah`) are still on disk and unreachable. `frontends/daftaristilah.blade.php` in particular is a substantial glossary worth re-routing rather than deleting; it still uses the pre-redesign markup and would need restyling first.

The codebase uses a traditional Laravel MVC shape, but domain queries are mostly direct query-builder calls rather than Eloquent models or service classes.

### Data model and database access

The only Eloquent model present is `app/Models/User.php`. Plantation dashboard data uses the `tbsawit` table directly via `DB::table(...)`.

Key database files:

- `database/migrations/2014_10_12_000000_create_users_table.php` creates users with `username`, `email`, and `password`.
- `database/migrations/2023_08_23_191130_table_sawit.php` creates `tbsawit` with yearly plantation metrics such as area, production, productivity, farmers, commodity, province, and source metadata.
- `database/seeders/DatabaseSeeder.php` has no active seed data.

Important flows:

- `/data` renders `frontends.data`, then `app/Http/Livewire/TableSawit.php` queries `tbsawit` for paginated/sortable table output.
- Dashboard chart pages use `app/Http/Controllers/sawitController.php`, which builds arrays from `tbsawit`, JSON-encodes them, and passes strings to Blade for Highcharts.
- Login uses `app/Http/Livewire/LoginComponent.php`, queries `users` by `username`, verifies the password with `Hash::check`, and stores `username` in the session.

### Authentication pattern

Authentication is custom session-based login, not the standard Laravel guard flow. Templates and controllers check `session('username')` to decide login state.

**Login is a modal, not a page.** `resources/views/partials/login-modal.blade.php` is included once by `layouts.indexLayout`, so it is available on every page, and it wraps `<livewire:login-component />`. Open it from anywhere with Alpine:

```blade
<button type="button" x-on:click="$dispatch('open-login')">Masuk</button>
```

The guarded-page flow is:

1. A controller with no `session('username')` stores `session(['url.intended' => request()->getRequestUri()])` and renders the current page with an `openLogin` flag.
2. `partials/login-modal.blade.php` reads both the `openLogin` session flash (for `/login` bookmarks) and the per-page `$openLogin` variable (`x-data="{ open: @js((bool) session('openLogin') || ($openLogin ?? false)) }")`.
3. `LoginComponent::login()` redirects to `session()->pull('url.intended', '/')`, so the user lands back where they were headed.

Follow that pattern when guarding a new route — do not redirect to `/login`, which only exists as a bookmark-compatibility redirect, and do not redirect to `/` just to show the modal. `tests/Feature/LoginModalTest.php` covers the whole flow.

Two things in this flow are load-bearing and easy to undo by accident:

- **Store a relative URI, not `url()->current()`.** An absolute URL is built from the app's configured host/port, which need not match the host actually being served (e.g. `php artisan serve --port=…`). The login redirect then points at a dead origin.
- **`LoginComponent::login()` must not use `navigate: true`.** `session()->regenerate()` issues a new session cookie, and `wire:navigate`'s client-side fetch can race it — the target page sees the pre-login session and bounces straight back to the modal. The symptom is subtle: you end up logged in, but on `/` instead of the page you asked for. A plain `$this->redirect($intended)` does a full page load and is correct here. This is not reproducible in `Livewire::test()`; it only shows up in a real browser.

There is a custom `app/Http/Middleware/dashboardMiddleware.php`, but it is referenced by no other file; do not assume it protects routes unless you wire it up explicitly. Middleware now goes in the `withMiddleware()` closure in `bootstrap/app.php`, which is currently empty.

### Views and frontend structure

Main layout:

- `resources/views/layouts/indexLayout.blade.php`

Most frontend pages live in `resources/views/frontends`, extend `layouts.indexLayout`, define `@section('content')`, and use shared nav/footer partials from `resources/views/partials`.

Every content page follows the same skeleton, and the nav include must stay inside `@section('content')` — the layout does not render it, and `frontends/map.blade.php` depends on nav being a flex sibling of the map wrapper:

```blade
@extends('layouts.indexLayout')

@section('content')
    <div class="min-h-screen flex flex-col">
        @include('partials.nav')
        <main id="content" class="flex-1">...</main>
        @include('partials.footer')
    </div>
@endsection
```

The layout loads:

- Google fonts: Archivo, IBM Plex Sans, IBM Plex Mono
- Vite entries: `resources/css/app.css`, `resources/js/app.js`
- Livewire styles/scripts
- `partials.login-modal`
- `@stack('head')` for page-specific CSS/JS, and `@stack('script')` for page-specific scripts

**Third-party JS is per-page, not global.** Leaflet, jQuery and Highcharts used to load on every page; they now load only where they are used, via `@push('head')` / `@push('script')` in `frontends/map.blade.php` and `frontends/sawit.blade.php`. Swiper was removed entirely (nothing used it). If you add a page that needs one of these, push it from that page. `public/js/wms.js` needs both jQuery and Leaflet loaded before it.

`resources/js/app.js` is empty. Alpine is still available on every page: Livewire bundles it and the layout loads `@livewireScripts`. Livewire bundles every Alpine plugin except `@alpinejs/ui`, so `x-collapse`, `x-trap` and friends work without extra setup — the login modal relies on `x-trap.noscroll`. The `alpinejs` entry in `package.json` is unused — do not add a separate Alpine script or import, it will conflict with Livewire's copy.

Livewire components (v4, but `config/livewire.php` keeps `class_namespace` at the legacy `App\Http\Livewire` rather than the v4 default `App\Livewire`):

- `app/Http/Livewire/LoginComponent.php` + `resources/views/livewire/login-component.blade.php` (rendered inside `partials/login-modal.blade.php`)
- `app/Http/Livewire/TableSawit.php` + `resources/views/livewire/table-sawit.blade.php`
- `resources/views/livewire/pagination.blade.php`, the custom paginator view referenced by `$sawit->links('livewire.pagination')`

`TableSawit::sortingField($field)` accepts any column name, and the table view drives every column header through it from a `$columns` array — add a column there rather than hand-writing another `<th>`.

## Design system

`resources/css/app.css` holds the whole design system. Its direction is "cadastral survey" — plot registers and surveyor's field books — so: hairline rules over shadows, `rounded-sm` (2px) at most, mono figures, and paper/ink surfaces.

- **Tokens** are Tailwind v4 `@theme` entries, used as normal utilities (`bg-ink`, `text-cpo`, `border-rule`): `ink` `#132822`, `ink-soft`, `ink-line`, `paper` `#f4f5f2`, `paper-dim`, `teal` `#009180` (agency brand), `teal-deep`, `teal-wash`, `cpo` `#c8761e` (crude-palm-oil orange, the data accent), `cpo-wash`, `clay` `#a8422a` (damaged crop / alerts), `rule`, `muted`.
- **Fonts**: `font-display` Archivo (headings only), `font-sans` IBM Plex Sans (body, the default), `font-mono` IBM Plex Mono (all numbers, labels, eyebrows, buttons).
- **Component classes**: `.annot` / `.annot-label` / `.annot-rule` / `.annot-value` (with `.annot-invert` on ink) is the signature device — a mono label and a mono measurement joined by a dashed hairline. It heads most sections and should always carry a real figure or provenance, never a decorative one. Also `.sect-title`, `.card`, `.btn` / `.btn-ghost`, `.field` / `.field-label`, `.figure` (mono + tabular-nums, put it on every number), `.bg-survey`, `.reveal` (entry animation, stagger with `style="--d:120ms"`).

Prefer these tokens and classes over inline `style="background-color: #009180"`, which the pre-redesign templates used throughout. Reduced motion is handled globally in the base layer — do not add per-component media queries. Numbers are formatted Indonesian-style: `number_format($v, 0, ',', '.')`.

### Charts and maps

Chart pages use inline Highcharts scripts in Blade. Controllers prepare JSON strings, and Blade parses them in JavaScript. The charts were consolidated into a single page — `resources/views/frontends/sawit.blade.php` (served by `/dashboard/sawit`) now holds all of them, built on shared `areaDefaults` / `splineDefaults` option objects. The old per-topic chart views (`pengusahaan`, `perkebunanbesar`, `perkebunanrakyat`, `mutasitanaman`, `mutasitanamanrakyat`) no longer exist.

The map implementation is inline in `resources/views/frontends/map.blade.php`. It uses Leaflet with ArcGIS base tiles, reset-view and minimap controls, and WMS overlays from a GeoServer endpoint. `public/js/wms.js` defines the custom `L.tileLayer.betterWms` behavior for clickable/queryable WMS layers.

### Frontend assets and build tooling

Vite is configured in `vite.config.mjs` (ESM; `package.json` sets `"type": "module"`) with these inputs:

- `resources/css/app.css`
- `resources/js/app.js`

Tailwind CSS 4 has no `tailwind.config.js`. It is wired through the `@tailwindcss/vite` plugin, and configured inside `resources/css/app.css` via `@import 'tailwindcss'` plus an `@theme` block. `postcss.config.js` uses `@tailwindcss/postcss`. There is no `autoprefixer` — v4 handles it.

Static assets are served from `public`, especially:

- `public/assets`
- `public/assets/v1`
- `public/js`
- `public/css`

Blade templates reference images with `asset('assets/...')` or `asset('assets/v1/...')`. Vite handles the app CSS/JS entrypoints; map/chart dependencies come from CDNs or `public`, pushed per-page rather than loaded globally.

Note that `public/assets/v1/perkebunanrakyat.png` and `public/assets/v1/pekerbunanbesar.png` are referenced by the leftover pre-redesign views but **do not exist on disk**. Check any `asset()` path against a real file before using it.

## Repository notes

- `sawitController` is intentionally named with a lowercase initial letter in the current code; match existing references if editing it.
- The Laravel 9 skeleton files survived the upgrade and are still on disk: `app/Http/Kernel.php`, `app/Console/Kernel.php`, `app/Exceptions/Handler.php`. The app boots through `bootstrap/app.php` (`Application::configure()`), so treat those as leftovers rather than the place to make changes.
- Service providers are still declared in `config/app.php`; there is no `bootstrap/providers.php`.
- Laravel Boost is installed (`laravel/boost` v2, `laravel/mcp`) and exposed over MCP. Prefer its tools — `search-docs`, `database-schema`, `database-query`, `application-info` — over manual equivalents. The `<laravel-boost-guidelines>` block at the bottom of this file is Boost-generated; do not hand-edit it, it is overwritten by `boost:install`. `AGENTS.md` is the same generated block.
- `LoginController` and `FrontendDashboardController` were deleted: login is a modal, and all five `FrontendDashboardController` methods pointed at views that do not exist. `resources/views/partials/navMobile.blade.php` was deleted too (nothing included it; `partials/nav.blade.php` carries its own mobile menu).
- `frontends/tim.blade.php`, `frontends/faq.blade.php` and `frontends/daftaristilah.blade.php` are unrouted leftovers still using the old markup. The tim/FAQ content is already covered by `frontends/siska.blade.php`.
- The `/dashboard/sawit` chart data contract is brittle: `sawitController` `json_encode`s six arrays that `frontends/sawit.blade.php` reads via `JSON.parse('<?php echo $var; ?>')`. The area charts have no x-axis categories and depend on `plotOptions.series.pointStart: 2010`; the spline charts depend on `xAxis.categories`. Keep the container IDs and variable names in sync when editing either file.
- `tests/Feature/LoginModalTest.php` uses `DatabaseTransactions` (not `RefreshDatabase`) because `phpunit.xml` still points at the real MySQL connection — `RefreshDatabase` would wipe the development database.
- The default `README.md` is Laravel boilerplate and does not contain project-specific setup instructions.
- No Cursor rules, `.cursorrules`, GitHub Copilot instructions, or previous `CLAUDE.md` were present when this file was created.

===

<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to ensure the best experience when building Laravel applications.

## Foundational Context

This application is a Laravel application and its main Laravel ecosystems package & versions are below. You are an expert with them all. Ensure you abide by these specific packages & versions.

- php - 8.4
- laravel/framework (LARAVEL) - v13
- laravel/prompts (PROMPTS) - v0
- laravel/sanctum (SANCTUM) - v4
- livewire/livewire (LIVEWIRE) - v4
- laravel/boost (BOOST) - v2
- laravel/mcp (MCP) - v0
- laravel/pint (PINT) - v1
- laravel/sail (SAIL) - v1
- phpunit/phpunit (PHPUNIT) - v11
- alpinejs (ALPINEJS) - v3
- tailwindcss (TAILWINDCSS) - v4

## Skills Activation

This project has domain-specific skills available in `**/skills/**`. You MUST activate the relevant skill whenever you work in that domain—don't wait until you're stuck.

## Conventions

- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, and naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts

- Do not create verification scripts or tinker when tests cover that functionality and prove they work. Unit and feature tests are more important.

## Application Structure & Architecture

- Stick to existing directory structure; don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling

- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `npm run build`, `npm run dev`, or `composer run dev`. Ask them.

## Documentation Files

- You must only create documentation files if explicitly requested by the user.

## Replies

- Be concise in your explanations - focus on what's important rather than explaining obvious details.

=== boost rules ===

# Laravel Boost

## Tools

- Laravel Boost is an MCP server with tools designed specifically for this application. Prefer Boost tools over manual alternatives like shell commands or file reads.
- Use `database-query` to run read-only queries against the database instead of writing raw SQL in tinker.
- Use `database-schema` to inspect table structure before writing migrations or models.
- Use `get-absolute-url` to resolve the correct scheme, domain, and port for project URLs. Always use this before sharing a URL with the user.
- Use `browser-logs` to read browser logs, errors, and exceptions. Only recent logs are useful, ignore old entries.

## Searching Documentation (IMPORTANT)

- Always use `search-docs` before making code changes. Do not skip this step. It returns version-specific docs based on installed packages automatically.
- Pass a `packages` array to scope results when you know which packages are relevant.
- Use multiple broad, topic-based queries: `['rate limiting', 'routing rate limiting', 'routing']`. Expect the most relevant results first.
- Do not add package names to queries because package info is already shared. Use `test resource table`, not `filament 4 test resource table`.

### Search Syntax

1. Use words for auto-stemmed AND logic: `rate limit` matches both "rate" AND "limit".
2. Use `"quoted phrases"` for exact position matching: `"infinite scroll"` requires adjacent words in order.
3. Combine words and phrases for mixed queries: `middleware "rate limit"`.
4. Use multiple queries for OR logic: `queries=["authentication", "middleware"]`.

## Artisan

- Run Artisan commands directly via the command line (e.g., `php artisan route:list`). Use `php artisan list` to discover available commands and `php artisan [command] --help` to check parameters.
- Inspect routes with `php artisan route:list`. Filter with: `--method=GET`, `--name=users`, `--path=api`, `--except-vendor`, `--only-vendor`.
- Read configuration values using dot notation: `php artisan config:show app.name`, `php artisan config:show database.default`. Or read config files directly from the `config/` directory.

## Tinker

- Execute PHP in app context for debugging and testing code. Do not create models without user approval, prefer tests with factories instead. Prefer existing Artisan commands over custom tinker code.
- Always use single quotes to prevent shell expansion: `php artisan tinker --execute 'Your::code();'`
  - Double quotes for PHP strings inside: `php artisan tinker --execute 'User::where("active", true)->count();'`

=== php rules ===

# PHP

- Always use curly braces for control structures, even for single-line bodies.
- Use PHP 8 constructor property promotion: `public function __construct(public GitHub $github) { }`. Do not leave empty zero-parameter `__construct()` methods unless the constructor is private.
- Use explicit return type declarations and type hints for all method parameters: `function isAccessible(User $user, ?string $path = null): bool`
- Use TitleCase for Enum keys: `FavoritePerson`, `BestLake`, `Monthly`.
- Prefer PHPDoc blocks over inline comments. Only add inline comments for exceptionally complex logic.
- Use array shape type definitions in PHPDoc blocks.

=== deployments rules ===

# Deployment

- Laravel can be deployed using [Laravel Cloud](https://cloud.laravel.com/), which is the fastest way to deploy and scale production Laravel applications.

=== laravel/core rules ===

# Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using `php artisan list` and check their parameters with `php artisan [command] --help`.
- If you're creating a generic PHP class, use `php artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Model Creation

- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `php artisan make:model --help` to check the available options.

## APIs & Eloquent Resources

- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

## URL Generation

- When generating links to other pages, prefer named routes and the `route()` function.

## Testing

- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] {name}` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

## Vite Error

- If you receive an "Illuminate\Foundation\ViteException: Unable to locate file in Vite manifest" error, you can run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.

=== livewire/core rules ===

# Livewire

- Livewire allow to build dynamic, reactive interfaces in PHP without writing JavaScript.
- You can use Alpine.js for client-side interactions instead of JavaScript frameworks.
- Keep state server-side so the UI reflects it. Validate and authorize in actions as you would in HTTP requests.

=== pint/core rules ===

# Laravel Pint Code Formatter

- If you have modified any PHP files, you must run `vendor/bin/pint --dirty --format agent` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test --format agent`, simply run `vendor/bin/pint --format agent` to fix any formatting issues.

=== phpunit/core rules ===

# PHPUnit

- This application uses PHPUnit for testing. All tests must be written as PHPUnit classes. Use `php artisan make:test --phpunit {name}` to create a new test.
- If you see a test using "Pest", convert it to PHPUnit.
- Every time a test has been updated, run that singular test.
- When the tests relating to your feature are passing, ask the user if they would like to also run the entire test suite to make sure everything is still passing.
- Tests should cover all happy paths, failure paths, and edge cases.
- You must not remove any tests or test files from the tests directory without approval. These are not temporary or helper files; these are core to the application.

## Running Tests

- Run the minimal number of tests, using an appropriate filter, before finalizing.
- To run all tests: `php artisan test --compact`.
- To run all tests in a file: `php artisan test --compact tests/Feature/ExampleTest.php`.
- To filter on a particular test name: `php artisan test --compact --filter=testName` (recommended after making a change to a related file).

</laravel-boost-guidelines>
