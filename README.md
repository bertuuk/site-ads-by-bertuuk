# 🧩 Site Ads by Bertuuk

A modular WordPress plugin to manage ad insertion, visibility rules, and global tracking scripts using Gutenberg blocks.

---

## 🎯 Purpose

This plugin allows you to:
- Insert AdSense or custom ads via Gutenberg blocks
- Set visibility rules by user role
- Define default ad behavior for blocks
- Inject global tracking scripts (GA4, GTM, etc.)
- Manage all options from a single, accessible admin page (Yoast-style)

---

## ✅ Current Features (v0.1.0)

- Admin page with 3 tabs: **Ads**, **Block Defaults**, **Tracking**
- Settings API integration with validation and sanitization
- Full SCSS structure compiled via Webpack
- Custom tab navigation styled for clean UX
- Modular architecture
- Translatable (`Text Domain: site-ads-by-bertuuk`)

---

## 🛠️ How to Use

1. **Global Ads Configuration**  
   Navigate to **Settings → Site Ads** and enter:
   - Your AdSense client ID
   - The full `<script>` to inject in the `<head>`
   - A fallback ad HTML
   - User roles that should NOT see ads

2. **Block Defaults**  
   In the "Block Defaults" tab, define:
   - Default Ad Slot
   - Default Ad Format (`auto`, `rectangle`, `horizontal`, etc.)
   - Responsive behavior (on/off)

3. **Tracking Scripts**  
   In the "Tracking" tab, you can:
   - Enable or disable global script injection
   - Paste your GA4, GTM, or other tracking scripts

---

## ⚙️ Development

### Compile SCSS and JS

```bash
npm install
npm run build     # one-time build
npm run start     # watch mode
```

The compiled files go to `assets/admin.css` and `assets/admin.js`.

---

## 🧭 Roadmap

### ✅ FASE 1: Admin Configuration (done)
- Admin page UI with custom tab navigation
- Global and default block settings via Settings API
- Tracking script management
- Webpack + SCSS setup

### 🔜 FASE 2: Script loading & visibility
- Conditionally load AdSense and tracking scripts
- Inject `<script>` tags in `<head>` based on settings
- Role-based visibility logic
- Detect if Site Kit is active and disable tracking injection if needed

### 🔜 FASE 3: Gutenberg blocks
- Create `adsense-banner` block with attributes:
  - `adSlot`, `adFormat`, `responsive`, `showOnMobile`, etc.
- Default values fallback to global settings
- Server-side rendering with PHP
- Compatibility with FSE (Full Site Editing)

---

## 🧑‍💻 Author

Made by [Bertuuk](https://github.com/bertuuk) with ❤️