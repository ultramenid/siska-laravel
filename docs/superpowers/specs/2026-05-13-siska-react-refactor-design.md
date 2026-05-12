# SISKA React Refactor - Design Spec

## Overview

Refactor the Laravel-based SISKA (Sistem Informasi Komoditas Perkebunan Kalimantan Tengah) website into a static React application using Vite, maintaining all 20 pages and existing visual design.

## Technology Stack

| Layer | Technology | Rationale |
|-------|------------|------------|
| Build Tool | Vite | Fast HMR, standard React tooling |
| Framework | React 18 | Component-based UI |
| Routing | React Router v6 | Standard routing for SPA |
| Styling | Tailwind CSS | Utility-first, matches current |
| Components | shadcn/ui | Accessible, copy-paste components |
| Charts | Recharts | React-native charting |
| Maps | react-leaflet + Leaflet | Interactive maps |
| State | React useState/useContext | Simple local state, no Redux needed |
| Data | Static JSON | Copied from Laravel views/DB |

## Architecture

```
larasiska-react/
├── src/
│   ├── components/       # Shared UI components
│   │   ├── ui/          # shadcn/ui components
│   │   ├── Navigation/  # Nav, Sidebar, Footer
│   │   ├── Charts/      # Recharts wrappers
│   │   └── Map/         # Leaflet map component
│   ├── layouts/         # Page layouts
│   │   ├── MainLayout   # Homepage layout (top nav)
│   │   └── DashboardLayout  # Sidebar + top nav
│   ├── pages/           # Route components (20 pages)
│   ├── data/            # Static JSON data
│   │   └── sawit.json   # Palm oil data from DB
│   ├── lib/             # Utilities
│   ├── App.jsx          # Router setup
│   └── main.jsx         # Entry point
├── public/              # Static assets
│   └── assets/          # Images from original
└── package.json
```

## Pages (12 total)

### Public Pages
1. **HomePage** (`/`) - Landing with expandable commodity cards
2. **Login** (`/login`) - Simple login form
3. **Map** (`/map`) - Interactive Leaflet map
4. **Data** (`/data`) - Tabbed data tables

### Dashboard Page (Consolidated - with sidebar + tabs)
5. **SawitDashboard** (`/dashboard/sawit`) - ONE page with tabbed sections:
   - **Mutasi Tanaman** → sub-tabs: PBS / Rakyat
   - **Pengusahaan** → PBS vs PBR comparison
   - **Perkebunan** → sub-tabs: Besar / Rakyat
   - **Produksi** → TBS, CPO, Jumlah Pabrik stats
   - **Pabrik** → Factory list/map
   - **Izin** → Business permits data
   - **Sawit Rakyat** → Smallholders data

### Static Pages
6. **Tentang** (`/tentang`) - About SISKA with tabs
7. **FAQ** (`/faq`) - FAQ accordion
8. **Tim** (`/tim`) - Team page
9. **DaftarIstilah** (`/daftaristilah`) - Glossary
10. **Siska** (`/siska`) - Alternative about page

## Design System

### Colors (Current Theme Preserved)
- Primary: `#1E6091` (Blue - SISKA blue)
- Secondary: `#2D8B4E` (Green - plantation)
- Accent: `#F59E0B` (Amber)
- Background: `#F8FAFC` (Light gray)
- Text: `#1E293B` (Slate)
- White: `#FFFFFF`

### Typography
- Font: `Montserrat` (Google Font - current)
- Headings: Bold, 2xl-5xl
- Body: Regular, base-sm

### Components (shadcn/ui)
- Card - Dashboard cards
- Button - Action buttons
- Table - Data tables
- Tabs - Page tabs, data tabs
- Accordion - FAQ, glossary
- Dialog - Modals
- Input - Forms
- Select - Dropdowns
- NavigationMenu - Top nav
- Sheet - Mobile sidebar

## Data Migration

Static JSON files extracted from Laravel:
- `tbsawit` table → `data/sawit.json`
- Chart data (tbm, tm, tr series) → `data/chart-*.json`
- Glossary terms → `data/glossary.json`

## Key Components

### Navigation
- **TopNav**: Logo, Home, Tentang, Peta, Data links + dark mode toggle
- **Sidebar**: Dashboard navigation (7 tabs in sidebar)
- **MobileNav**: Collapsible hamburger menu

### DashboardLayout (Tabbed Single-Page Dashboard)
```
┌─────────────────────────────────────────────────────────┐
│  🌴 SISKA Dashboard                      [User] [⚙]   │
├──────────────┬──────────────────────────────────────────┤
│              │  [Mutasi] [Pengusaha] [Perkebun] [Produk]│
│  Sidebar     ├──────────────────────────────────────────┤
│              │                                          │
│  • Mutasi    │         ┌────────────────────────┐       │
│    Tanaman   │         │                        │       │
│  • Pengusaha │         │      MAIN CHART        │       │
│    an        │         │                        │       │
│  • Perkebun  │         └────────────────────────┘       │
│    an        │                                          │
│  • Produksi  │         ┌────┬────┬────┬────┐            │
│  • Pabrik    │         │Stat│Stat│Stat│Stat│            │
│  • Izin      │         └────┴────┴────┴────┘            │
│  • Sawit     │                                          │
│    Rakyat    │                                          │
└──────────────┴──────────────────────────────────────────┘
```

### HomepageLayout
```
┌─────────────────────────────────┐
│           TopNav                │
├─────────────────────────────────┤
│                                 │
│      Commodity Cards Grid       │
│   (Sawit, Karet, Kelapa...)    │
│                                 │
└─────────────────────────────────┘
```
┌─────────────────────────────────┐
│           TopNav                │
├───────────┬─────────────────────┤
│           │                     │
│  Sidebar  │    Page Content     │
│           │                     │
└───────────┴─────────────────────┘
```

### HomepageLayout
```
┌─────────────────────────────────┐
│           TopNav                │
├─────────────────────────────────┤
│                                 │
│      Commodity Cards Grid       │
│   (Sawit, Karet, Kelapa...)    │
│                                 │
└─────────────────────────────────┘
```

## Interactive Features

### Charts (Recharts)
- AreaChart - Mutasi Tanaman (TBM/TM/TR)
- ComposedChart - Perkebunan data
- Responsive containers

### Map (react-leaflet)
- Base map with tile layer
- WMS layers for: Pabrik, Kawasan Hutan, Izin Usaha, Tutupan Sawit
- Layer toggle controls
- Zoom/pan controls

### Tables
- Sortable columns
- Pagination
- Search/filter

## Authentication

Simple session-based auth:
- Login page with username/password
- Auth state in React Context
- Protected routes redirect to login
- Session stored in localStorage

## Responsive Breakpoints

- Mobile: `< 640px`
- Tablet: `640px - 1024px`
- Desktop: `> 1024px`

## Implementation Order

1. Project scaffolding (Vite + React + Tailwind + shadcn)
2. Layout components (MainLayout, DashboardLayout, Navigation)
3. Homepage (commodity cards with expandable panels)
4. **Consolidated SawitDashboard** (tabbed interface with all chart sections)
5. Map page
6. Data page with tabs
7. Static pages (Tentang, FAQ, Tim, Glossary)
8. Login/auth
9. Polish (animations, transitions)

## Success Criteria

- [ ] All 12 pages render correctly
- [ ] Dashboard tabs switch charts/data correctly
- [ ] Navigation works between all pages
- [ ] Charts display data correctly (Recharts)
- [ ] Map loads with layers (react-leaflet)
- [ ] Responsive on mobile/tablet/desktop
- [ ] Login/auth protects dashboard pages
- [ ] No console errors
- [ ] Build succeeds
