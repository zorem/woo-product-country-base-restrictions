# CLAUDE.md — Country Based Restrictions for WooCommerce (Free)

## Plugin Overview

**Plugin Name:** Country Based Restrictions for WooCommerce
**Folder:** `woo-product-country-base-restrictions`
**Main File:** `woocommerce-product-country-base-restrictions.php`
**Version:** 3.7.7
**Type:** Free / WordPress.org
**Text Domain:** `woo-product-country-base-restrictions`
**WC Requires:** 4.0+
**WC Tested Up To:** 10.4.3
**License:** GPLv3

Restricts WooCommerce products and payment methods based on the visitor's country. Supports product-level restrictions (allow/block by country), catalog restrictions (hide restricted products), payment method restrictions, and an admin toolbar for simulating different countries.

**Pro counterpart:** `country-base-restrictions-pro-addon` — when the Pro plugin is active, this free plugin fully deactivates itself (no code runs).

**Important:** Plugin execution is skipped entirely during WP Cron (`DOING_CRON`).

---

## Folder Structure

```
woo-product-country-base-restrictions/
├── woocommerce-product-country-base-restrictions.php  # Main plugin file
├── include/
│   ├── admin-settings.php          # Admin settings (class CBR_Admin_Settings)
│   ├── admin-notice.php            # Admin notices (class CBR_Admin_Notice)
│   ├── admin-toolbar.php           # Admin WP Toolbar simulation (class CBR_Admin_Toolbar)
│   ├── products-restriction.php    # Core restriction logic (class CBR_Product_Restriction)
│   ├── single-product.php          # Single product page handling (class CBR_Single_Product)
│   └── views/
│       ├── cbr_setting_tab.php     # General settings tab HTML
│       ├── cbr_catalog_restrictions_tab.php  # Catalog restrictions tab HTML
│       ├── cbr_payment_restrictions_tab.php  # Payment restrictions tab HTML
│       ├── cbr_addons_tab.php      # Add-ons/upsell tab HTML
│       └── admin_message_panel.php
├── assets/
│   ├── css/
│   │   ├── admin.css
│   │   ├── frontend.css            # Frontend restriction styles
│   │   ├── material.css
│   │   └── select2.min.css
│   ├── js/
│   │   ├── admin.js
│   │   ├── front.js                # Frontend AJAX for restriction checks
│   │   ├── material.min.js
│   │   └── select2.min.js
│   └── images/
├── lang/                           # Translations (6 locales: de_DE, es, fr_FR, he_IL, hi_IN, ru_RU)
├── zorem-tracking/                 # Shared usage-tracking sub-module
│   └── zorem-tracking.php
└── wpml-config.xml
```

---

## Key Classes & Global Functions

| Symbol | File | Purpose |
|---|---|---|
| `ZH_Product_Country_Restrictions` | `woocommerce-product-country-base-restrictions.php` | Main plugin class |
| `$fzpcr` | `woocommerce-product-country-base-restrictions.php` | Global instance (direct instantiation, no wrapper function) |
| `CBR_Admin_Settings` | `include/admin-settings.php` | Admin settings page UI |
| `CBR_Admin_Notice` | `include/admin-notice.php` | Admin notice management |
| `CBR_Admin_Toolbar` | `include/admin-toolbar.php` | WP Toolbar country simulation |
| `CBR_Product_Restriction` | `include/products-restriction.php` | Core restriction filtering logic |
| `CBR_Single_Product` | `include/single-product.php` | Single product page restriction handling |
| `WC_Trackers` | `zorem-tracking/zorem-tracking.php` | Usage tracking (shared module) |

**Note:** Unlike ALP and CBR Pro, the free CBR plugin uses a direct global `$fzpcr = new ZH_Product_Country_Restrictions()` rather than a singleton accessor function.

---

## WordPress Hooks

### Actions Added

| Hook | Callback | Priority | Description |
|---|---|---|---|
| `plugins_loaded` | `plugin_init` | default | Loads textdomain + registers remaining hooks |
| `wp_head` | `wc_cbr_frontend_enqueue` | 999 | Enqueues frontend CSS/JS |
| `admin_enqueue_scripts` | `wc_esrc_enqueue` | default | Enqueues admin CSS/JS (only on CBR settings page) |
| `upgrader_process_complete` | `cbr_plugin_update_hook` | 10 | Clears notice dismiss on plugin update |
| `admin_notices` | `admin_error_notice` | — | Shows WC version error notice |
| `before_woocommerce_init` | _(closure)_ | — | Declares HPOS compatibility |

### Filters Added

| Hook | Callback | Description |
|---|---|---|
| `plugin_action_links_{basename}` | `my_plugin_action_links` | Adds Settings / Docs / Review links |
| `plugin_action_links_{basename}` | `my_plugin_action_PRO_links` | Adds "Go Pro" link (when Pro not active) |

---

## Admin Page

**Menu slug:** `woocommerce-product-country-base-restrictions`
**URL:** `wp-admin/admin.php?page=woocommerce-product-country-base-restrictions`
**Registered in:** `CBR_Admin_Settings`

Tabs: Settings, Catalog Restrictions, Payment Restrictions, Add-ons

---

## Frontend Assets

- **Script handle:** `cbr-pro-front-js` → `assets/js/front.js`
- **Localized object:** `cbr_ajax_object` with `cbr_ajax_url` (admin-ajax.php URL)
- Loaded on every frontend page (enqueued at `wp_head` priority 999)
- Stylesheet `cbr-fronend-css` is only enqueued on single product pages or when variation hiding is enabled

---

## Admin Assets (Settings Page Only)

Enqueued only on `?page=woocommerce-product-country-base-restrictions`:
- `cbr-admin-js` — `assets/js/admin.js`
- `cbr-material-min-js` — `assets/js/material.min.js`
- `cbr-admin-css` — `assets/css/admin.css`
- `cbr-material-css` — `assets/css/material.css`
- `select2-cbr` — Select2 library
- WooCommerce admin styles

---

## WP Options Used

| Option Key | Description |
|---|---|
| `wpcbr_hide_restricted_product_variation` | When `1`, hides restricted variations on product pages |
| `cbr_notice_ignore` | Admin notice dismiss flag (cleared on plugin update) |

---

## Cron Skip

The plugin constructor returns immediately if `DOING_CRON` is defined and true:

```php
if ( defined( 'DOING_CRON' ) && DOING_CRON ) {
    return;
}
```

This prevents restriction logic from running during scheduled tasks which do not have a geographic context.

---

## Localization

**Text domain:** `woo-product-country-base-restrictions`
**Lang directory:** `lang/`
Loaded via `load_plugin_textdomain()` on `plugins_loaded`.
6 bundled locales: de_DE, es, fr_FR, he_IL, hi_IN, ru_RU.

---

## Coding Standards

- WordPress Coding Standards (WPCS)
- All user input sanitized with `sanitize_text_field()` and related functions
- All output escaped with `esc_html()`, `esc_url()`, `esc_attr()`
- Nonces used for AJAX requests
- Singleton pattern via `get_instance()` on all sub-classes
- `ABSPATH` guard at top of every file

---

## Build Instructions

No build process. Plain PHP/JS/CSS plugin.

For translations: edit `.po` files in `lang/` and compile to `.mo` with Poedit or WP-CLI.

---

## Free / Pro Relationship

- `is_cbr_pro_active()` checks if `country-base-restrictions-pro-addon` is active; if so, the entire plugin init is skipped
- The Pro plugin's `on_activation()` deactivates this free plugin when Pro is activated
- Both plugins share the same admin page slug (`woocommerce-product-country-base-restrictions`)
- **Never have both active simultaneously**

---

## Compatibility Notes

- **WooCommerce HPOS:** Declared compatible via `FeaturesUtil::declare_compatibility('custom_order_tables', ...)`.
- **WPML:** `wpml-config.xml` present.
- **WP Cron:** Explicitly skipped (returns early when `DOING_CRON`).
- **PHP:** Requires PHP 7.4+ (WooCommerce minimum).
- **Multisite:** Not explicitly tested.

---

## AI Usage Notes

### Safe to modify
- View files in `include/views/` (admin tab HTML)
- CSS in `assets/css/`
- JS in `assets/js/front.js` and `assets/js/admin.js`

### Be careful with
- `woocommerce-product-country-base-restrictions.php` — bootstrap logic; `DOING_CRON` early-return and Pro active check must remain at the top of `__construct()`
- `include/products-restriction.php` — core restriction logic; changes can affect which products are visible/purchasable for customers
- Frontend enqueue at `wp_head` priority 999 — intentionally late to ensure WC is loaded first
- `$fzpcr` global — referenced by some code as a global variable (not a function like other Zorem plugins)

### Do NOT modify
- `zorem-tracking/` — shared sub-module
- `lang/` — generated translation files
- The `is_cbr_pro_active()` check — this is the free/pro guard
- The `DOING_CRON` guard — required for performance and correctness

### Do NOT add
- License/update manager — free plugin
- Category-based restrictions — Pro feature only
- Bulk restriction features — Pro feature only
- Widget / toolbar simulation of countries — partially available in free, fully in Pro
