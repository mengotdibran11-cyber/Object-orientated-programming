# Contact Form

A simple PHP and MySQL contact form. Visitors enter their name, email and phone number, and the details are saved to a database.

## Features

- Responsive contact form (HTML + CSS)
- Client-side validation (required fields, email format, phone number pattern)
- Server-side handling with PHP using MySQLi prepared statements (protects against SQL injection)
- Output escaped with `htmlspecialchars()` to prevent XSS in the confirmation message

## Project Structure

```
.
├── index.php     # The contact form page
├── style.css     # Styling for the form
├── submit.php    # Handles the form submission and saves to MySQL
└── README.md     # This file
```

## Requirements

- PHP 7.4 or higher (with the `mysqli` extension enabled)
- MySQL or MariaDB
- A local server stack such as XAMPP, WAMP or MAMP (or PHP's built-in server)

## Setup

1. **Copy the project** into your server's web root, for example `htdocs/contact-form` in XAMPP.

2. **Create the database and table.** Open phpMyAdmin or the MySQL console and run:

   ```sql
   CREATE DATABASE contacts;

   USE contacts;

   CREATE TABLE my_contact (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(100) NOT NULL,
     email VARCHAR(150) NOT NULL,
     contact VARCHAR(20) NOT NULL,
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

3. **Check the database credentials** at the top of `submit.php`:

   ```php
   $host   = "localhost";
   $user   = "root";
   $pass   = "";
   $dbName = "contacts";
   ```

   Change these if your MySQL setup is different.

4. **Start Apache and MySQL**, then open:

   ```
   http://localhost/contact-form/index.php
   ```

   Or use PHP's built-in server from the project folder:

   ```
   php -S localhost:8000
   ```

   and visit `http://localhost:8000/index.php`.

## Usage

1. Fill in your name, email and phone number (e.g. `+237 6XX XXX XXX`).
2. Click **Submit**.
3. A confirmation message appears, and the entry is stored in the `my_contact` table.

To view saved entries:

```sql
SELECT * FROM my_contact;
```

## Notes

- The default `root` user with an empty password is fine for local development only. Use a dedicated database user with a strong password in production.
- The phone field accepts digits, spaces and `+`, between 9 and 15 characters.
- Possible improvements: server-side validation, redirecting back to the form after submit, and showing a styled success message.

## Tech Stack

HTML, CSS, PHP, MySQL
