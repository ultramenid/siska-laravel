# SISKA React Refactor Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Refactor Laravel-based SISKA website into static React app with Vite, Tailwind CSS, shadcn/ui, Recharts, and react-leaflet. All pages migrated, dashboard consolidated into single tabbed interface.

**Architecture:** Vite + React 18 SPA with React Router v6. Static JSON data. MainLayout for homepage, DashboardLayout with sidebar + tabs for consolidated dashboard. 12 total pages.

**Tech Stack:** Vite, React 18, React Router v6, Tailwind CSS, shadcn/ui, Recharts, react-leaflet, Lucide React icons

---

## File Structure

```
larasiska-react/
├── src/
│   ├── components/
│   │   └── ui/                    # shadcn/ui components
│   │       ├── button.tsx
│   │       ├── card.tsx
│   │       ├── tabs.tsx
│   │       ├── table.tsx
│   │       ├── input.tsx
│   │       ├── accordion.tsx
│   │       ├── dialog.tsx
│   │       ├── select.tsx
│   │       ├── navigation-menu.tsx
│   │       ├── sheet.tsx
│   │       └── dropdown-menu.tsx
│   ├── layout/
│   │   ├── MainLayout.tsx        # Top nav + content (homepage, static pages)
│   │   ├── DashboardLayout.tsx    # Sidebar + tabs + content (dashboard)
│   │   └── AuthLayout.tsx        # Centered login form
│   ├── pages/
│   │   ├── HomePage.tsx
│   │   ├── SawitDashboard.tsx     # Consolidated tabbed dashboard
│   │   ├── DataPage.tsx
│   │   ├── MapPage.tsx
│   │   ├── LoginPage.tsx
│   │   ├── TentangPage.tsx
│   │   ├── FAQPage.tsx
│   │   ├── TimPage.tsx
│   │   ├── GlossaryPage.tsx
│   │   └── AboutPage.tsx
│   ├── components/
│   │   ├── TopNav.tsx
│   │   ├── Sidebar.tsx
│   │   ├── MobileNav.tsx
│   │   ├── CommodityCard.tsx      # Homepage expandable cards
│   │   ├── ChartArea.tsx           # Recharts wrapper
│   │   ├── MapView.tsx             # react-leaflet wrapper
│   │   ├── DataTable.tsx
│   │   ├── StatCard.tsx
│   │   └── IframeEmbed.tsx         # For Google Data Studio embeds
│   ├── data/
│   │   ├── sawit.json              # Main palm oil data
│   │   ├── chartMutasi.json        # TBM/TM/TR data
│   │   ├── chartPengusahaan.json   # PBS/PBR data
│   │   ├── chartPerkebunan.json    # Perkebunan data
│   │   ├── glossary.json           # Terms dictionary
│   │   └── faq.json                # FAQ data
│   ├── lib/
│   │   ├── utils.ts                # cn() helper for tailwind
│   │   └── constants.ts            # Colors, breakpoints
│   ├── context/
│   │   └── AuthContext.tsx         # Login state
│   ├── App.tsx                     # Router setup
│   └── main.tsx                    # Entry point
├── public/
│   └── assets/                     # Copied from original
│       ├── v1/
│       └── measure.png
├── index.html
├── package.json
├── vite.config.ts
├── tailwind.config.js
├── tsconfig.json
└── components.json                  # shadcn/ui config
```

---

## Task 1: Project Scaffolding

**Goal:** Initialize Vite + React + TypeScript project with all dependencies

**Files:**
- Create: `larasiska-react/package.json`
- Create: `larasiska-react/vite.config.ts`
- Create: `larasiska-react/tsconfig.json`
- Create: `larasiska-react/tsconfig.node.json`
- Create: `larasiska-react/index.html`
- Create: `larasiska-react/tailwind.config.js`
- Create: `larasiska-react/postcss.config.js`
- Create: `larasiska-react/components.json`
- Create: `larasiska-react/src/main.tsx`
- Create: `larasiska-react/src/App.tsx`
- Create: `larasiska-react/src/index.css`

- [ ] **Step 1: Create package.json**

```json
{
  "name": "larasiska-react",
  "private": true,
  "version": "0.0.0",
  "type": "module",
  "scripts": {
    "dev": "vite",
    "build": "tsc && vite build",
    "preview": "vite preview"
  },
  "dependencies": {
    "react": "^18.2.0",
    "react-dom": "^18.2.0",
    "react-router-dom": "^6.22.0",
    "recharts": "^2.12.0",
    "react-leaflet": "^4.2.1",
    "leaflet": "^1.9.4",
    "@radix-ui/react-accordion": "^1.1.2",
    "@radix-ui/react-dialog": "^1.0.5",
    "@radix-ui/react-dropdown-menu": "^2.0.6",
    "@radix-ui/react-select": "^2.0.0",
    "@radix-ui/react-tabs": "^1.0.4",
    "@radix-ui/react-navigation-menu": "^1.1.4",
    "@radix-ui/react-sheet": "^1.0.3",
    "class-variance-authority": "^0.7.0",
    "clsx": "^2.1.0",
    "tailwind-merge": "^2.2.1",
    "lucide-react": "^0.344.0",
    "tailwindcss-animate": "^1.0.7"
  },
  "devDependencies": {
    "@types/react": "^18.2.56",
    "@types/react-dom": "^18.2.19",
    "@vitejs/plugin-react": "^4.2.1",
    "autoprefixer": "^10.4.18",
    "postcss": "^8.4.35",
    "tailwindcss": "^3.4.1",
    "typescript": "^5.2.2",
    "vite": "^5.1.4"
  }
}
```

- [ ] **Step 2: Create vite.config.ts**

```ts
import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'
import path from 'path'

export default defineConfig({
  plugins: [react()],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src'),
    },
  },
})
```

- [ ] **Step 3: Create tsconfig.json**

```json
{
  "compilerOptions": {
    "target": "ES2020",
    "useDefineForClassFields": true,
    "lib": ["ES2020", "DOM", "DOM.Iterable"],
    "module": "ESNext",
    "skipLibCheck": true,
    "moduleResolution": "bundler",
    "allowImportingTsExtensions": true,
    "resolveJsonModule": true,
    "isolatedModules": true,
    "noEmit": true,
    "jsx": "react-jsx",
    "strict": true,
    "noUnusedLocals": true,
    "noUnusedParameters": true,
    "noFallthroughCasesInSwitch": true,
    "baseUrl": ".",
    "paths": {
      "@/*": ["./src/*"]
    }
  },
  "include": ["src"],
  "references": [{ "path": "./tsconfig.node.json" }]
}
```

- [ ] **Step 4: Create tsconfig.node.json**

```json
{
  "compilerOptions": {
    "composite": true,
    "skipLibCheck": true,
    "module": "ESNext",
    "moduleResolution": "bundler",
    "allowSyntheticDefaultImports": true,
    "strict": true
  },
  "include": ["vite.config.ts"]
}
```

- [ ] **Step 5: Create index.html**

```html
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SISKA - Sistem Informasi Komoditas Perkebunan Kalimantan Tengah</title>
  </head>
  <body>
    <div id="root"></div>
    <script type="module" src="/src/main.tsx"></script>
  </body>
</html>
```

- [ ] **Step 6: Create tailwind.config.js**

```js
/** @type {import('tailwindcss').Config} */
export default {
  darkMode: ["class"],
  content: [
    './pages/**/*.{ts,tsx}',
    './components/**/*.{ts,tsx}',
    './app/**/*.{ts,tsx}',
    './src/**/*.{ts,tsx}',
  ],
  theme: {
    container: {
      center: true,
      padding: "2rem",
      screens: {
        "2xl": "1400px",
      },
    },
    extend: {
      colors: {
        siska: {
          DEFAULT: '#1E6091',
          dark: '#154a73',
          light: '#3a82b8',
        },
        plantation: {
          DEFAULT: '#2D8B4E',
          dark: '#1f6b3a',
          light: '#4aaa6b',
        },
        amber: {
          DEFAULT: '#F59E0B',
        },
        background: '#F8FAFC',
        foreground: '#1E293B',
      },
      fontFamily: {
        montserrat: ['Montserrat', 'sans-serif'],
      },
      keyframes: {
        "accordion-down": {
          from: { height: "0" },
          to: { height: "var(--radix-accordion-content-height)" },
        },
        "accordion-up": {
          from: { height: "var(--radix-accordion-content-height)" },
          to: { height: "0" },
        },
      },
      animation: {
        "accordion-down": "accordion-down 0.2s ease-out",
        "accordion-up": "accordion-up 0.2s ease-out",
      },
    },
  },
  plugins: [require("tailwindcss-animate")],
}
```

- [ ] **Step 7: Create postcss.config.js**

```js
export default {
  plugins: {
    tailwindcss: {},
    autoprefixer: {},
  },
}
```

- [ ] **Step 8: Create components.json (shadcn/ui CLI config)**

```json
{
  "$schema": "https://ui.shadcn.com/schema.json",
  "style": "default",
  "rsc": false,
  "tsx": true,
  "tailwind": {
    "config": "tailwind.config.js",
    "css": "src/index.css",
    "baseColor": "slate",
    "cssVariables": true
  },
  "aliases": {
    "components": "@/components",
    "utils": "@/lib/utils"
  }
}
```

- [ ] **Step 9: Create src/index.css**

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap');

@layer base {
  * {
    @apply border-border;
  }
  body {
    @apply bg-background text-foreground font-montserrat;
  }
}
```

- [ ] **Step 10: Create src/main.tsx**

```tsx
import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App'
import './index.css'

ReactDOM.createRoot(document.getElementById('root')!).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>,
)
```

- [ ] **Step 11: Create src/App.tsx**

```tsx
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import MainLayout from './layout/MainLayout'
import DashboardLayout from './layout/DashboardLayout'
import AuthLayout from './layout/AuthLayout'
import HomePage from './pages/HomePage'
import SawitDashboard from './pages/SawitDashboard'
import DataPage from './pages/DataPage'
import MapPage from './pages/MapPage'
import LoginPage from './pages/LoginPage'
import TentangPage from './pages/TentangPage'
import FAQPage from './pages/FAQPage'
import TimPage from './pages/TimPage'
import GlossaryPage from './pages/GlossaryPage'
import AboutPage from './pages/AboutPage'
import { AuthProvider } from './context/AuthContext'

function App() {
  return (
    <AuthProvider>
      <BrowserRouter>
        <Routes>
          <Route element={<MainLayout />}>
            <Route path="/" element={<HomePage />} />
            <Route path="/tentang" element={<TentangPage />} />
            <Route path="/faq" element={<FAQPage />} />
            <Route path="/tim" element={<TimPage />} />
            <Route path="/glossary" element={<GlossaryPage />} />
            <Route path="/siska" element={<AboutPage />} />
          </Route>
          <Route path="/dashboard" element={<DashboardLayout />}>
            <Route index element={<SawitDashboard />} />
            <Route path="data" element={<DataPage />} />
            <Route path="map" element={<MapPage />} />
          </Route>
          <Route element={<AuthLayout />}>
            <Route path="/login" element={<LoginPage />} />
          </Route>
        </Routes>
      </BrowserRouter>
    </AuthProvider>
  )
}

export default App
```

- [ ] **Step 12: Create src/lib/utils.ts**

```ts
import { type ClassValue, clsx } from "clsx"
import { twMerge } from "tailwind-merge"

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs))
}
```

- [ ] **Step 13: Create src/lib/constants.ts**

```ts
export const COLORS = {
  siska: {
    DEFAULT: '#1E6091',
    dark: '#154a73',
    light: '#3a82b8',
  },
  plantation: {
    DEFAULT: '#2D8B4E',
    dark: '#1f6b3a',
    light: '#4aaa6b',
  },
  amber: '#F59E0B',
}

export const BREAKPOINTS = {
  sm: 640,
  md: 768,
  lg: 1024,
  xl: 1280,
  '2xl': 1536,
}

export const SIDEBAR_WIDTH = '280px'
export const SIDEBAR_WIDTH_COLLAPSED = '80px'
```

- [ ] **Step 14: Create src/context/AuthContext.tsx**

```tsx
import { createContext, useContext, useState, useEffect, ReactNode } from 'react'

interface AuthContextType {
  isAuthenticated: boolean
  login: (username: string, password: string) => boolean
  logout: () => void
}

const AuthContext = createContext<AuthContextType | undefined>(undefined)

export function AuthProvider({ children }: { children: ReactNode }) {
  const [isAuthenticated, setIsAuthenticated] = useState(false)

  useEffect(() => {
    const stored = localStorage.getItem('siska_auth')
    if (stored === 'true') {
      setIsAuthenticated(true)
    }
  }, [])

  const login = (username: string, password: string): boolean => {
    // Simple auth - in production this would call an API
    if (username === 'admin' && password === 'siska2024') {
      setIsAuthenticated(true)
      localStorage.setItem('siska_auth', 'true')
      return true
    }
    return false
  }

  const logout = () => {
    setIsAuthenticated(false)
    localStorage.removeItem('siska_auth')
  }

  return (
    <AuthContext.Provider value={{ isAuthenticated, login, logout }}>
      {children}
    </AuthContext.Provider>
  )
}

export function useAuth() {
  const context = useContext(AuthContext)
  if (context === undefined) {
    throw new Error('useAuth must be used within an AuthProvider')
  }
  return context
}
```

- [ ] **Step 15: Install dependencies and verify build**

Run: `cd larasiska-react && npm install`
Run: `npm run build`
Expected: Clean build with no errors

- [ ] **Step 16: Commit**

```bash
cd /Users/muhammadalichamdan/Documents/Development/larasiska-react
git init
git add package.json vite.config.ts tsconfig.json tsconfig.node.json index.html tailwind.config.js postcss.config.js components.json src/main.tsx src/App.tsx src/index.css src/lib/utils.ts src/lib/constants.ts src/context/AuthContext.tsx
git commit -m "feat: scaffold Vite + React + TypeScript project with Tailwind and shadcn/ui"
```

---

## Task 2: shadcn/ui Components

**Goal:** Add required shadcn/ui components

**Files:**
- Create: `src/components/ui/button.tsx`
- Create: `src/components/ui/card.tsx`
- Create: `src/components/ui/tabs.tsx`
- Create: `src/components/ui/accordion.tsx`
- Create: `src/components/ui/input.tsx`
- Create: `src/components/ui/sheet.tsx`
- Create: `src/components/ui/dropdown-menu.tsx`
- Create: `src/components/ui/navigation-menu.tsx`
- Create: `src/components/ui/scroll-area.tsx`
- Create: `src/components/ui/separator.tsx`

- [ ] **Step 1: Create button.tsx**

```tsx
import * as React from "react"
import { Slot } from "@radix-ui/react-slot"
import { cva, type VariantProps } from "class-variance-authority"
import { cn } from "@/lib/utils"

const buttonVariants = cva(
  "inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50",
  {
    variants: {
      variant: {
        default: "bg-siska text-white hover:bg-siska-dark",
        destructive: "bg-red-500 text-white hover:bg-red-600",
        outline: "border border-input bg-background hover:bg-accent hover:text-accent-foreground",
        secondary: "bg-plantation text-white hover:bg-plantation-dark",
        ghost: "hover:bg-accent hover:text-accent-foreground",
        link: "text-siska underline-offset-4 hover:underline",
      },
      size: {
        default: "h-10 px-4 py-2",
        sm: "h-9 rounded-md px-3",
        lg: "h-11 rounded-md px-8",
        icon: "h-10 w-10",
      },
    },
    defaultVariants: {
      variant: "default",
      size: "default",
    },
  }
)

export interface ButtonProps
  extends React.ButtonHTMLAttributes<HTMLButtonElement>,
    VariantProps<typeof buttonVariants> {
  asChild?: boolean
}

const Button = React.forwardRef<HTMLButtonElement, ButtonProps>(
  ({ className, variant, size, asChild = false, ...props }, ref) => {
    const Comp = asChild ? Slot : "button"
    return (
      <Comp
        className={cn(buttonVariants({ variant, size, className }))}
        ref={ref}
        {...props}
      />
    )
  }
)
Button.displayName = "Button"

export { Button, buttonVariants }
```

- [ ] **Step 2: Create card.tsx**

```tsx
import * as React from "react"
import { cn } from "@/lib/utils"

const Card = React.forwardRef<HTMLDivElement, React.HTMLAttributes<HTMLDivElement>>(
  ({ className, ...props }, ref) => (
    <div
      ref={ref}
      className={cn("rounded-lg border bg-card text-card-foreground shadow-sm", className)}
      {...props}
    />
  )
)
Card.displayName = "Card"

const CardHeader = React.forwardRef<HTMLDivElement, React.HTMLAttributes<HTMLDivElement>>(
  ({ className, ...props }, ref) => (
    <div ref={ref} className={cn("flex flex-col space-y-1.5 p-6", className)} {...props} />
  )
)
CardHeader.displayName = "CardHeader"

const CardTitle = React.forwardRef<HTMLParagraphElement, React.HTMLAttributes<HTMLHeadingElement>>(
  ({ className, ...props }, ref) => (
    <h3
      ref={ref}
      className={cn("text-2xl font-semibold leading-none tracking-tight", className)}
      {...props}
    />
  )
)
CardTitle.displayName = "CardTitle"

const CardDescription = React.forwardRef<HTMLParagraphElement, React.HTMLAttributes<HTMLParagraphElement>>(
  ({ className, ...props }, ref) => (
    <p ref={ref} className={cn("text-sm text-muted-foreground", className)} {...props} />
  )
)
CardDescription.displayName = "CardDescription"

const CardContent = React.forwardRef<HTMLDivElement, React.HTMLAttributes<HTMLDivElement>>(
  ({ className, ...props }, ref) => (
    <div ref={ref} className={cn("p-6 pt-0", className)} {...props} />
  )
)
CardContent.displayName = "CardContent"

const CardFooter = React.forwardRef<HTMLDivElement, React.HTMLAttributes<HTMLDivElement>>(
  ({ className, ...props }, ref) => (
    <div ref={ref} className={cn("flex items-center p-6 pt-0", className)} {...props} />
  )
)
CardFooter.displayName = "CardFooter"

export { Card, CardHeader, CardFooter, CardTitle, CardDescription, CardContent }
```

- [ ] **Step 3: Create tabs.tsx**

```tsx
import * as React from "react"
import * as TabsPrimitive from "@radix-ui/react-tabs"
import { cn } from "@/lib/utils"

const Tabs = TabsPrimitive.Root

const TabsList = React.forwardRef<
  React.ElementRef<typeof TabsPrimitive.List>,
  React.ComponentPropsWithoutRef<typeof TabsPrimitive.List>
>(({ className, ...props }, ref) => (
  <TabsPrimitive.List
    ref={ref}
    className={cn(
      "inline-flex h-10 items-center justify-center rounded-md bg-muted p-1 text-muted-foreground",
      className
    )}
    {...props}
  />
))
TabsList.displayName = TabsPrimitive.List.displayName

const TabsTrigger = React.forwardRef<
  React.ElementRef<typeof TabsPrimitive.Trigger>,
  React.ComponentPropsWithoutRef<typeof TabsPrimitive.Trigger>
>(({ className, ...props }, ref) => (
  <TabsPrimitive.Trigger
    ref={ref}
    className={cn(
      "inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm",
      className
    )}
    {...props}
  />
))
TabsTrigger.displayName = TabsPrimitive.Trigger.displayName

const TabsContent = React.forwardRef<
  React.ElementRef<typeof TabsPrimitive.Content>,
  React.ComponentPropsWithoutRef<typeof TabsPrimitive.Content>
>(({ className, ...props }, ref) => (
  <TabsPrimitive.Content
    ref={ref}
    className={cn(
      "mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2",
      className
    )}
    {...props}
  />
))
TabsContent.displayName = TabsPrimitive.Content.displayName

export { Tabs, TabsList, TabsTrigger, TabsContent }
```

- [ ] **Step 4: Create accordion.tsx**

```tsx
import * as React from "react"
import * as AccordionPrimitive from "@radix-ui/react-accordion"
import { cn } from "@/lib/utils"

const Accordion = AccordionPrimitive.Root

const AccordionItem = React.forwardRef<
  React.ElementRef<typeof AccordionPrimitive.Item>,
  React.ComponentPropsWithoutRef<typeof AccordionPrimitive.Item>
>(({ className, ...props }, ref) => (
  <AccordionPrimitive.Item ref={ref} className={cn("border-b", className)} {...props} />
))
AccordionItem.displayName = "AccordionItem"

const AccordionTrigger = React.forwardRef<
  React.ElementRef<typeof AccordionPrimitive.Trigger>,
  React.ComponentPropsWithoutRef<typeof AccordionPrimitive.Trigger>
>(({ className, children, ...props }, ref) => (
  <AccordionPrimitive.Header className="flex">
    <AccordionPrimitive.Trigger
      ref={ref}
      className={cn(
        "flex flex-1 items-center justify-between py-4 font-medium transition-all hover:underline text-left",
        className
      )}
      {...props}
    >
      {children}
    </AccordionPrimitive.Trigger>
  </AccordionPrimitive.Header>
))
AccordionTrigger.displayName = AccordionPrimitive.Trigger.displayName

const AccordionContent = React.forwardRef<
  React.ElementRef<typeof AccordionPrimitive.Content>,
  React.ComponentPropsWithoutRef<typeof AccordionPrimitive.Content>
>(({ className, children, ...props }, ref) => (
  <AccordionPrimitive.Content
    ref={ref}
    className="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down"
    {...props}
  >
    <div className={cn("pb-4 pt-0", className)}>{children}</div>
  </AccordionPrimitive.Content>
))
AccordionContent.displayName = AccordionPrimitive.Content.displayName

export { Accordion, AccordionItem, AccordionTrigger, AccordionContent }
```

- [ ] **Step 5: Create input.tsx**

```tsx
import * as React from "react"
import { cn } from "@/lib/utils"

export interface InputProps extends React.InputHTMLAttributes<HTMLInputElement> {}

const Input = React.forwardRef<HTMLInputElement, InputProps>(
  ({ className, type, ...props }, ref) => {
    return (
      <input
        type={type}
        className={cn(
          "flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50",
          className
        )}
        ref={ref}
        {...props}
      />
    )
  }
)
Input.displayName = "Input"

export { Input }
```

- [ ] **Step 6: Create sheet.tsx**

```tsx
import * as React from "react"
import * as SheetPrimitive from "@radix-ui/react-dialog"
import { cva, type VariantProps } from "class-variance-authority"
import { X } from "lucide-react"
import { cn } from "@/lib/utils"

const Sheet = SheetPrimitive.Root
const SheetTrigger = SheetPrimitive.Trigger
const SheetClose = SheetPrimitive.Close
const SheetPortal = SheetPrimitive.Portal

const SheetOverlay = React.forwardRef<
  React.ElementRef<typeof SheetPrimitive.Overlay>,
  React.ComponentPropsWithoutRef<typeof SheetPrimitive.Overlay>
>(({ className, ...props }, ref) => (
  <SheetPrimitive.Overlay
    className={cn("fixed inset-0 z-50 bg-black/80 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0", className)}
    {...props}
    ref={ref}
  />
))
SheetOverlay.displayName = SheetPrimitive.Overlay.displayName

const sheetVariants = cva(
  "fixed z-50 gap-4 bg-background p-6 shadow-lg transition ease-in-out data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:duration-300 data-[state=open]:duration-500",
  {
    variants: {
      side: {
        top: "inset-x-0 top-0 border-b data-[state=closed]:slide-out-to-top data-[state=open]:slide-in-from-top",
        bottom: "inset-x-0 bottom-0 border-t data-[state=closed]:slide-out-to-bottom data-[state=open]:slide-in-from-bottom",
        left: "inset-y-0 left-0 h-full w-3/4 border-r data-[state=closed]:slide-out-to-left data-[state=open]:slide-in-from-left sm:max-w-sm",
        right: "inset-y-0 right-0 h-full w-3/4 border-l data-[state=closed]:slide-out-to-right data-[state=open]:slide-in-from-right sm:max-w-sm",
      },
    },
    defaultVariants: {
      side: "right",
    },
  }
)

interface SheetContentProps
  extends React.ComponentPropsWithoutRef<typeof SheetPrimitive.Content>,
    VariantProps<typeof sheetVariants> {}

const SheetContent = React.forwardRef<
  React.ElementRef<typeof SheetPrimitive.Content>,
  SheetContentProps
>(({ side = "right", className, children, ...props }, ref) => (
  <SheetPortal>
    <SheetOverlay />
    <SheetPrimitive.Content ref={ref} className={cn(sheetVariants({ side }), className)} {...props}>
      {children}
      <SheetPrimitive.Close className="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-secondary">
        <X className="h-4 w-4" />
        <span className="sr-only">Close</span>
      </SheetPrimitive.Close>
    </SheetPrimitive.Content>
  </SheetPortal>
))
SheetContent.displayName = SheetPrimitive.Content.displayName

const SheetHeader = ({ className, ...props }: React.HTMLAttributes<HTMLDivElement>) => (
  <div className={cn("flex flex-col space-y-2 text-center sm:text-left", className)} {...props} />
)
SheetHeader.displayName = "SheetHeader"

const SheetFooter = ({ className, ...props }: React.HTMLAttributes<HTMLDivElement>) => (
  <div className={cn("flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2", className)} {...props} />
)
SheetFooter.displayName = "SheetFooter"

const SheetTitle = React.forwardRef<
  React.ElementRef<typeof SheetPrimitive.Title>,
  React.ComponentPropsWithoutRef<typeof SheetPrimitive.Title>
>(({ className, ...props }, ref) => (
  <SheetPrimitive.Title ref={ref} className={cn("text-lg font-semibold text-foreground", className)} {...props} />
))
SheetTitle.displayName = SheetPrimitive.Title.displayName

const SheetDescription = React.forwardRef<
  React.ElementRef<typeof SheetPrimitive.Description>,
  React.ComponentPropsWithoutRef<typeof SheetPrimitive.Description>
>(({ className, ...props }, ref) => (
  <SheetPrimitive.Description ref={ref} className={cn("text-sm text-muted-foreground", className)} {...props} />
))
SheetDescription.displayName = SheetPrimitive.Description.displayName

export { Sheet, SheetPortal, SheetOverlay, SheetTrigger, SheetClose, SheetContent, SheetHeader, SheetFooter, SheetTitle, SheetDescription }
```

- [ ] **Step 7: Create dropdown-menu.tsx**

```tsx
import * as React from "react"
import * as DropdownMenuPrimitive from "@radix-ui/react-dropdown-menu"
import { cn } from "@/lib/utils"

const DropdownMenu = DropdownMenuPrimitive.Root
const DropdownMenuTrigger = DropdownMenuPrimitive.Trigger
const DropdownMenuGroup = DropdownMenuPrimitive.Group
const DropdownMenuPortal = DropdownMenuPrimitive.Portal
const DropdownMenuSub = DropdownMenuPrimitive.Sub
const DropdownMenuRadioGroup = DropdownMenuPrimitive.RadioGroup

const DropdownMenuContent = React.forwardRef<
  React.ElementRef<typeof DropdownMenuPrimitive.Content>,
  React.ComponentPropsWithoutRef<typeof DropdownMenuPrimitive.Content>
>(({ className, sideOffset = 4, ...props }, ref) => (
  <DropdownMenuPrimitive.Portal>
    <DropdownMenuPrimitive.Content
      ref={ref}
      sideOffset={sideOffset}
      className={cn(
        "z-50 min-w-[8rem] overflow-hidden rounded-md border bg-popover p-1 text-popover-foreground shadow-md data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2",
        className
      )}
      {...props}
    />
  </DropdownMenuPrimitive.Portal>
))
DropdownMenuContent.displayName = DropdownMenuPrimitive.Content.displayName

const DropdownMenuItem = React.forwardRef<
  React.ElementRef<typeof DropdownMenuPrimitive.Item>,
  React.ComponentPropsWithoutRef<typeof DropdownMenuPrimitive.Item> & { inset?: boolean }
>(({ className, inset, ...props }, ref) => (
  <DropdownMenuPrimitive.Item
    ref={ref}
    className={cn(
      "relative flex cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50",
      inset && "pl-8",
      className
    )}
    {...props}
  />
))
DropdownMenuItem.displayName = DropdownMenuPrimitive.Item.displayName

const DropdownMenuLabel = React.forwardRef<
  React.ElementRef<typeof DropdownMenuPrimitive.Label>,
  React.ComponentPropsWithoutRef<typeof DropdownMenuPrimitive.Label> & { inset?: boolean }
>(({ className, inset, ...props }, ref) => (
  <DropdownMenuPrimitive.Label
    ref={ref}
    className={cn("px-2 py-1.5 text-sm font-semibold", inset && "pl-8", className)}
    {...props}
  />
))
DropdownMenuLabel.displayName = DropdownMenuPrimitive.Label.displayName

const DropdownMenuSeparator = React.forwardRef<
  React.ElementRef<typeof DropdownMenuPrimitive.Separator>,
  React.ComponentPropsWithoutRef<typeof DropdownMenuPrimitive.Separator>
>(({ className, ...props }, ref) => (
  <DropdownMenuPrimitive.Separator ref={ref} className={cn("-mx-1 my-1 h-px bg-muted", className)} {...props} />
))
DropdownMenuSeparator.displayName = DropdownMenuPrimitive.Separator.displayName

export { DropdownMenu, DropdownMenuTrigger, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator, DropdownMenuGroup, DropdownMenuPortal, DropdownMenuSub, DropdownMenuRadioGroup }
```

- [ ] **Step 8: Create navigation-menu.tsx**

```tsx
import * as React from "react"
import * as NavigationMenuPrimitive from "@radix-ui/react-navigation-menu"
import { cva } from "class-variance-authority"
import { ChevronDown } from "lucide-react"
import { cn } from "@/lib/utils"

const NavigationMenu = React.forwardRef<
  React.ElementRef<typeof NavigationMenuPrimitive.Root>,
  React.ComponentPropsWithoutRef<typeof NavigationMenuPrimitive.Root>
>(({ className, children, ...props }, ref) => (
  <NavigationMenuPrimitive.Root ref={ref} className={cn("relative z-10 flex max-w-max flex-1 items-center justify-center", className)} {...props}>
    {children}
    <NavigationMenuViewport />
  </NavigationMenuPrimitive.Root>
))
NavigationMenu.displayName = NavigationMenuPrimitive.Root.displayName

const NavigationMenuList = React.forwardRef<
  React.ElementRef<typeof NavigationMenuPrimitive.List>,
  React.ComponentPropsWithoutRef<typeof NavigationMenuPrimitive.List>
>(({ className, ...props }, ref) => (
  <NavigationMenuPrimitive.List ref={ref} className={cn("group flex flex-1 list-none items-center justify-center", className)} {...props} />
))
NavigationMenuList.displayName = NavigationMenuPrimitive.List.displayName

const NavigationMenuItem = NavigationMenuPrimitive.Item

const NavigationMenuLink = NavigationMenuPrimitive.Link

const navigationMenuTriggerStyle = cva(
  "group inline-flex h-10 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 data-[active]:bg-accent/50"
)

const NavigationMenuTrigger = React.forwardRef<
  React.ElementRef<typeof NavigationMenuPrimitive.Trigger>,
  React.ComponentPropsWithoutRef<typeof NavigationMenuPrimitive.Trigger>
>(({ className, children, ...props }, ref) => (
  <NavigationMenuPrimitive.Trigger ref={ref} className={cn(navigationMenuTriggerStyle(), "group", className)} {...props}>
    {children}{" "}
    <ChevronDown className="relative top-[1px] ml-1 h-3 w-3 transition duration-200 group-data-[state=open]:rotate-180" aria-hidden="true" />
  </NavigationMenuPrimitive.Trigger>
))
NavigationMenuTrigger.displayName = NavigationMenuPrimitive.Trigger.displayName

const NavigationMenuContent = React.forwardRef<
  React.ElementRef<typeof NavigationMenuPrimitive.Content>,
  React.ComponentPropsWithoutRef<typeof NavigationMenuPrimitive.Content>
>(({ className, ...props }, ref) => (
  <NavigationMenuPrimitive.Content ref={ref} className={cn("left-0 top-0 w-full data-[motion^=from-]:animate-in data-[motion^=to-]:animate-out data-[motion^=from-]:fade-in data-[motion^=to-]:fade-out data-[motion=from-end]:slide-in-from-right-52 data-[motion=from-start]:slide-in-from-left-52 data-[motion=to-end]:slide-out-to-right-52 data-[motion=to-start]:slide-out-to-left-52 md:w-[125%] lg:w-[150%]", className)} {...props} />
))
NavigationMenuContent.displayName = NavigationMenuPrimitive.Content.displayName

const NavigationMenuViewport = React.forwardRef<
  React.ElementRef<typeof NavigationMenuPrimitive.Viewport>,
  React.ComponentPropsWithoutRef<typeof NavigationMenuPrimitive.Viewport>
>(({ className, ...props }, ref) => (
  <div className={cn("absolute top-full left-0 flex justify-center")}>
    <NavigationMenuPrimitive.Viewport className={cn("origin-top-center relative mt-1.5 h-[var(--radix-navigation-menu-viewport-height)] w-full overflow-hidden rounded-md border bg-popover text-popover-foreground shadow-lg data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 md:w-[var(--radix-navigation-menu-viewport-width)]", className)} ref={ref} {...props} />
  </div>
))
NavigationMenuViewport.displayName = NavigationMenuPrimitive.Viewport.displayName

const NavigationMenuIndicator = React.forwardRef<
  React.ElementRef<typeof NavigationMenuPrimitive.Indicator>,
  React.ComponentPropsWithoutRef<typeof NavigationMenuPrimitive.Indicator>
>(({ className, ...props }, ref) => (
  <NavigationMenuPrimitive.Indicator ref={ref} className={cn("top-full z-[1] flex h-1.5 items-end justify-center overflow-hidden data-[state=visible]:animate-in data-[state=hidden]:animate-out data-[state=hidden]:fade-out data-[state=visible]:fade-in", className)} {...props}>
    <div className="relative top-[60%] h-2 w-2 rotate-45 rounded-tl-sm bg-border shadow-md" />
  </NavigationMenuPrimitive.Indicator>
))
NavigationMenuIndicator.displayName = NavigationMenuPrimitive.Indicator.displayName

export { NavigationMenu, NavigationMenuList, NavigationMenuItem, NavigationMenuLink, NavigationMenuTrigger, NavigationMenuContent, NavigationMenuIndicator, NavigationMenuViewport }
```

- [ ] **Step 9: Create scroll-area.tsx**

```tsx
import * as React from "react"
import * as ScrollAreaPrimitive from "@radix-ui/react-scroll-area"
import { cn } from "@/lib/utils"

const ScrollArea = React.forwardRef<
  React.ElementRef<typeof ScrollAreaPrimitive.Root>,
  React.ComponentPropsWithoutRef<typeof ScrollAreaPrimitive.Root>
>(({ className, children, ...props }, ref) => (
  <ScrollAreaPrimitive.Root ref={ref} className={cn("relative overflow-hidden", className)} {...props}>
    <ScrollAreaPrimitive.Viewport className="h-full w-full rounded-[inherit]">
      {children}
    </ScrollAreaPrimitive.Viewport>
    <ScrollBar />
    <ScrollAreaPrimitive.Corner />
  </ScrollAreaPrimitive.Root>
))
ScrollArea.displayName = ScrollAreaPrimitive.Root.displayName

const ScrollBar = React.forwardRef<
  React.ElementRef<typeof ScrollAreaPrimitive.ScrollAreaScrollbar>,
  React.ComponentPropsWithoutRef<typeof ScrollAreaPrimitive.ScrollAreaScrollbar>
>(({ className, orientation = "vertical", ...props }, ref) => (
  <ScrollAreaPrimitive.ScrollAreaScrollbar
    ref={ref}
    orientation={orientation}
    className={cn(
      "flex touch-none select-none transition-colors",
      orientation === "vertical" && "h-full w-2.5 border-l border-l-transparent p-[1px]",
      orientation === "horizontal" && "h-2.5 flex-col border-t border-t-transparent p-[1px]",
      className
    )}
    {...props}
  >
    <ScrollAreaPrimitive.ScrollAreaThumb className="relative flex-1 rounded-full bg-border" />
  </ScrollAreaPrimitive.ScrollAreaScrollbar>
))
ScrollBar.displayName = ScrollAreaPrimitive.ScrollAreaScrollbar.displayName

export { ScrollArea, ScrollBar }
```

- [ ] **Step 10: Create separator.tsx**

```tsx
import * as React from "react"
import * as SeparatorPrimitive from "@radix-ui/react-separator"
import { cn } from "@/lib/utils"

const Separator = React.forwardRef<
  React.ElementRef<typeof SeparatorPrimitive.Root>,
  React.ComponentPropsWithoutRef<typeof SeparatorPrimitive.Root>
>(({ className, orientation = "horizontal", decorative = true, ...props }, ref) => (
  <SeparatorPrimitive.Root
    ref={ref}
    decorative={decorative}
    orientation={orientation}
    className={cn("shrink-0 bg-border", orientation === "horizontal" ? "h-[1px] w-full" : "h-full w-[1px]", className)}
    {...props}
  />
))
Separator.displayName = SeparatorPrimitive.Root.displayName

export { Separator }
```

- [ ] **Step 11: Commit**

```bash
cd /Users/muhammadalichamdan/Documents/Development/larasiska-react
git add src/components/ui/*.tsx
git commit -m "feat: add shadcn/ui components (button, card, tabs, accordion, input, sheet, dropdown-menu, navigation-menu, scroll-area, separator)"
```

---

## Task 3: Layout Components

**Goal:** Create MainLayout, DashboardLayout, AuthLayout, and navigation components

**Files:**
- Create: `src/layout/MainLayout.tsx`
- Create: `src/layout/DashboardLayout.tsx`
- Create: `src/layout/AuthLayout.tsx`
- Create: `src/components/TopNav.tsx`
- Create: `src/components/Sidebar.tsx`
- Create: `src/components/MobileNav.tsx`

- [ ] **Step 1: Create TopNav.tsx**

```tsx
import { Link, useLocation } from 'react-router-dom'
import { Menu, X, Leaf } from 'lucide-react'
import { useState } from 'react'
import { Button } from '@/components/ui/button'
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet'
import MobileNav from './MobileNav'

const navLinks = [
  { href: '/', label: 'Beranda' },
  { href: '/tentang', label: 'Tentang' },
  { href: '/dashboard', label: 'Dashboard' },
  { href: '/dashboard/map', label: 'Peta' },
  { href: '/dashboard/data', label: 'Data' },
]

export default function TopNav() {
  const location = useLocation()
  const [mobileOpen, setMobileOpen] = useState(false)

  return (
    <header className="sticky top-0 z-50 w-full border-b bg-white">
      <div className="max-w-7xl mx-auto px-4">
        <div className="flex h-16 items-center justify-between">
          {/* Logo */}
          <Link to="/" className="flex items-center gap-2">
            <Leaf className="h-8 w-8 text-plantation" />
            <span className="font-bold text-xl text-siska">SISKA</span>
          </Link>

          {/* Desktop Nav */}
          <nav className="hidden md:flex items-center gap-6">
            {navLinks.map((link) => (
              <Link
                key={link.href}
                to={link.href}
                className={`text-sm font-medium transition-colors hover:text-siska ${
                  location.pathname === link.href ? 'text-siska' : 'text-gray-600'
                }`}
              >
                {link.label}
              </Link>
            ))}
          </nav>

          {/* Desktop Login/Logout */}
          <div className="hidden md:block">
            <Link to="/login">
              <Button variant="outline" size="sm">Masuk</Button>
            </Link>
          </div>

          {/* Mobile Menu */}
          <Sheet open={mobileOpen} onOpenChange={setMobileOpen}>
            <SheetTrigger asChild className="md:hidden">
              <Button variant="ghost" size="icon">
                <Menu className="h-6 w-6" />
              </Button>
            </SheetTrigger>
            <SheetContent side="right" className="w-[280px]">
              <MobileNav onLinkClick={() => setMobileOpen(false)} />
            </SheetContent>
          </Sheet>
        </div>
      </div>
    </header>
  )
}
```

- [ ] **Step 2: Create MobileNav.tsx**

```tsx
import { Link, useLocation } from 'react-router-dom'
import { Leaf } from 'lucide-react'

const navLinks = [
  { href: '/', label: 'Beranda' },
  { href: '/tentang', label: 'Tentang' },
  { href: '/dashboard', label: 'Dashboard' },
  { href: '/dashboard/map', label: 'Peta' },
  { href: '/dashboard/data', label: 'Data' },
]

interface MobileNavProps {
  onLinkClick?: () => void
}

export default function MobileNav({ onLinkClick }: MobileNavProps) {
  const location = useLocation()

  return (
    <div className="flex flex-col gap-4 py-4">
      <Link to="/" className="flex items-center gap-2 px-2" onClick={onLinkClick}>
        <Leaf className="h-6 w-6 text-plantation" />
        <span className="font-bold text-lg text-siska">SISKA</span>
      </Link>
      <div className="flex flex-col gap-2">
        {navLinks.map((link) => (
          <Link
            key={link.href}
            to={link.href}
            onClick={onLinkClick}
            className={`px-2 py-2 text-sm font-medium rounded-md transition-colors ${
              location.pathname === link.href
                ? 'bg-siska text-white'
                : 'text-gray-600 hover:bg-gray-100'
            }`}
          >
            {link.label}
          </Link>
        ))}
      </div>
      <Link
        to="/login"
        onClick={onLinkClick}
        className="mt-4 px-4 py-2 text-sm font-medium text-center border border-siska text-siska rounded-md hover:bg-siska hover:text-white transition-colors"
      >
        Masuk
      </Link>
    </div>
  )
}
```

- [ ] **Step 3: Create Sidebar.tsx**

```tsx
import { Link, useLocation } from 'react-router-dom'
import { Leaf, BarChart3, TrendingUp, Factory, FileText, Users, Map } from 'lucide-react'
import { cn } from '@/lib/utils'

const sidebarLinks = [
  { href: '/dashboard', label: 'Dashboard', icon: BarChart3 },
  { href: '/dashboard/data', label: 'Data', icon: FileText },
  { href: '/dashboard/map', label: 'Peta', icon: Map },
]

const chartLinks = [
  { href: '/dashboard#mutasi', label: 'Mutasi Tanaman', icon: TrendingUp },
  { href: '/dashboard#pengusahaan', label: 'Pengusahaan', icon: Leaf },
  { href: '/dashboard#perkebunan', label: 'Perkebunan', icon: Users },
  { href: '/dashboard#produksi', label: 'Produksi', icon: Factory },
]

interface SidebarProps {
  className?: string
}

export default function Sidebar({ className }: SidebarProps) {
  const location = useLocation()

  return (
    <aside className={cn('w-[280px] border-r bg-white h-full', className)}>
      <div className="flex flex-col h-full py-4">
        {/* Logo */}
        <Link to="/" className="px-6 mb-6 flex items-center gap-2">
          <Leaf className="h-6 w-6 text-plantation" />
          <span className="font-bold text-lg text-siska">SISKA</span>
        </Link>

        {/* Main Nav */}
        <nav className="px-3 space-y-1">
          {sidebarLinks.map((link) => {
            const Icon = link.icon
            const isActive = location.pathname === link.href
            return (
              <Link
                key={link.href}
                to={link.href}
                className={cn(
                  'flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-md transition-colors',
                  isActive
                    ? 'bg-siska text-white'
                    : 'text-gray-600 hover:bg-gray-100'
                )}
              >
                <Icon className="h-4 w-4" />
                {link.label}
              </Link>
            )
          })}
        </nav>

        {/* Chart Links */}
        <div className="mt-8 px-3">
          <p className="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">
            Data Charts
          </p>
          <nav className="space-y-1">
            {chartLinks.map((link) => {
              const Icon = link.icon
              const isActive = location.hash === link.href
              return (
                <a
                  key={link.href}
                  href={link.href}
                  className={cn(
                    'flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-md transition-colors',
                    isActive
                      ? 'bg-plantation text-white'
                      : 'text-gray-600 hover:bg-gray-100'
                  )}
                >
                  <Icon className="h-4 w-4" />
                  {link.label}
                </a>
              )
            })}
          </nav>
        </div>

        {/* Spacer */}
        <div className="flex-1" />

        {/* Footer */}
        <div className="px-6 pt-4 border-t">
          <p className="text-xs text-gray-400">
            Dinas Perkebunan<br />
            Provinsi Kalimantan Tengah
          </p>
        </div>
      </div>
    </aside>
  )
}
```

- [ ] **Step 4: Create MainLayout.tsx**

```tsx
import { Outlet } from 'react-router-dom'
import TopNav from '@/components/TopNav'

export default function MainLayout() {
  return (
    <div className="min-h-screen flex flex-col">
      <TopNav />
      <main className="flex-1">
        <Outlet />
      </main>
      <footer className="py-6 px-4 border-t">
        <div className="max-w-7xl mx-auto text-center text-sm text-gray-500">
          <p>Dinas Perkebunan Provinsi Kalimantan Tengah</p>
          <p className="mt-1">Jl. Cilik Riwut Km. 4 Palangka Raya 73112</p>
        </div>
      </footer>
    </div>
  )
}
```

- [ ] **Step 5: Create DashboardLayout.tsx**

```tsx
import { Outlet } from 'react-router-dom'
import Sidebar from '@/components/Sidebar'

export default function DashboardLayout() {
  return (
    <div className="min-h-screen flex flex-col">
      {/* Top Bar */}
      <header className="sticky top-0 z-50 w-full border-b bg-white">
        <div className="max-w-7xl mx-auto px-4">
          <div className="flex h-12 items-center justify-between">
            <span className="font-semibold text-siska">Dashboard Sawit</span>
            <div className="flex items-center gap-4">
              <span className="text-sm text-gray-500">Admin</span>
            </div>
          </div>
        </div>
      </header>

      <div className="flex flex-1">
        {/* Sidebar */}
        <Sidebar className="hidden lg:flex" />

        {/* Main Content */}
        <main className="flex-1 p-6 bg-gray-50">
          <Outlet />
        </main>
      </div>
    </div>
  )
}
```

- [ ] **Step 6: Create AuthLayout.tsx**

```tsx
import { Outlet } from 'react-router-dom'
import { Leaf } from 'lucide-react'
import { Link } from 'react-router-dom'

export default function AuthLayout() {
  return (
    <div className="min-h-screen flex items-center justify-center bg-gray-50">
      <div className="w-full max-w-md p-8">
        {/* Logo */}
        <Link to="/" className="flex items-center justify-center gap-2 mb-8">
          <Leaf className="h-10 w-10 text-plantation" />
          <span className="font-bold text-2xl text-siska">SISKA</span>
        </Link>

        <Outlet />
      </div>
    </div>
  )
}
```

- [ ] **Step 7: Commit**

```bash
cd /Users/muhammadalichamdan/Documents/Development/larasiska-react
git add src/layout/*.tsx src/components/TopNav.tsx src/components/Sidebar.tsx src/components/MobileNav.tsx
git commit -m "feat: add layout components (MainLayout, DashboardLayout, AuthLayout) and navigation"
```

---

## Task 4: Homepage

**Goal:** Create homepage with expandable commodity cards

**Files:**
- Create: `src/pages/HomePage.tsx`
- Create: `src/components/CommodityCard.tsx`

- [ ] **Step 1: Create CommodityCard.tsx**

```tsx
import { useState } from 'react'
import { ChevronRight, Leaf } from 'lucide-react'
import { cn } from '@/lib/utils'

interface CommodityCardProps {
  name: string
  image: string
  stats: { label: string; value: string }[]
  links: { label: string; href: string }[]
  isOpen: boolean
  onToggle: () => void
  color: string
}

export default function CommodityCard({
  name,
  image,
  stats,
  links,
  isOpen,
  onToggle,
  color
}: CommodityCardProps) {
  return (
    <div
      className={cn(
        'relative overflow-hidden transition-all duration-500 ease-in-out cursor-pointer rounded-xl',
        'bg-cover bg-center flex items-center justify-center',
        isOpen ? 'w-full lg:w-7/12 h-64' : 'w-full lg:w-3/12 h-32'
      )}
      style={{ backgroundImage: `url(${image})` }}
      onClick={onToggle}
    >
      {/* Overlay */}
      <div className={cn(
        'absolute inset-0 transition-opacity duration-500',
        isOpen ? 'bg-black/50' : 'bg-black/30'
      )} />

      {/* Content */}
      <div className={cn(
        'relative z-10 flex flex-col items-center justify-center transition-all duration-500',
        isOpen ? 'items-start px-12 w-full' : 'items-center'
      )}>
        <div className="flex items-center gap-3">
          <Leaf className={cn('h-8 w-8 text-white', isOpen && 'hidden')} />
          <h2 className={cn(
            'font-extrabold text-white transition-all duration-500',
            isOpen ? 'text-4xl' : 'text-5xl'
          )}>
            {name}
          </h2>
        </div>

        {/* Expanded Content */}
        <div className={cn(
          'overflow-hidden transition-all duration-500',
          isOpen ? 'max-h-96 opacity-100 mt-6 w-full' : 'max-h-0 opacity-0'
        )}>
          <div className="space-y-6">
            {/* Links */}
            <div className="flex flex-wrap gap-2">
              {links.map((link) => (
                <a
                  key={link.href}
                  href={link.href}
                  className="bg-white/90 text-gray-800 px-3 py-1 rounded-full text-xs font-medium hover:bg-white transition-colors"
                  onClick={(e) => e.stopPropagation()}
                >
                  {link.label}
                </a>
              ))}
            </div>

            {/* Stats Grid */}
            <div className="grid grid-cols-2 gap-4">
              {stats.map((stat, idx) => (
                <div key={idx} className="bg-white/90 rounded-lg p-3">
                  <p className="text-xs text-gray-500">{stat.label}</p>
                  <p className="text-sm font-semibold text-gray-800">{stat.value}</p>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>

      {/* Expand indicator */}
      <ChevronRight className={cn(
        'absolute right-4 top-1/2 -translate-y-1/2 text-white transition-transform duration-300',
        isOpen && 'rotate-90'
      )} />
    </div>
  )
}
```

- [ ] **Step 2: Create HomePage.tsx**

```tsx
import { useState } from 'react'
import CommodityCard from '@/components/CommodityCard'

const commodities = [
  {
    name: 'Sawit',
    image: '/assets/v1/sawitfull.png',
    color: 'bg-green-600',
    links: [
      { label: 'Dashboard', href: '/dashboard' },
      { label: 'Mutasi Tanaman', href: '/dashboard#mutasi' },
      { label: 'Pengusahaan', href: '/dashboard#pengusahaan' },
    ],
    stats: [
      { label: 'Luas Total', value: '2.029.319 ha' },
      { label: 'Izin Usaha', value: '2.936.486 ha' },
      { label: 'TM', value: '1.949.146 ha' },
      { label: 'TBM', value: '13.319 ha' },
      { label: 'TR', value: '66.854 ha' },
      { label: 'PBS', value: '1.731.586 ha' },
    ],
  },
  {
    name: 'Karet',
    image: '/assets/v1/karetfull.png',
    color: 'bg-amber-600',
    links: [
      { label: 'Produksi', href: '/dashboard#produksi' },
    ],
    stats: [
      { label: 'Produksi', value: '2,45 Juta Ton' },
      { label: 'Periode', value: 'Januari - Mei 2022' },
    ],
  },
  {
    name: 'Kelapa',
    image: '/assets/v1/kelapafull.png',
    color: 'bg-yellow-600',
    links: [
      { label: 'Izin', href: '/dashboard#izin' },
    ],
    stats: [
      { label: 'Total Izin', value: '280 Izin' },
    ],
  },
  {
    name: 'Lada',
    image: '/assets/v1/ladafull.png',
    color: 'bg-red-600',
    links: [
      { label: 'Sawit Rakyat', href: '/dashboard#sawit-rakyat' },
    ],
    stats: [
      { label: 'Luas', value: '39 Ribu Ha' },
    ],
  },
]

export default function HomePage() {
  const [openCard, setOpenCard] = useState<string | null>('Sawit')

  return (
    <div>
      {/* Hero Section */}
      <section className="bg-white py-4 hidden sm:block">
        <div className="max-w-7xl mx-auto flex justify-between items-center px-4">
          <div className="flex items-center gap-4">
            <img src="/assets/v1/gubernur.png" alt="Gubernur" className="h-16" />
            <div>
              <h1 className="font-bold text-sm">H. Sugianto Sabran</h1>
              <p className="text-xs text-gray-500">Gubernur Kalimantan Tengah</p>
            </div>
          </div>
          <h1 className="font-bold text-xl text-center hidden lg:block">
            Sistem Informasi Komoditas Perkebunan Kalimantan Tengah
          </h1>
          <div className="flex items-center gap-4">
            <div className="text-right">
              <h1 className="font-bold text-sm">H. Edy Pratowo</h1>
              <p className="text-xs text-gray-500">Wakil Gubernur Kalimantan Tengah</p>
            </div>
            <img src="/assets/v1/wagub.png" alt="Wakil Gubernur" className="h-16" />
          </div>
        </div>
      </section>

      {/* Commodity Cards */}
      <section className="flex flex-col lg:flex-row overflow-x-scroll h-[calc(100vh-180px)]">
        {commodities.map((commodity) => (
          <CommodityCard
            key={commodity.name}
            {...commodity}
            isOpen={openCard === commodity.name}
            onToggle={() => setOpenCard(openCard === commodity.name ? null : commodity.name)}
          />
        ))}
      </section>

      {/* Mobile Hero */}
      <section className="bg-siska py-4 sm:hidden">
        <h1 className="font-bold text-sm text-center text-white px-4">
          Terwujud perkebunan yang produktif, berdaya saing dan berkelanjutan
        </h1>
      </section>
    </div>
  )
}
```

- [ ] **Step 3: Commit**

```bash
cd /Users/muhammadalichamdan/Documents/Development/larasiska-react
git add src/pages/HomePage.tsx src/components/CommodityCard.tsx
git commit -m "feat: create homepage with expandable commodity cards"
```

---

## Task 5: Consolidated SawitDashboard

**Goal:** Create the main dashboard page with tabs for all chart sections

**Files:**
- Create: `src/pages/SawitDashboard.tsx`
- Create: `src/components/StatCard.tsx`
- Create: `src/components/charts/MutasiChart.tsx`
- Create: `src/components/charts/PengusahaanChart.tsx`
- Create: `src/data/sawitData.ts`

- [ ] **Step 1: Create StatCard.tsx**

```tsx
import { cn } from '@/lib/utils'

interface StatCardProps {
  label: string
  value: string
  className?: string
}

export default function StatCard({ label, value, className }: StatCardProps) {
  return (
    <div className={cn('bg-white rounded-lg border p-4 shadow-sm', className)}>
      <p className="text-xs text-gray-500 uppercase tracking-wide">{label}</p>
      <p className="text-xl font-bold text-siska mt-1">{value}</p>
    </div>
  )
}
```

- [ ] **Step 2: Create sample data file src/data/sawitData.ts**

```ts
export const mutasiData = {
  pbs: {
    years: [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021],
    tbm: [5038, 5238, 5438, 5638, 5838, 6038, 6238, 6438, 6638, 6838, 7038, 7238],
    tm: [912234, 932234, 952234, 972234, 992234, 1012234, 1032234, 1052234, 1072234, 1092234, 1112234, 1132234],
    tr: [22817, 23817, 24817, 25817, 26817, 27817, 28817, 29817, 30817, 31817, 32817, 33817],
  },
  rakyat: {
    years: [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021],
    tbm: [7038, 7238, 7438, 7638, 7838, 8038, 8238, 8438, 8638, 8838, 9038, 9238],
    tm: [192234, 194234, 196234, 198234, 200234, 202234, 204234, 206234, 208234, 210234, 212234, 214234],
    tr: [32817, 33817, 34817, 35817, 36817, 37817, 38817, 39817, 40817, 41817, 42817, 43817],
  },
}

export const pengusahaanData = {
  years: [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021],
  pbs: [1432586, 1452586, 1472586, 1492586, 1512586, 1532586, 1552586, 1572586, 1592586, 1612586, 1632586, 1652586],
  pbr: [237843, 239843, 241843, 243843, 245843, 247843, 249843, 251843, 253843, 255843, 257843, 259843],
}

export const summaryStats = {
  totalLuas: '2.029.319 ha',
  izinUsaha: '2.936.486 ha',
  tm: '1.949.146 ha',
  tbm: '13.319 ha',
  tr: '66.854 ha',
  pbs: '1.731.586 ha',
  pbr: '297.733 ha',
  tbs: '2.512.651 Ton',
  cpo: '2.453.631 Ton',
  jumlahPabrik: '127 Unit',
}
```

- [ ] **Step 3: Create MutasiChart.tsx**

```tsx
import {
  AreaChart,
  Area,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  Legend,
  ResponsiveContainer,
} from 'recharts'

interface MutasiChartProps {
  data: {
    years: number[]
    tbm: number[]
    tm: number[]
    tr: number[]
  }
}

export default function MutasiChart({ data }: MutasiChartProps) {
  const chartData = data.years.map((year, idx) => ({
    year,
    tbm: data.tbm[idx],
    tm: data.tm[idx],
    tr: data.tr[idx],
  }))

  return (
    <ResponsiveContainer width="100%" height={400}>
      <AreaChart data={chartData} margin={{ top: 10, right: 30, left: 0, bottom: 0 }}>
        <CartesianGrid strokeDasharray="3 3" stroke="#eee" />
        <XAxis dataKey="year" tick={{ fontSize: 12 }} />
        <YAxis tick={{ fontSize: 12 }} />
        <Tooltip
          contentStyle={{ borderRadius: 8, border: 'none', boxShadow: '0 2px 8px rgba(0,0,0,0.1)' }}
        />
        <Legend />
        <Area
          type="monotone"
          dataKey="tbm"
          name="Tanam Belum Menghasilkan (ha)"
          stackId="1"
          stroke="#F59E0B"
          fill="#FEF3C7"
        />
        <Area
          type="monotone"
          dataKey="tm"
          name="Tanaman Menghasilkan (ha)"
          stackId="1"
          stroke="#2D8B4E"
          fill="#D1FAE5"
        />
        <Area
          type="monotone"
          dataKey="tr"
          name="Tanaman Rusak (ha)"
          stackId="1"
          stroke="#EF4444"
          fill="#FEE2E2"
        />
      </AreaChart>
    </ResponsiveContainer>
  )
}
```

- [ ] **Step 4: Create PengusahaanChart.tsx**

```tsx
import {
  ComposedChart,
  Bar,
  Line,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  Legend,
  ResponsiveContainer,
} from 'recharts'

interface PengusahaanChartProps {
  data: {
    years: number[]
    pbs: number[]
    pbr: number[]
  }
}

export default function PengusahaanChart({ data }: PengusahaanChartProps) {
  const chartData = data.years.map((year, idx) => ({
    year,
    pbs: data.pbs[idx],
    pbr: data.pbr[idx],
  }))

  return (
    <ResponsiveContainer width="100%" height={400}>
      <ComposedChart data={chartData} margin={{ top: 10, right: 30, left: 0, bottom: 0 }}>
        <CartesianGrid strokeDasharray="3 3" stroke="#eee" />
        <XAxis dataKey="year" tick={{ fontSize: 12 }} />
        <YAxis tick={{ fontSize: 12 }} />
        <Tooltip
          contentStyle={{ borderRadius: 8, border: 'none', boxShadow: '0 2px 8px rgba(0,0,0,0.1)' }}
        />
        <Legend />
        <Bar dataKey="pbs" name="Perkebunan Besar Swasta (ha)" fill="#1E6091" barSize={20} />
        <Bar dataKey="pbr" name="Perkebunan Rakyat (ha)" fill="#2D8B4E" barSize={20} />
        <Line type="monotone" dataKey="pbs" name="PBS Trend" stroke="#1E6091" strokeWidth={2} dot={false} />
        <Line type="monotone" dataKey="pbr" name="PBR Trend" stroke="#2D8B4E" strokeWidth={2} dot={false} />
      </ComposedChart>
    </ResponsiveContainer>
  )
}
```

- [ ] **Step 5: Create SawitDashboard.tsx**

```tsx
import { useState } from 'react'
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import StatCard from '@/components/StatCard'
import MutasiChart from '@/components/charts/MutasiChart'
import PengusahaanChart from '@/components/charts/PengusahaanChart'
import { mutasiData, pengusahaanData, summaryStats } from '@/data/sawitData'

export default function SawitDashboard() {
  const [activeTab, setActiveTab] = useState('mutasi')
  const [subTab, setSubTab] = useState<'pbs' | 'rakyat'>('pbs')

  return (
    <div className="space-y-6">
      {/* Summary Stats */}
      <div className="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4">
        <StatCard label="Total Luas" value={summaryStats.totalLuas} />
        <StatCard label="Izin Usaha" value={summaryStats.izinUsaha} />
        <StatCard label="TM" value={summaryStats.tm} />
        <StatCard label="TBM" value={summaryStats.tbm} />
        <StatCard label="TR" value={summaryStats.tr} />
        <StatCard label="PBS" value={summaryStats.pbs} />
        <StatCard label="PBR" value={summaryStats.pbr} />
      </div>

      {/* Main Chart Area */}
      <Tabs value={activeTab} onValueChange={setActiveTab}>
        <div className="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
          <TabsList>
            <TabsTrigger value="mutasi">Mutasi Tanaman</TabsTrigger>
            <TabsTrigger value="pengusahaan">Pengusahaan</TabsTrigger>
            <TabsTrigger value="perkebunan">Perkebunan</TabsTrigger>
            <TabsTrigger value="produksi">Produksi</TabsTrigger>
          </TabsList>

          {/* Sub-tabs for Mutasi */}
          {activeTab === 'mutasi' && (
            <TabsList>
              <TabsTrigger value="pbs" onClick={() => setSubTab('pbs')}>
                PBS
              </TabsTrigger>
              <TabsTrigger value="rakyat" onClick={() => setSubTab('rakyat')}>
                Rakyat
              </TabsTrigger>
            </TabsList>
          )}
        </div>

        <Card>
          <CardHeader>
            <CardTitle>
              {activeTab === 'mutasi' && `Mutasi Tanaman - ${subTab === 'pbs' ? 'Perkebunan Besar Swasta' : 'Perkebunan Rakyat'}`}
              {activeTab === 'pengusahaan' && 'Pengusahaan'}
              {activeTab === 'perkebunan' && 'Perkebunan'}
              {activeTab === 'produksi' && 'Produksi'}
            </CardTitle>
          </CardHeader>
          <CardContent>
            <TabsContent value="mutasi" className="mt-0">
              <MutasiChart data={subTab === 'pbs' ? mutasiData.pbs : mutasiData.rakyat} />
            </TabsContent>
            <TabsContent value="pengusahaan" className="mt-0">
              <PengusahaanChart data={pengusahaanData} />
            </TabsContent>
            <TabsContent value="perkebunan" className="mt-0">
              <p className="text-gray-500 text-center py-12">Data Perkebunan chart will appear here</p>
            </TabsContent>
            <TabsContent value="produksi" className="mt-0">
              {/* Production Stats Grid */}
              <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                <StatCard label="TBS" value={summaryStats.tbs} className="text-center" />
                <StatCard label="CPO" value={summaryStats.cpo} className="text-center" />
                <StatCard label="Jumlah Pabrik" value={summaryStats.jumlahPabrik} className="text-center" />
              </div>
            </TabsContent>
          </CardContent>
        </Card>
      </Tabs>
    </div>
  )
}
```

- [ ] **Step 6: Commit**

```bash
cd /Users/muhammadalichamdan/Documents/Development/larasiska-react
git add src/pages/SawitDashboard.tsx src/components/StatCard.tsx src/components/charts/*.tsx src/data/sawitData.ts
git commit -m "feat: create consolidated SawitDashboard with tabs and charts"
```

---

## Task 6: Remaining Pages

**Goal:** Create all remaining pages (DataPage, MapPage, LoginPage, TentangPage, FAQPage, TimPage, GlossaryPage, AboutPage)

**Files:**
- Create: `src/pages/DataPage.tsx`
- Create: `src/pages/MapPage.tsx`
- Create: `src/pages/LoginPage.tsx`
- Create: `src/pages/TentangPage.tsx`
- Create: `src/pages/FAQPage.tsx`
- Create: `src/pages/TimPage.tsx`
- Create: `src/pages/GlossaryPage.tsx`
- Create: `src/pages/AboutPage.tsx`

- [ ] **Step 1: Create DataPage.tsx**

```tsx
import { useState } from 'react'
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Button } from '@/components/ui/button'

const commodities = ['Sawit', 'Karet', 'Kelapa', 'Lada', 'Kopi', 'Kakao']

const sampleData = [
  { tahun: 2021, luas: 2031234, produksi: 4512233, produktifitas: 2.22 },
  { tahun: 2020, luas: 2019234, produksi: 4421233, produktifitas: 2.19 },
  { tahun: 2019, luas: 1998234, produksi: 4312233, produktifitas: 2.16 },
]

export default function DataPage() {
  const [activeCommodity, setActiveCommodity] = useState('Sawit')
  const [searchTerm, setSearchTerm] = useState('')

  return (
    <div className="space-y-6">
      <div className="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h1 className="text-2xl font-bold text-siska">Data Komoditas</h1>
        <Input
          placeholder="Cari data..."
          value={searchTerm}
          onChange={(e) => setSearchTerm(e.target.value)}
          className="max-w-xs"
        />
      </div>

      <Tabs value={activeCommodity} onValueChange={setActiveCommodity}>
        <TabsList className="flex flex-wrap h-auto">
          {commodities.map((commodity) => (
            <TabsTrigger key={commodity} value={commodity}>
              {commodity}
            </TabsTrigger>
          ))}
        </TabsList>

        {commodities.map((commodity) => (
          <TabsContent key={commodity} value={commodity} className="mt-4">
            <Card>
              <CardHeader>
                <CardTitle>Data {commodity}</CardTitle>
              </CardHeader>
              <CardContent>
                <div className="overflow-x-auto">
                  <table className="w-full text-sm">
                    <thead>
                      <tr className="border-b">
                        <th className="text-left py-2 px-3">Tahun</th>
                        <th className="text-right py-2 px-3">Luas (ha)</th>
                        <th className="text-right py-2 px-3">Produksi (Ton)</th>
                        <th className="text-right py-2 px-3">Produktifitas</th>
                      </tr>
                    </thead>
                    <tbody>
                      {sampleData.map((row) => (
                        <tr key={row.tahun} className="border-b hover:bg-gray-50">
                          <td className="py-2 px-3">{row.tahun}</td>
                          <td className="text-right py-2 px-3">{row.luas.toLocaleString()}</td>
                          <td className="text-right py-2 px-3">{row.produksi.toLocaleString()}</td>
                          <td className="text-right py-2 px-3">{row.produktifitas}</td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
                <div className="flex justify-between items-center mt-4">
                  <Button variant="outline" size="sm">Previous</Button>
                  <span className="text-sm text-gray-500">Page 1 of 10</span>
                  <Button variant="outline" size="sm">Next</Button>
                </div>
              </CardContent>
            </Card>
          </TabsContent>
        ))}
      </Tabs>
    </div>
  )
}
```

- [ ] **Step 2: Create MapPage.tsx**

```tsx
import { useEffect, useState } from 'react'
import { MapContainer, TileLayer, LayersControl, useMap } from 'react-leaflet'
import 'leaflet/dist/leaflet.css'

const DEFAULT_CENTER = [-1.5, 113.9] // Kalimantan Tengah
const DEFAULT_ZOOM = 7

function MapController() {
  const map = useMap()
  useEffect(() => {
    map.invalidateSize()
  }, [map])
  return null
}

export default function MapPage() {
  const [selectedLayers, setSelectedLayers] = useState<string[]>(['tutupan'])

  const layers = [
    { id: 'pabrik', name: 'Pabrik Kelapa Sawit', url: 'https://aws.simontini.id/geoserver/wms' },
    { id: 'kawasan', name: 'Kawasan Hutan', url: 'https://aws.simontini.id/geoserver/wms' },
    { id: 'izin', name: 'Izin Usaha', url: 'https://aws.simontini.id/geoserver/wms' },
    { id: 'tutupan', name: 'Tutupan Sawit', url: 'https://aws.simontini.id/geoserver/wms' },
  ]

  const toggleLayer = (layerId: string) => {
    setSelectedLayers((prev) =>
      prev.includes(layerId) ? prev.filter((l) => l !== layerId) : [...prev, layerId]
    )
  }

  return (
    <div className="space-y-4">
      <h1 className="text-2xl font-bold text-siska">Peta Interaktif</h1>

      {/* Layer Controls */}
      <div className="flex flex-wrap gap-2">
        {layers.map((layer) => (
          <button
            key={layer.id}
            onClick={() => toggleLayer(layer.id)}
            className={`px-4 py-2 rounded-full text-sm font-medium transition-colors ${
              selectedLayers.includes(layer.id)
                ? 'bg-siska text-white'
                : 'bg-gray-200 text-gray-700 hover:bg-gray-300'
            }`}
          >
            {layer.name}
          </button>
        ))}
      </div>

      {/* Map */}
      <div className="h-[600px] rounded-lg overflow-hidden border">
        <MapContainer
          center={DEFAULT_CENTER}
          zoom={DEFAULT_ZOOM}
          style={{ height: '100%', width: '100%' }}
        >
          <MapController />
          <TileLayer
            attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
          />
          <LayersControl position="topright">
            {layers.map((layer) => (
              selectedLayers.includes(layer.id) && (
                <LayersControl.Overlay key={layer.id} name={layer.name}>
                  <TileLayer
                    url={layer.url}
                    params={{
                      layers: `siska:${layer.id}`,
                      format: 'image/png',
                      transparent: true,
                    }}
                  />
                </LayersControl.Overlay>
              )
            ))}
          </LayersControl>
        </MapContainer>
      </div>
    </div>
  )
}
```

- [ ] **Step 3: Create LoginPage.tsx**

```tsx
import { useState } from 'react'
import { useNavigate } from 'react-router-dom'
import { useAuth } from '@/context/AuthContext'
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Button } from '@/components/ui/button'
import { AlertCircle } from 'lucide-react'

export default function LoginPage() {
  const [username, setUsername] = useState('')
  const [password, setPassword] = useState('')
  const [error, setError] = useState('')
  const { login } = useAuth()
  const navigate = useNavigate()

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault()
    setError('')

    if (login(username, password)) {
      navigate('/dashboard')
    } else {
      setError('Username atau password salah')
    }
  }

  return (
    <Card>
      <CardHeader className="space-y-1">
        <CardTitle className="text-2xl text-center">Masuk</CardTitle>
        <CardDescription className="text-center">
          Masukkan kredensial Anda untuk mengakses dashboard
        </CardDescription>
      </CardHeader>
      <CardContent>
        <form onSubmit={handleSubmit} className="space-y-4">
          {error && (
            <div className="flex items-center gap-2 p-3 bg-red-50 text-red-600 rounded-md text-sm">
              <AlertCircle className="h-4 w-4" />
              {error}
            </div>
          )}
          <div className="space-y-2">
            <label htmlFor="username" className="text-sm font-medium">Username</label>
            <Input
              id="username"
              type="text"
              placeholder="admin"
              value={username}
              onChange={(e) => setUsername(e.target.value)}
              required
            />
          </div>
          <div className="space-y-2">
            <label htmlFor="password" className="text-sm font-medium">Password</label>
            <Input
              id="password"
              type="password"
              placeholder="••••••"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              required
            />
          </div>
          <Button type="submit" className="w-full">Masuk</Button>
        </form>
        <p className="text-xs text-gray-500 text-center mt-4">
          Demo: admin / siska2024
        </p>
      </CardContent>
    </Card>
  )
}
```

- [ ] **Step 4: Create TentangPage.tsx**

```tsx
import { useState } from 'react'
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Leaf } from 'lucide-react'

export default function TentangPage() {
  return (
    <div className="max-w-4xl mx-auto py-12 px-4">
      <div className="text-center mb-12">
        <Leaf className="h-16 w-16 text-plantation mx-auto mb-4" />
        <h1 className="text-3xl font-bold text-siska">Tentang SISKA</h1>
        <p className="text-gray-600 mt-2">
          Sistem Informasi Komoditas Perkebunan Kalimantan Tengah
        </p>
      </div>

      <Tabs defaultValue="tujuan">
        <TabsList className="w-full justify-start">
          <TabsTrigger value="tujuan">Tujuan</TabsTrigger>
          <TabsTrigger value="produk">Produk & Pengguna</TabsTrigger>
          <TabsTrigger value="manfaat">Manfaat</TabsTrigger>
        </TabsList>

        <TabsContent value="tujuan" className="mt-6">
          <Card>
            <CardHeader>
              <CardTitle>Tujuan SISKA</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4 text-gray-600">
              <p>
                SISKA merupakan platform yang menyajikan data dan informasi mengenai
                komoditas perkebunan meliputi perkebunan sawit, karet, kelapa, lada,
                kopi, kakau, pinang, aren, jambu mete, kemiri, kapuk randu, dan
                cengkeh yang ada di Provinsi Kalimantan Tengah.
              </p>
              <p>
                Platform ini merupakan inisiatif pemerintah provinsi yang dibangun
                sejak 2022 untuk sebagai upaya untuk mendukung industrialisasi
                perkebunan yang berkelanjutan.
              </p>
            </CardContent>
          </Card>
        </TabsContent>

        <TabsContent value="produk" className="mt-6">
          <Card>
            <CardHeader>
              <CardTitle>Produk & Pengguna</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4 text-gray-600">
              <p>
                Platform ini menghimpun, mengintegrasikan, dan memvisualisasikan
                informasi perizinan perkebunan, industri pengolahan, perkebunan
                rakyat, dan produksi.
              </p>
            </CardContent>
          </Card>
        </TabsContent>

        <TabsContent value="manfaat" className="mt-6">
          <Card>
            <CardHeader>
              <CardTitle>Manfaat</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4 text-gray-600">
              <ul className="list-disc pl-5 space-y-2">
                <li>Memudahkan akses data perkebunan bagi masyarakat</li>
                <li>Mendukung pengambilan keputusan berbasis data</li>
                <li>Meningkatkan transparansi informasi publik</li>
                <li>Mendukung industrialisasi perkebunan berkelanjutan</li>
              </ul>
            </CardContent>
          </Card>
        </TabsContent>
      </Tabs>
    </div>
  )
}
```

- [ ] **Step 5: Create FAQPage.tsx**

```tsx
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from '@/components/ui/accordion'

const faqData = [
  {
    question: 'Apa itu SISKA?',
    answer: 'SISKA adalah platform yang menyajikan data dan informasi perkembangan perkebunan sawit di Provinsi Kalimantan Tengah.',
  },
  {
    question: 'Apa saja komoditas yang dicakup?',
    answer: 'Komoditas yang dicakup meliputi kelapa sawit, karet, kelapa, lada, kopi, kakao, pinang, aren, jambu mete, kemiri, kapuk randu, dan cengkeh.',
  },
  {
    question: 'Bagaimana cara mengakses data?',
    answer: 'Anda dapat mengakses data melalui menu Dashboard dan Data pada website ini. Beberapa data mungkin memerlukan login.',
  },
  {
    question: 'Siapa pengelola SISKA?',
    answer: 'SISKA dikelola oleh Dinas Perkebunan Provinsi Kalimantan Tengah.',
  },
]

export default function FAQPage() {
  return (
    <div className="max-w-3xl mx-auto py-12 px-4">
      <h1 className="text-3xl font-bold text-siska text-center mb-8">Pertanyaan Umum</h1>

      <Accordion type="single" collapsible className="w-full">
        {faqData.map((item, index) => (
          <AccordionItem key={index} value={`item-${index}`}>
            <AccordionTrigger className="text-left font-medium">{item.question}</AccordionTrigger>
            <AccordionContent className="text-gray-600">{item.answer}</AccordionContent>
          </AccordionItem>
        ))}
      </Accordion>
    </div>
  )
}
```

- [ ] **Step 6: Create GlossaryPage.tsx**

```tsx
import { Input } from '@/components/ui/input'
import { useState } from 'react'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'

const glossaryTerms = [
  { term: 'TBS', definition: 'Tandan Buah Segar - hasil panen dari pohon kelapa sawit' },
  { term: 'CPO', definition: 'Crude Palm Oil - minyak mentah kelapa sawit' },
  { term: 'TBM', definition: 'Tanaman Belum Menghasilkan - tanaman yang belum produktif' },
  { term: 'TM', definition: 'Tanaman Menghasilkan - tanaman yang sudah produktif' },
  { term: 'TR', definition: 'Tanaman Rusak - tanaman yang tidak produktif' },
  { term: 'PBS', definition: 'Perkebunan Besar Swasta - perusahaan perkebunan besar' },
  { term: 'PBR', definition: 'Perkebunan Rakyat - perkebunan milik masyarakat' },
  { term: 'PKS', definition: 'Pabrik Kelapa Sawit - pabrik pengolahan TBS' },
  { term: 'ISPO', definition: 'Indonesian Sustainable Palm Oil - sertifikasi berkelanjutan' },
  { term: 'Ha', definition: 'Hektare - satuan luas tanah (1 ha = 10.000 m²)' },
]

export default function GlossaryPage() {
  const [searchTerm, setSearchTerm] = useState('')

  const filteredTerms = glossaryTerms.filter(
    (item) =>
      item.term.toLowerCase().includes(searchTerm.toLowerCase()) ||
      item.definition.toLowerCase().includes(searchTerm.toLowerCase())
  )

  return (
    <div className="max-w-4xl mx-auto py-12 px-4">
      <h1 className="text-3xl font-bold text-siska text-center mb-8">Daftar Istilah</h1>

      <Input
        placeholder="Cari istilah..."
        value={searchTerm}
        onChange={(e) => setSearchTerm(e.target.value)}
        className="max-w-md mx-auto mb-8"
      />

      <div className="grid gap-4">
        {filteredTerms.map((item, index) => (
          <Card key={index}>
            <CardHeader>
              <CardTitle className="text-lg text-siska">{item.term}</CardTitle>
            </CardHeader>
            <CardContent>
              <p className="text-gray-600">{item.definition}</p>
            </CardContent>
          </Card>
        ))}
      </div>

      {filteredTerms.length === 0 && (
        <p className="text-center text-gray-500">Tidak ada istilah yang ditemukan</p>
      )}
    </div>
  )
}
```

- [ ] **Step 7: Create TimPage.tsx**

```tsx
import { Card, CardContent } from '@/components/ui/card'
import { Users } from 'lucide-react'

const teamMembers = [
  {
    name: 'Dr. H. Sugianto Sabran',
    position: 'Gubernur Kalimantan Tengah',
  },
  {
    name: 'H. Edy Pratowo',
    position: 'Wakil Gubernur Kalimantan Tengah',
  },
  {
    name: 'Ir. H. II',
    position: 'Kepala Dinas Perkebunan',
  },
]

export default function TimPage() {
  return (
    <div className="max-w-4xl mx-auto py-12 px-4">
      <div className="text-center mb-12">
        <Users className="h-16 w-16 text-plantation mx-auto mb-4" />
        <h1 className="text-3xl font-bold text-siska">Tim Kami</h1>
        <p className="text-gray-600 mt-2">Dinas Perkebunan Provinsi Kalimantan Tengah</p>
      </div>

      <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        {teamMembers.map((member, index) => (
          <Card key={index}>
            <CardContent className="pt-6 text-center">
              <div className="w-20 h-20 bg-siska/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                <span className="text-2xl font-bold text-siska">
                  {member.name.charAt(0)}
                </span>
              </div>
              <h3 className="font-semibold text-lg">{member.name}</h3>
              <p className="text-gray-600 text-sm mt-1">{member.position}</p>
            </CardContent>
          </Card>
        ))}
      </div>

      <div className="mt-12 text-center">
        <h2 className="text-xl font-semibold mb-4">Hubungi Kami</h2>
        <p className="text-gray-600">
          Dinas Perkebunan Provinsi Kalimantan Tengah<br />
          Jl. Cilik Riwut Km. 4 Palangka Raya 73112<br />
          Telp: (0536) 1234567<br />
          Email:.disbun@kalteng.go.id
        </p>
      </div>
    </div>
  )
}
```

- [ ] **Step 8: Create AboutPage.tsx (alias for SISKA page)**

```tsx
import { Link } from 'react-router-dom'
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Leaf, Map, BarChart, FileText } from 'lucide-react'

export default function AboutPage() {
  return (
    <div className="max-w-4xl mx-auto py-12 px-4">
      <div className="text-center mb-12">
        <Leaf className="h-16 w-16 text-plantation mx-auto mb-4" />
        <h1 className="text-3xl font-bold text-siska">Tentang SISKA</h1>
        <p className="text-gray-600 mt-2 max-w-2xl mx-auto">
          SISKA adalah platform yang menyajikan data dan informasi perkembangan
          perkebunan kelapa sawit di Provinsi Kalimantan Tengah.
        </p>
      </div>

      <div className="grid md:grid-cols-2 gap-6 mb-12">
        <Card className="p-6">
          <Map className="h-10 w-10 text-siska mb-4" />
          <h3 className="font-semibold text-lg mb-2">Peta Interaktif</h3>
          <p className="text-gray-600 text-sm">
            Jelajahi data spasial perkebunan melalui peta interaktif dengan
            berbagai layer informasi.
          </p>
        </Card>
        <Card className="p-6">
          <BarChart className="h-10 w-10 text-plantation mb-4" />
          <h3 className="font-semibold text-lg mb-2">Visualisasi Data</h3>
          <p className="text-gray-600 text-sm">
            Lihat grafik dan statistik perkembangan perkebunan dari waktu ke waktu.
          </p>
        </Card>
        <Card className="p-6">
          <FileText className="h-10 w-10 text-amber-500 mb-4" />
          <h3 className="font-semibold text-lg mb-2">Data Komprehensif</h3>
          <p className="text-gray-600 text-sm">
            Akses data perizinan, produksi, dan berbagai informasi perkebunan
            lainnya.
          </p>
        </Card>
        <Card className="p-6">
          <Leaf className="h-10 w-10 text-green-600 mb-4" />
          <h3 className="font-semibold text-lg mb-2">Komoditas Beragam</h3>
          <p className="text-gray-600 text-sm">
            Tidak hanya kelapa sawit, tetapi juga karet, kelapa, lada, kopi,
            dan komoditas lainnya.
          </p>
        </Card>
      </div>

      <div className="text-center">
        <Link to="/dashboard">
          <Button size="lg">Jelajahi Dashboard</Button>
        </Link>
      </div>
    </div>
  )
}
```

- [ ] **Step 9: Commit**

```bash
cd /Users/muhammadalichamdan/Documents/Development/larasiska-react
git add src/pages/DataPage.tsx src/pages/MapPage.tsx src/pages/LoginPage.tsx src/pages/TentangPage.tsx src/pages/FAQPage.tsx src/pages/TimPage.tsx src/pages/GlossaryPage.tsx src/pages/AboutPage.tsx
git commit -m "feat: add remaining pages (DataPage, MapPage, LoginPage, static pages)"
```

---

## Task 7: Static Assets & Final Testing

**Goal:** Copy static assets and verify build

**Files:**
- Copy: `public/assets/` from original project

- [ ] **Step 1: Copy static assets**

Run: `cp -r /Users/muhammadalichamdan/Documents/Development/larasiska/public/assets /Users/muhammadalichamdan/Documents/Development/larasiska-react/public/`

- [ ] **Step 2: Add placeholder assets if needed**

Create `public/assets/v1/` with placeholder images or copy from original.

- [ ] **Step 3: Update index.html with fonts and favicon**

```html
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="/assets/v1/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SISKA - Sistem Informasi Komoditas Perkebunan Kalimantan Tengah</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  </head>
  <body>
    <div id="root"></div>
    <script type="module" src="/src/main.tsx"></script>
  </body>
</html>
```

- [ ] **Step 4: Verify build**

Run: `cd larasiska-react && npm run build`
Expected: Clean build

- [ ] **Step 5: Test in dev mode**

Run: `cd larasiska-react && npm run dev`
Verify: Homepage loads, navigation works, dashboard tabs switch

- [ ] **Step 6: Final commit**

```bash
cd /Users/muhammadalichamdan/Documents/Development/larasiska-react
git add public/
git commit -m "chore: add static assets from original project"
```

---

## Self-Review Checklist

- [ ] All 12 pages created and routing configured
- [ ] Dashboard consolidated into single page with tabs
- [ ] Charts use Recharts with sample data
- [ ] Map uses react-leaflet with layer controls
- [ ] Auth context protects dashboard routes
- [ ] Responsive design implemented
- [ ] Build succeeds without errors
- [ ] All components from shadcn/ui properly installed

---

**Plan complete and saved to `docs/superpowers/plans/2026-05-13-siska-react-refactor.md`. Two execution options:**

**1. Subagent-Driven (recommended)** - I dispatch a fresh subagent per task, review between tasks, fast iteration

**2. Inline Execution** - Execute tasks in this session using executing-plans, batch execution with checkpoints

**Which approach?**