# Aaron Bergmann's Portfolio Website

This is a personal website created by me (Aaron Bergmann).
The website contains projects, contact information, and a simple admin login panel for site management. 

---

## Features

- **About Me Page** — Introduction and additional information.
- **Projects Gallery** — A scrolling gallery containing featured projects with modal popups.
- **Contact Form** — Users can submit messages via a contact form.
- **Admin Login** — Basic login form for accessing an admin page.
- **Message Viewer** — Admin panel for displaying messages from users.
- **Unique Visitor Counter** — Tracks and displays number of unique visitors by IP.
- **Semantic HTML** — Helps screen readers understand page structure.
- **Keyboard Navigation** — Makes website usable without a mouse.
- **ARIA Roles & Labels** —  Provides additional info to assistive tech.
- **High Contrast & Alt Text** — Improves Readability and comprehension.

---

## Technology Used

| Technology       | Purpose                                                |
|------------------|--------------------------------------------------------|
| **HTML5**        | Structure of all pages                                 |
| **CSS3**         | Document styling                                       |
| **JavaScript**   | Form validation, modal handling, year display          |
| **PHP**          | Backend logic for contact form, login, visitor counter |
| **MySQL**        | Database for storing messages and visitor IPs          |
| **phpMyAdmin**   | GUI for managing the MySQL database                    |

---

## Setup Instructions

### 1. Files

```
/project-root
│
├── index.html
├── about.html
├── contact.html
├── projects.html
├── cfetch.php
├── login.php
├── admin.php
│
├── /css/
│   ├── global.css
│   ├── home.css
│   ├── about.css
│   ├── contact.css
│   └── projects.css
│
├── /js/
│   ├── script.js
│   ├── modalHandler.js
│   └── validateForm.js
│
├── /img/
│   └── smiley.jpeg, placeholder images, etc.
```

### 2. MySQL Database Setup

In phpMyAdmin, create a new database (e.g. `portfolio_db`), and run:

```sql
-- Visitor counter table
CREATE TABLE visitors (
    ip VARCHAR(45) NOT NULL UNIQUE
);

-- Contact form messages
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    message TEXT
);
```

### 3. Update PHP

In PHP files, replace credentials with actual values:

```php
$host = "localhost";
$dbname = "portfolio_db";
$uname = "your_username";
$pword = "your_password";
```

### 4. Start Website

- Open the site in your browser (`index.html`)
- You can view submitted messages in `admin.php`.

---

## Notes

- Visitor count uses IPs; could be imprecise for users behind the same network or using VPNs.
- Admin login uses hardcoded credentials (replace before putting into production)
- Lack of password hashing or security measures. (proof of concept)
- Website is prone to SQL injection attacks.

---

## 📄 License

This project is proprietary and all rights are reserved.

Use, distribution, or modification of any part of this codebase without **explicit prior written permission** from the copyright holder is strictly prohibited.

See the [LICENSE.txt](./LICENSE.txt) file for full terms.

