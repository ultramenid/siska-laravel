# Laravel 13 + Livewire 4 + Tailwind CSS 4 Upgrade Guide

## ✅ Upgrade Complete!

Your application has been successfully upgraded to the latest versions:

- **Laravel**: 9.52.x → 13.8.0
- **PHP**: 8.4 ✓ (required 8.3+) 
- **Livewire**: v2 → v4.3.0
- **Tailwind CSS**: v3 → v4.3.0
- **Vite**: v3 → v5
- **Laravel Sanctum**: v2 → v4
- **PHPUnit**: v9 → v11

---

## 🔧 Changes Made During Upgrade

### PHP & Composer
- PHP requirement updated from `^8.0.2` to `^8.3`
- All dependencies updated to latest versions

### Laravel 13 Changes
- `bootstrap/app.php` - New simplified `Application::configure()` pattern
- `artisan` - Updated to use `handleCommand()`
- `public/index.php` - Updated to use `handleRequest()`
- Removed `Illuminate\Contracts\Http\Kernel` and `ExceptionHandler` bindings

### Livewire 4 Changes
- Installed v4.3.0
- Components auto-detect views from class names
- `wire:model` modifiers now control client-side sync timing
- `wire:transition` now uses View Transitions API
- Asset URLs now include hash prefix (`/livewire-{hash}/...`)

### Tailwind CSS 4 Changes
- Replaced `@tailwind` directives with `@import "tailwindcss"`
- Config moved directly into CSS using `@theme` directive
- Install dependencies: `@tailwindcss/postcss`, `@tailwindcss/vite`
- Updated Vite plugin configuration
- `autoprefixer` removed (handled automatically in v4)

### Vite 5 Changes
- Updated from v3 to v5
- `package.json` now uses `"type": "module"`
- Config file renamed to `vite.config.mjs`
- PostCSS config updated for ESM

---

## 📁 Files Modified

| File | Change |
|------|--------|
| `composer.json` | All dependencies updated |
| `package.json` | Vite, Tailwind, Livewire deps updated |
| `vite.config.mjs` | New Vite 5 + Tailwind plugin setup |
| `postcss.config.js` | Uses `@tailwindcss/postcss` |
| `resources/css/app.css` | Uses `@import "tailwindcss"` + `@theme` |
| `bootstrap/app.php` | Laravel 13 structure |
| `artisan` | Laravel 13 handler |
| `public/index.php` | Laravel 13 handler |
| `app/Http/Livewire/*.php` | Livewire 4 compatible |
| Multiple Blade views | Updated for v4 changes |

---

## 🔍 Next Steps - Verify Your Application

### 1. Clear All Caches
```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
```

### 2. Test Livewire Components
Livewire 4 has these breaking changes:
- `wire:model` modifiers (`.blur`, `.change`) now control client-side sync timing
- Add `.live` before modifiers if you want previous behavior (e.g., `wire:model.live.blur`)
- `wire:transition` now uses View Transitions API (modifiers removed)
- Component tags must be properly closed

### 3. Check Routes
```bash
php artisan route:list
```

### 4. Run Application Tests
```bash
php artisan test
```

---

## 🆘 Troubleshooting

If you encounter errors:

1. **Clear all caches:**
   ```bash
   php artisan optimize:clear
   composer dump-autoload
   ```

2. **Check logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

3. **Enable debug mode:**
   ```bash
   APP_DEBUG=true in .env
   ```

---

## New Features Available

### Tailwind CSS 4 Breaking Changes to Review

1. **Browser Support**: Requires Safari 16.4+, Chrome 111+, Firefox 128+
2. **Removed directives**: `@tailwind base/components/utilities` → `@import "tailwindcss"`
3. **Removed utilities**: `bg-opacity-*`, `text-opacity-*`, `shadow-sm` (renamed to `shadow-xs`)
4. **Renamed utilities**: `flex-shrink-*` → `shrink-*`, `outline-none` → `outline-hidden`
5. **Default ring width**: Changed from 3px to 1px, default color to `currentColor`
6. **Default border color**: Changed from `gray-200` to `currentColor`

### Livewire 4 Features
1. **Single-file components** - Combine PHP and Blade in one file
2. **Multi-file components** - Organize PHP, Blade, JavaScript, tests together
3. **Slots and attribute forwarding** - Better component composition
4. **JavaScript in view-based components** - Scripts served as cached files
5. **Islands** - Isolated regions updating independently
6. **Async actions** - Run actions in parallel with `.async`
7. **`wire:sort`** - Drag-and-drop sorting
8. **`wire:intersect`** - Viewport intersection detection
9. **`wire:ref`** - Element references
10. **`.renderless` modifier** - Skip component re-rendering

### Laravel 13 Features
1. **Laravel AI SDK** - First-party AI primitives
2. **JSON:API Resources** - Native JSON:API support
3. **Vector Search** - Semantic search with pgvector
4. **Queue Routing** - `Queue::route()` method

---

## 📚 Resources

- [Laravel 13 Documentation](https://laravel.com/docs/13.x)
- [Livewire 4 Documentation](https://livewire.laravel.com/docs/4.x)
- [Livewire 4 Upgrade Guide](https://livewire.laravel.com/docs/4.x/upgrading)