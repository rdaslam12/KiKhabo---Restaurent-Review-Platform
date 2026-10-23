<div align="center">
  <img src="images/kikhabologo.png" alt="KiKhabo logo" width="140" />

# KiKhabo

A small restaurant review and discovery platform built with PHP and MySQL.

</div>

KiKhabo was one of my earlier engineering projects, created while learning how to build a database-backed web application with user authentication, filtering, an admin panel, and reusable PHP components. It is kept here as a polished record of that stage of my development rather than as a production-ready product.

## Preview

![KiKhabo landing page](images/landingpage.png)

## What it includes

- Restaurant browsing with filters for food type, decoration, and occasion tags
- User registration and login
- Restaurant ratings and review-oriented pages
- Admin pages for managing users and restaurant entries
- Reusable PHP header/footer components
- Responsive Bootstrap-based interface with Swiper-powered homepage imagery

## Tech stack

`PHP` · `MySQL` · `Bootstrap 5` · `HTML/CSS` · `JavaScript` · `Swiper.js`

## Project structure

```text
.
├── admin/          # Admin dashboard and CRUD pages
├── css/            # Shared styles
├── images/         # Logo, landing image and carousel assets
├── inc/            # Shared header, footer and frontend includes
├── importcode/     # Supporting/import-related project files
├── index.php       # Landing page
├── restaurants.php # Restaurant listing and filters
├── review.php      # Review page
├── topcharts.php   # Ranked restaurant view
└── blog.php        # Blog page
```

## Running locally

1. Place the project inside a local PHP server environment such as XAMPP, MAMP, or a standard Apache/PHP setup.
2. Create the MySQL database expected by `admin/inc/db_config.php`.
3. Import the project database/schema if available in your local copy.
4. Start Apache and MySQL, then open `index.php` through your local server.

> This is an early learning project, so some implementation choices reflect the stage at which it was originally built.
