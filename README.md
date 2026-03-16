# Kreative Cashflow WordPress Theme v3.0 (Bootstrap 5.3)

A premium WordPress theme built on **Bootstrap 5.3** for Kreative Cashflow — your complete property partner.

## What's New in v3.0

**Built on Bootstrap 5.3:**
- Bootstrap 5.3.3 CSS & JS via CDN
- Bootstrap Icons included
- Responsive grid system
- Bootstrap components (navbar, cards, buttons, forms, modals)
- Mobile-first approach

**Design:**
- Cormorant Garamond + DM Sans + DM Mono typography
- Gold/Slate/Cream brand palette
- Noise texture overlay
- Scroll animations

## Requirements

- WordPress 6.0+
- PHP 8.0+
- Modern browser with JavaScript enabled

## Installation

1. Download the theme ZIP
2. Go to **Appearance → Themes → Add New → Upload Theme**
3. Upload and activate
4. Assign a menu to "Primary Navigation" in **Appearance → Menus**
5. Customize settings in **Appearance → Customize → Kreative Cashflow**

## File Structure

```
kreative-cashflow-theme/
├── style.css                    # Theme CSS (loads after Bootstrap)
├── functions.php                # Theme setup + Bootstrap enqueue
├── header.php                   # Bootstrap navbar
├── footer.php                   # Bootstrap footer grid
├── front-page.php               # Homepage with Bootstrap components
├── index.php                    # Blog archive
├── inc/
│   ├── class-bootstrap-navwalker.php  # Bootstrap 5 menu walker
│   ├── custom-post-types.php          # Properties, Team, Testimonials
│   └── customizer.php                 # Theme options
└── assets/
    └── js/
        └── main.js              # Scroll animations, counter, navbar
```

## Bootstrap Components Used

- **Navbar** — Fixed top navigation with dropdown support
- **Grid System** — Responsive 12-column layout
- **Cards** — Service cards, property cards, blog cards
- **Buttons** — Primary, outline, gold variants
- **Utilities** — Spacing, display, flex, text utilities
- **Icons** — Bootstrap Icons via CDN

## Customizer Options

**Appearance → Customize → Kreative Cashflow:**

- **Hero Section** — Tag, title, description, CTA buttons
- **Contact Info** — Phone, email, address

## Custom Post Types

- **Properties** (`kc_property`) — Public archive at /properties/
- **Team Members** (`kc_team`) — Admin only
- **Testimonials** (`kc_testimonial`) — Admin only

## Key Features

✅ **Bootstrap 5.3** foundation  
✅ **CDN-hosted** — no local Bootstrap files  
✅ **Responsive** — mobile-first design  
✅ **Bootstrap NavWalker** — dropdown menu support  
✅ **Bootstrap Icons** — 1,800+ icons available  
✅ **Scroll animations**  
✅ **Custom post types**  

## Credits

- Bootstrap 5.3.3 — https://getbootstrap.com
- Bootstrap Icons — https://icons.getbootstrap.com
- Google Fonts (Cormorant Garamond, DM Sans, DM Mono)

## License

GNU General Public License v2 or later
