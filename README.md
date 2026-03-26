# toposel-wordpress-assignment
WordPress assignment for Toposel - Mobile e-commerce homepage with ACF dynamic content
# Toposel WordPress Assignment

A mobile-optimized e-commerce homepage built with WordPress, ACF, and WooCommerce. All content is fully editable through the WordPress admin panel — no coding required for content updates.

## Live Demo
- **Local Site:** http://toposel.local (runs on LocalWP)
- **Admin:** http://toposel.local/wp-admin

## Features
- **Mobile-first design** — optimized for phones (max-width: 430px)
- **Dynamic content** using Advanced Custom Fields (ACF)
- **Editable sections:**
  - Announcement bar
  - Hero banner (image, heading, subheading, button text & link)
  - Brand logos (upload/remove icons)
  - New arrivals section (product category filter)
- **WooCommerce integration** — products pulled dynamically
- **Clean, readable code** — simple PHP and CSS

## Tech Stack
- WordPress (local environment)
- Advanced Custom Fields (ACF) plugin
- WooCommerce plugin                  File Structure
toposel-wordpress-assignment/
├── front-page.php # Homepage template with ACF fields
├── style.css # Mobile-first CSS styles
└── README.md # This file
## How to Set Up Locally
1. Install LocalWP or XAMPP
2. Create a new WordPress site
3. Install and activate ACF and WooCommerce plugins
4. Copy theme files to `/wp-content/themes/toposel/`
5. Activate the theme
6. Import ACF fields (or create manually from screenshots)
7. Add products in WooCommerce
8. Visit http://toposel.local to see the site

## How to Edit Content
1. Go to WordPress admin → Pages → Homepage
2. Scroll down to "Homepage Settings"
3. Update any field:
   - Change announcement text
   - Upload hero image
   - Update heading/subheading
   - Add brand logos
   - Set new arrivals category
4. Click "Update"
5. Refresh the homepage to see changes

## About the Assignment
This project was built as part of the Toposel hiring process. The goal was to recreate a mobile homepage design from Figma using WordPress, ensuring all content is dynamic and editable by non-technical users.

## Author
Mahalakshmi Pavuralla
- GitHub: [pavurallamahalakshmi-ui](https://github.com/pavurallamahalakshmi-ui)

- PHP, HTML, CSS

File Structure
toposel-wordpress-assignment/
├── front-page.php      # Homepage template with ACF fields
├── style.css           # Mobile-first CSS styles
├── functions.php       # Theme functions (ACF support)
├── header.php          # Site header template
├── footer.php          # Site footer template
└── README.md           # This file
