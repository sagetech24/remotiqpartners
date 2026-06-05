# RemotIQ Partners WordPress Theme

Custom WordPress theme converted from the RemotIQ Partners PHP site.

## Installation

1. Copy `wp-content/themes/remotiq-partners` into your WordPress installation at `wp-content/themes/`.
2. Activate **RemotIQ Partners** under Appearance → Themes.
3. On activation, the theme creates pages, menus, and a homepage with all sections.
4. Install and activate **Elementor** and **Elementor Pro** for Partner and Join forms.

## Homepage Content

The front page renders sections directly from PHP on every request:

```
template-parts/sections/hero.php
template-parts/sections/about.php
… (see remotiq_homepage_section_slugs() in inc/patterns.php)
```

Edit those files and refresh the browser — changes appear immediately without updating the Home page in the block editor.

Block patterns under **RemotIQ Sections** remain available for copying markup into other pages. The Home page’s stored block content is not used when `front-page.php` is active.

## Partner & Join Forms (Elementor)

Both pages use custom templates with a two-column layout:

- Left column: editable PHP template content
- Right column: page content area for your Elementor Form widget

### Partner With Us fields

- Business Name (required)
- Contact Person (required)
- Email (required)
- How can we help? / Message (required)

### Join Us fields

- Full Name (required)
- Preferred Name (required)
- Email (required)
- Contact Number (required)
- Preferred Job Position (optional)
- Cover Letter (file, optional)
- Resume (file, required)

Replace the placeholder content in each page’s right column with an Elementor Form widget. Form styling is handled by `assets/css/elementor-forms.css`.

Configure Elementor form actions (email notifications, webhooks) in the form widget settings.

## Menus

The theme registers **Primary Menu** and **Footer Menu** locations. On activation, a menu is created with hash links to homepage sections plus Partner With Us.

Assign menus under Appearance → Menus if needed.

## Customizer

- **Footer Options** — background color, text colors, description, office addresses, quick links heading, copyright, and privacy link (Appearance → Customize → RemotIQ Theme → Footer Options)

## Development

Theme path in this repo:

```
wp-content/themes/remotiq-partners/
```

To re-run first-time setup (pages/menus), delete the `remotiq_theme_initialized` option from the database and switch themes.

## Requirements

- WordPress 6.4+
- PHP 8.0+
- Elementor + Elementor Pro (forms and file uploads)
