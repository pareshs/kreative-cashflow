# Kreative Cashflow WordPress Theme

A premium WordPress theme for **Kreative Cashflow** — your complete property partner.

Built on the v1 brand identity: Cormorant Garamond + DM Sans + DM Mono typography, gold/slate/cream colour palette, and the editorial luxury aesthetic from the brand guidelines.

---

## Requirements

- WordPress 6.0+
- PHP 8.0+
- MySQL 5.7+ / MariaDB 10.3+

---

## Installation

1. Download `kreative-cashflow-theme.zip`
2. In WordPress admin go to **Appearance → Themes → Add New → Upload Theme**
3. Upload the zip and click **Activate**
4. Go to **Appearance → Menus** and assign your pages to the **Primary Navigation** menu
5. Go to **Appearance → Customise → Kreative Cashflow** to set your contact info, hero content, and stats
6. Set your **Reading Settings → Front page** to a static page (e.g. "Home") — the theme will use `front-page.php` automatically

---

## File Structure

```
kreative-cashflow-theme/
├── style.css              # Theme declaration + full CSS design system
├── functions.php          # Theme setup, CPTs, taxonomies, customiser
├── theme.json             # Block editor colour + typography tokens
├── header.php             # Site header + navigation
├── footer.php             # Site footer + widgets
├── front-page.php         # Homepage (hero, services, about, process, properties, testimonials, blog)
├── index.php              # Blog archive / fallback
├── singular.php           # Single posts + static pages
├── single.php             # Single post redirect
├── page.php               # Page redirect
├── archive.php            # Post + property archives
├── sidebar.php            # Blog sidebar
├── 404.php                # Error page
├── assets/
│   ├── css/               # (Optional: additional CSS partials)
│   └── js/
│       └── main.js        # Navigation, scroll animations, counters, parallax
└── README.md
```

---

## Custom Post Types

### Properties (`kc_property`)
- **Public archive:** `/properties/`
- **Meta fields:** Price, Bedrooms, Bathrooms, Garage, Land Size, House Size, Address, Rental Yield, Rent Per Week, Agent Name, Agent Phone
- **Taxonomies:** Property Type, Property Status, Location

### Team Members (`kc_team`)
- Admin-only, not publicly accessible
- Used for team page templates

### Testimonials (`kc_testimonial`)
- Admin-only post type
- Displays on homepage and testimonials page
- Meta: Rating (1–5), Client Type

---

## Customiser Options

Under **Appearance → Customise → Kreative Cashflow**:

| Section | Options |
|---------|---------|
| Hero Section | Tag line, headline (HTML), description, CTA buttons |
| Hero Stats | 3 statistics (number + label) |
| Contact Information | Phone, email, address, ABN |
| Social Media | Facebook, Instagram, LinkedIn, YouTube |

---

## Recommended Plugins

| Plugin | Purpose |
|--------|---------|
| **Contact Form 7** or **WPForms** | Contact forms |
| **Yoast SEO** | SEO meta, sitemaps |
| **WP Rocket** or **Perfmatters** | Performance |
| **Advanced Custom Fields (ACF)** | Extended property fields |
| **Real Media Library** | Media organisation |
| **Gravity Forms** | Advanced lead capture |

---

## Widget Areas

- **Blog Sidebar** — shown on blog posts and archives
- **Footer Column 1–3** — three widget columns in the footer (fallback menus shown if empty)

---

## Navigation Menus

| Location | Purpose |
|----------|---------|
| Primary Navigation | Main header menu (supports dropdowns) |
| Footer — Services | Footer column: services links |
| Footer — Company | Footer column: company links |
| Footer — Legal | Footer column: legal/policy links |

---

## Colour Tokens

```css
--ink:       #0F0E0A   /* Near black — headings, text */
--cream:     #F7F4EE   /* Warm off-white — page background */
--gold:      #C9A84C   /* Brand gold — accents, CTAs */
--gold-lt:   #E8D49A   /* Light gold — tints, fills */
--gold-dk:   #8B6914   /* Dark gold — links, hover */
--slate:     #2E3440   /* Deep slate — nav, hero, dark sections */
--slate-md:  #4C566A   /* Mid slate — body text */
--slate-lt:  #8C98A8   /* Light slate — captions, labels */
```

---

## Typography

| Role | Font | Weight |
|------|------|--------|
| Display / Headlines | Cormorant Garamond | 300 / 600 |
| Body Copy | DM Sans | 400 / 500 |
| Labels / Captions | DM Mono | 400 / 500 |

Loaded from Google Fonts — no self-hosting required.

---

## Credits

- Theme design based on Kreative Cashflow Brand Guidelines v1.0
- Icons: custom SVG (no external icon library dependency)
- Fonts: Google Fonts (Cormorant Garamond, DM Sans, DM Mono)

---

## License

GNU General Public License v2 or later  
http://www.gnu.org/licenses/gpl-2.0.html
