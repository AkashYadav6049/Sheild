# Shield AI — Website Data Only

This folder contains ONLY your website data (not WordPress core files).

## What's included

```
D:\wordpress\
├── theme\shield-ai\          ← Your Shield AI theme (all PHP, CSS, JS)
├── database\shield_ai_db.sql   ← Your pages, posts, settings, admin user
├── uploads\                    ← Media uploads (if any)
└── README.txt                  ← This file
```

## Your theme files (edit these)

D:\wordpress\theme\shield-ai\

- front-page.php      — Homepage
- header.php          — Header & navigation
- footer.php          — Footer & contact modal
- functions.php       — Theme settings
- style.css           — Theme info
- assets\css\main.css — Styles
- assets\js\main.js   — JavaScript
- page-templates\     — Product pages

## Website still runs from XAMPP

WordPress core stays at:
C:\xampp\xampp\htdocs\wordpress\

Your live site:
http://localhost/wordpress/

Admin:
http://localhost/wordpress/wp-admin/
Username: admin
Password: Admin@123

## Restore theme to XAMPP (if needed)

Copy theme folder to:
C:\xampp\xampp\htdocs\wordpress\wp-content\themes\shield-ai\

## Restore database (if needed)

1. Open http://localhost/phpmyadmin
2. Select database `shield_ai_db`
3. Import `database\shield_ai_db.sql`

## Open in Cursor

File → Open Folder → D:\wordpress\theme\shield-ai
