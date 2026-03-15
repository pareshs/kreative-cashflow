# Changelog — Kreative Cashflow WordPress Theme

## Version 2.0.0 — Enhanced Customization & Page Templates

**Release Date:** 2026-02-14

### 🎨 NEW: Fully Customizable Front-Page

**All homepage sections now editable via Customizer** — no code editing required:

- **Hero Section** — tag, headline, description, 2 CTAs
- **Hero Stats** — 3 customizable statistics
- **Services Section** — toggle, tag, headline, description + 6 individual service cards (title + description each)
- **About Section** — toggle, tag, headline, 2 paragraphs, CTA button + 4 stats
- **Process Section** — toggle, tag, headline, description + 4 process steps (title + description each)
- **CTA Band** — toggle, headline, button label + URL
- **Contact Info** — phone, email, address, ABN
- **Social Links** — Facebook, Instagram, LinkedIn, YouTube

**Total: 50+ editable fields** for the homepage alone. Every section can be toggled on/off.

---

### 📄 NEW: Page Templates

**3 professional page templates** for different use cases:

#### 1. **Default Page Template**
- Clean, centered content (900px max-width)
- No sidebar, no blog styling
- Automatically used for all pages unless template is changed
- Perfect for: About, Contact, general pages

#### 2. **Full-Width Clean**
- Template file: `template-full-width.php`
- Centered content with optional full-bleed featured image
- Optional CTA section at bottom (disable with custom field `kc_show_cta` = `no`)
- Perfect for: Service pages, landing pages, content-focused pages

#### 3. **Split Layout**
- Template file: `template-split.php`
- Image on left (sticky), content on right
- Optional stats below image (custom fields: `kc_stat_1_num`, `kc_stat_1_label`, `kc_stat_2_num`, `kc_stat_2_label`)
- CTAs at bottom of content
- Responsive: stacks on mobile
- Perfect for: Service detail pages, portfolio pages, team member pages

---

### ✨ Improvements

**Pages vs Blog Posts:**
- Pages now have distinct, clean styling (no author box, no post navigation, no sidebar)
- Blog posts maintain full blog features (sidebar, author box, post nav, comments)
- `singular.php` intelligently differentiates between the two

**Customizer Enhancements:**
- All text fields support HTML (for `<em>` italics in headlines)
- Textareas for multi-paragraph content
- Checkbox toggles to enable/disable entire sections
- Organized into logical sections for easy navigation

**CSS Additions:**
- Page template-specific styles
- Content card components (`.content-card`)
- Page features grid (`.page-features-grid`)
- Responsive improvements for split layout

---

### 🔧 Technical Changes

**Functions.php:**
- Expanded `kc_customizer()` with 7 new sections
- Added support for `textarea` and `checkbox` control types
- Default values for all 50+ customizer fields

**Front-page.php:**
- All hardcoded content replaced with `kc_option()` calls
- Conditional section rendering based on enable/disable toggles
- Dynamic service/stat/step loops pull from customizer

**New Files:**
- `template-full-width.php` — Full-width clean page template
- `template-split.php` — Split layout page template
- `CHANGELOG.md` — This file

---

### 📦 Files Changed

- `functions.php` — Expanded Customizer options
- `front-page.php` — Now 100% customizable
- `singular.php` — Improved page vs post differentiation
- `style.css` — Added page template styles
- `README.md` — Updated documentation
- **NEW:** `template-full-width.php`
- **NEW:** `template-split.php`
- **NEW:** `CHANGELOG.md`

---

## Version 1.0.0 — Initial Release

**Release Date:** 2026-02-14

### Features

- Custom post types: Properties, Team Members, Testimonials
- Taxonomies: Property Type, Property Status, Location
- Homepage sections: Hero, Services, About, Process, Properties, Testimonials, CTA, Blog
- Responsive design with mobile menu
- Scroll animations
- Google Fonts integration (Cormorant Garamond, DM Sans, DM Mono)
- Gold/Slate/Cream colour palette
- Widget areas: Blog sidebar, 3 footer columns
- Navigation menus: Primary, 3 footer menus
- Custom logo support
- Customizer: Hero section, stats, contact info, social links

---

**Total lines of code:** 3,700+  
**Development time:** Engineered with precision and care  
**Support:** Documentation in README.md
