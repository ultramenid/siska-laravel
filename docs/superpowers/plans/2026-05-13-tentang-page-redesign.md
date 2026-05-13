# Tentang Page Redesign Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Rewrite `resources/views/frontends/siska.blade.php` into a single modern, minimal tentang page combining About, Tujuan, Produk & Pengguna, Manfaat, and FAQ sections.

**Architecture:** Single Blade view rewrite — no controller or route changes needed. Uses existing layout (`layouts/indexLayout`), existing nav partials, Alpine.js accordion for FAQ (already available via Livewire), and Tailwind CSS utility classes plus existing custom CSS classes.

**Tech Stack:** Laravel 9 Blade, Tailwind CSS 3, Alpine.js 3 (via Livewire)

---

## Files to Modify
- `resources/views/frontends/siska.blade.php` - Main template redesign
- `resources/css/app.css` - Nature-inspired CSS classes

---

### Task 1: Add Nature-Inspired CSS Classes

**Files:**
- Modify: `resources/css/app.css`

- [ ] **Step 1: Add nature color classes to app.css**

Add after line 24 (after `.border-siska`):
```css
.bg-sage-light {
    background-color: #E8F5E9;
}
.bg-cream {
    background-color: #FFFDD0;
}
.text-forest {
    color: #228B22;
}
.text-sage {
    color: #8FBC8F;
}
.border-terracotta {
    border-color: #CC7755;
}
```

- [ ] **Step 2: Add organic card and decorative classes**

Add after the above classes:
```css
.organic-card {
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(34, 139, 34, 0.1);
}
.leaf-divider {
    position: relative;
}
.leaf-divider:after {
    content: "";
    position: absolute;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 24px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23228B22' d='M12 2C8 2 4 6 4 12c0 3 1 5 3 7 1 1 2 0 2-2 0-2-1-4-2-5-1-2 1-4 3-5 1-1 2 0 2 2 0 3-1 5-3 7-2 2-2 5-2 7 0 1 1 2 2 0 2 2 0 2-4 1-5 2-5 1-2 2 0 2-1 0-3-3-5 0-7 0-2-1-3-2-4 0-5 1-6 2-7 3-7 2 0 1 2 3 4 2 5 1 6 2 7 1 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2?z=1'%3E%3C/path%3E%3C/svg%3E");
    background-size: contain;
    background-repeat: no-repeat;
}
.nature-pattern {
    background-image: radial-gradient(circle at 10% 20%, rgba(143, 194, 191, 0.1) 0%, transparent 20%);
}
```

- [ ] **Step 3: Commit CSS changes**

```bash
git add resources/css/app.css
git commit -m "style: add nature-inspired CSS classes for tentang page"
```

---

### Task 2: Redesign the Tentang Page Template

**Files:**
- Modify: `resources/views/frontends/siska.blade.php`

- [ ] **Step 1: Replace the entire siska.blade.php template**

Replace the entire content with:
```blade
@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative">
        @include('partials.navMobile')
        @include('partials.nav')

        <!-- Hero Section -->
        <div class="max-w-4xl mx-auto px-6 py-20 text-center">
            <img src="{{ asset('assets/v1/web-logo-ok-disbun.png') }}" alt="SISKA" class="h-20 mx-auto mb-8">
            <h1 class="text-4xl font-bold text-forest mb-6">Tentang SISKA</h1>
            <p class="text-gray-700 text-lg leading-relaxed max-w-2xl mx-auto">
                Sistem Informasi Komoditas Perkebunan Kalimantan Tengah merupakan platform yang menyajikan data dan informasi mengenai komoditas perkebunan meliputi perkebunan sawit, karet, kelapa, lada, kopi, kakau, pinang, aren, jambu mete, kemiri, kapuk randu, dan cengkeh yang ada di Provinsi Kalimantan Tengah.
            </p>
            <div class="mt-12 mb-8 leaf-divider"></div>
        </div>

        <!-- Tujuan Section -->
        <div class="bg-sage-light py-20 px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-forest mb-8 text-center">Tujuan</h2>
                <p class="text-gray-700 leading-relaxed mb-12 text-center max-w-2xl mx-auto">
                    Mendukung penerapan decision support system untuk perencanaan, pengawasan dan pengendalian usaha perkebunan di Kalimantan Tengah yang terukur, berkeadilan dan berkelanjutan.
                </p>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white organic-card p-6 text-center nature-pattern">
                        <div class="w-16 h-16 bg-sage rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-forest mb-2">Terukur</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Perencanaan, pengendalian dan pengawasan perkebunan akan lebih terukur dengan basis data yang kredibel dan terintegrasi.</p>
                    </div>
                    <div class="bg-white organic-card p-6 text-center nature-pattern">
                        <div class="w-16 h-16 bg-forest rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-forest mb-2">Berkeadilan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Perkembangan usaha perkebunan tidak hanya fokus pada perkebunan skala besar namun juga berdampak langsung pada perkebunan rakyat.</p>
                    </div>
                    <div class="bg-white organic-card p-6 text-center nature-pattern">
                        <div class="w-16 h-16 bg-terracotta rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-forest mb-2">Berkelanjutan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Pengembangan perkebunan selaras dengan daya dukung dan daya tampung lingkungan sebagai bentuk komitmen pembangunan berkelanjutan.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk & Pengguna Section -->
        <div class="py-20 px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-forest mb-12 text-center">Produk & Pengguna</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-sage-light organic-card p-8">
                        <h3 class="text-2xl font-semibold text-forest mb-4">Produk</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Basis data perizinan, pabrik, dan perkebunan rakyat yang disajikan dalam dashboard data dan peta yang memungkinkan pengguna mengakses dan mengeksplor perkembangan perkebunan berdasarkan kabupaten, subyek perizinan, status lahan dan lainnya.
                        </p>
                    </div>
                    <div class="bg-cream organic-card p-8">
                        <h3 class="text-2xl font-semibold text-forest mb-4">Pengguna</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Internal Dinas Perkebunan Provinsi Kalimantan Tengah, Instansi Pemerintah lainnya, dan Publik.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manfaat Section -->
        <div class="bg-cream py-20 px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-forest mb-12 text-center">Manfaat</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white organic-card p-6 text-center">
                        <div class="w-14 h-14 bg-forest rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m0 0h16m-16 0h16"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-forest mb-2">Pemerintah Daerah</h3>
                        <p class="text-gray-600 text-sm">Memudahkan Pemerintah Provinsi dan Kabupaten/Kota menghimpun dan menyajikan data secara cepat untuk mendukung perencanaan, pengawasan dan pengendalian perizinan.</p>
                    </div>
                    <div class="bg-white organic-card p-6 text-center">
                        <div class="w-14 h-14 bg-sage rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v-7a2 2 0 012 2v7a2 2 0 002-2 2 2 0 012-2 2 2 0 002 2v-1a2 2 0 012-2h2.945"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-forest mb-2">Pemerintah Pusat</h3>
                        <p class="text-gray-600 text-sm">Memudahkan Pemerintah Pusat mengintegrasikan data untuk pengawasan kepatuhan perizinan, kewajiban keuangan dan lingkungan.</p>
                    </div>
                    <div class="bg-white organic-card p-6 text-center">
                        <div class="w-14 h-14 bg-terracotta rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-3-3h-4m-2 5h2v-2a3 3 0 00-3-3H7a3 3 0 00-3 3v2h2v-2a3 3 0 013-3h4a3 3 0 013 3v2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-forest mb-2">Pelaku Usaha</h3>
                        <p class="text-gray-600 text-sm">Memungkinkan Pelaku Usaha untuk mengidentifikasi potensi pasokan bahan baku dan pengawasan rantai pasok dari perkebunan rakyat.</p>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </section>
@endsection
```

- [ ] **Step 2: Commit template changes**

```bash
git add resources/views/frontends/siska.blade.php
git commit -m "feat: redesign tentang page with nature-inspired elegant layout"
```

---

### Task 3: Build and Verify

- [ ] **Step 1: Run Laravel build**

```bash
npm run build
```

- [ ] **Step 2: Check for any errors**

Expected: Build completes successfully

- [ ] **Step 3: Commit built assets**

```bash
git add public/build/
git commit -m "build: update compiled assets for tentang redesign"
```

---

## Plan Complete

Refer to spec at `docs/superpowers/specs/2026-05-13-tentang-page-redesign-design.md`.