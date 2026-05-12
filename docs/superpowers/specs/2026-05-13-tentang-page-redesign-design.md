# Tentang Page Elegant Redesign Design

## Overview
Redesign the existing `/tentang` page with a nature-inspired, elegant aesthetic that reflects the agricultural theme of SISKA (Sistem Informasi Perkebunan Kalimantan Tengah).

## Current State
- Location: `resources/views/frontends/siska.blade.php`
- Basic text-based layout with logo, heading, and three main sections
- Uses default layout from `layouts/indexLayout.blade.php`

## Design Approach

### Visual Style
- **Theme**: Nature-inspired with earth-toned color palette
- **Colors**: 
  - Sage Green: `#8FBC8F` (accents, highlights)
  - Forest Green: `#228B22` (headings)
  - Warm Cream: `#FFFDD0` (background sections)
  - Terracotta: `#CC7755` (decorative elements)
  - Light Sage: `#E8F5E9` (section backgrounds)
- **Decorative Elements**: Subtle leaf motifs, organic shapes, rounded corners

### Layout Structure
Full-width sections with alternating background treatments:

1. **Hero Section** (White background)
   - Logo prominently displayed
   - Main heading "Tentang SISKA"
   - Brief description paragraph
   - Decorative leaf divider

2. **Tujuan Section** (Light green background)
   - Heading with leaf icon accent
   - Description paragraph
   - Three purpose cards (Terukur, Berkeadilan, Berkelanjutan)
   - Leaf motif decorations

3. **Produk & Pengguna Section** (White background)
   - Heading with plant icon accent
   - Two cards: Produk and Pengguna
   - Organic border design

4. **Manfaat Section** (Light cream background)
   - Heading with tree icon accent
   - Three benefit cards for different user groups
   - Decorative corner elements

## Components to Create/Modify

### Files
- `resources/views/frontends/siska.blade.php` - Main template (modify)
- `resources/css/app.css` - Add nature-inspired styles (modify)

### CSS Classes to Add
```css
.bg-sage-light { background-color: #E8F5E9; }
.bg-cream { background-color: #FFFDD0; }
.text-forest { color: #228B22; }
.text-sage { color: #8FBC8F; }
.border-terracotta { border-color: #CC7755; }
.leaf-divider { /* decorative leaf pattern */ }
.organic-card { /* rounded, natural shadow */ }
```

## Implementation Steps
1. Add new CSS classes to app.css
2. Redesign siska.blade.php with new HTML structure
3. Add responsive design for mobile
4. Test across devices

## Success Criteria
- Matches nature-inspired aesthetic
- Responsive on all devices
- Fast loading (CSS only, no heavy images)
- Maintains existing content structure