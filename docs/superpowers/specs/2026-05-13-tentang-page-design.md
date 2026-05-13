# Tentang Page Redesign

**Date:** 2026-05-13  
**Route:** `/tentang` → `TentangController@index` → `frontends/siska.blade.php`

## Overview

Redesign the existing tentang page into a single, modern, minimal page combining all about content. Replaces the current `siska.blade.php`. No separate tim or faq sub-pages needed.

## Layout & Sections

### 1. Hero
- Full-width dark green (`#132822`) banner, ~40vh height
- Centered white text: `Tentang SISKA` (h1, bold, large) + subtitle `Sistem Informasi Komoditas Perkebunan Kalimantan Tengah`
- Sits directly below the nav

### 2. About
- White background
- `max-w-3xl mx-auto px-6 py-16`
- Section heading with teal underline accent
- 2–3 sentences of prose describing SISKA (from existing siska.blade.php content)

### 3. Tujuan
- `bg-gray-50` background
- `max-w-5xl mx-auto px-6 py-16`
- Section heading: "Tujuan"
- 3-column card grid (md:grid-cols-3): Terukur, Berkeadilan, Berkelanjutan
- Cards: white bg, subtle shadow, teal left border (`border-l-4 border-teal`), no icons

### 4. Produk & Pengguna
- White background
- `max-w-5xl mx-auto px-6 py-16`
- Section heading: "Produk & Pengguna"
- 2-column card grid (md:grid-cols-2): Produk, Pengguna
- Cards: white bg, border border-gray-200, rounded-lg

### 5. Manfaat
- `bg-gray-50` background
- `max-w-5xl mx-auto px-6 py-16`
- Section heading: "Manfaat"
- 3-column card grid (md:grid-cols-3): Pemerintah Daerah, Pemerintah Pusat, Pelaku Usaha
- Same card style as Tujuan (teal left border)

### 6. FAQ
- White background
- `max-w-3xl mx-auto px-6 py-16`
- Section heading: "FAQ"
- Alpine.js accordion: each question is a clickable row (`x-data`, `x-show`) that expands the answer
- 4 questions from existing faq.blade.php content

### 7. Footer
- Existing `@include('partials.footer')`

## Styling Conventions
- Section headings: `text-2xl font-semibold text-gray-900` with a `w-12 h-1 bg-teal-600 mt-2 mb-8` underline accent
- Container: `max-w-5xl mx-auto px-6` (prose sections use max-w-3xl)
- Vertical padding per section: `py-16`
- Brand teal: `#009180` (mapped to Tailwind `bg-color-siska` / use inline style or extend tailwind config)
- No new dependencies — Alpine.js already available via Livewire

## Files Changed
- `resources/views/frontends/siska.blade.php` — full rewrite
- No controller changes needed
- No route changes needed
