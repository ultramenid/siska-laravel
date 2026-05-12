# Redesain Halaman Tentang - SISKA

## Concept & Vision

Halaman Tentang yang bersih dan bermakna dengan fokus pada tipografi dan konten. Desain minimal yang menggunakan whitespace sebagai elemen visual utama, menciptakan kesan profesional dan mudah dibaca.

## Design Language

**Aesthetic Direction:** Minimalist Indonesian government portal — clean, authoritative, trustworthy.

**Color Palette:**
- Primary: `#009180` (teal-green from brand)
- Background: `#FFFFFF` (white)
- Text Primary: `#1F2937` (gray-800)
- Text Secondary: `#6B7280` (gray-500)
- Accent Light: `#E5E7EB` (gray-200 for dividers)

**Typography:**
- Headings: Montserrat, bold/black weight
- Body: Montserrat, regular/medium weight
- Font sizes: Hero title 3rem, Section titles 2rem, Body 1rem

**Spatial System:**
- Section padding: 6rem vertical
- Max content width: 48rem (768px)
- Generous line-height: 1.75 for body text

**Motion Philosophy:**
- Minimal — subtle fade-in on scroll (optional enhancement)
- No bouncy animations — subdued, professional

## Layout & Structure

```
┌─────────────────────────────────────────┐
│  NAV (fixed top, dark green)            │
├─────────────────────────────────────────┤
│                                         │
│  HERO                                   │
│  Logo + Title + Intro Paragraph         │
│  Centered, max-width contained          │
│                                         │
├─────────────────────────────────────────┤
│  TUJUAN                                 │
│  Large "Tujuan" heading                 │
│  Intro paragraph                        │
│  Three principles in clean layout:      │
│  [Terukur] [Berkeadilan] [Berkelanjutan]│
│                                         │
├─────────────────────────────────────────┤
│  PRODUK & PENGGUNA                      │
│  Two sections: Produk + Pengguna        │
│  Simple text blocks                     │
│                                         │
├─────────────────────────────────────────┤
│  MANFAAT                                │
│  Three stakeholder cards stacked:       │
│  - Pemerintah Daerah                    │
│  - Pemerintah Pusat                     │
│  - Pelaku Usaha                         │
│                                         │
├─────────────────────────────────────────┤
│  FOOTER                                 │
└─────────────────────────────────────────┘
```

## Features & Interactions

- Fixed navigation bar
- Scroll-based visibility (no JS tab switching — just sections)
- Hover states on links: underline appears
- No complex interactions — pure content display

## Component Inventory

**Hero Section:**
- Logo image (centered)
- H1 title: "Tentang SISKA"
- Intro paragraph: system description

**Principle Card (Tujuan):**
- Bold title (Terukur/Berkeadilan/Berkelanjutan)
- Description text below
- No borders or boxes — just text with spacing

**Benefit Card (Manfaat):**
- Stakeholder name (bold)
- Description paragraph
- Subtle top border accent on hover (optional)

**Section Divider:**
- Thin gray line or extra whitespace

## Technical Approach

- Single Blade template extending indexLayout
- Tailwind CSS for styling
- Alpine.js not required (no interactive elements)
- Content remains from current page