
# Restaurant Website (PHP + MySQL) — Full Project

## What is included
- Frontend: index.php (menu), gallery, booking form, place order form.
- Admin panel: `admin/login.php`, `admin/dashboard.php`, product add/update/delete, mark out-of-stock (blurs image on frontend), view orders, view bookings (for current date), view sales (text + Chart.js chart), gallery management, offers management.
- Database connection: `inc/db.php`
- SQL file to create required tables: `sql/create_tables.sql`

## How to run locally (XAMPP / WAMP)
1. Put the `restaurant_site` folder inside your `htdocs` (XAMPP) or `www` (WAMP).
2. Create a MySQL database (e.g., `restaurant_db`) and import `sql/create_tables.sql` using phpMyAdmin or MySQL CLI.
3. Update database credentials in `inc/db.php` if needed.
4. Start Apache and MySQL, open `http://localhost/restaurant_site/` in your browser.
5. Admin login:
   - default username: `admin@example.com`
   - default password: `admin123`

## Notes
- This is a lightweight, educational example. For production use, secure file uploads, sanitize all inputs, and use prepared statements everywhere.
- Chart.js is loaded from CDN in admin sales view.
