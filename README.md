# 🧾 Sari-Sari Store Inventory Tracker

A simple CRUD-based web application that helps a sari-sari store owner keep track of product inventory — including current stock, quantity alerts, and supplier information — in a clean and festive interface.

---

## 📋 Scenario

A small sari-sari store wants to digitize its product inventory system. This tool allows the store owner to:

- ➕ Add new products
- 📝 View and update existing product details
- 🗑️ Delete products
- 🚨 Get visual alerts when stock quantity is low (less than 5)

---

## 🛠️ Tech Stack

- **PHP** (with PDO for secure database access)
- **MySQL** (via XAMPP)
- **HTML5 & CSS3** (with a festive, responsive UI)
- **JavaScript** (for quantity alert logic)
- **Font Awesome** (for icons)

---

## ▶️ How to Run This Project

1. **Install XAMPP** and start `Apache` and `MySQL`.

2. **Import the Database:**
   - Open **phpMyAdmin**.
   - Create a new database (e.g., `inventory_db`, `sarisari_db`).
   - Import the provided `.sql` file with the products table.

3. **Project Setup:**
   - Place the project folder inside `htdocs` (e.g., `C:\xampp\htdocs\SariSariInventory`).
   - Update `db.php` with your database credentials if needed:
     ```php
     $conn = new PDO("mysql:host=localhost;dbname=sarisari_db", "root", "");
     ```

4. **Access the Web App:**
   - Visit [http://localhost/SariSariInventory](http://localhost/SariSariInventory) in your browser.

---

## 📁 File Overview

| File           | Purpose                          |
|----------------|----------------------------------|
| `index.php`    | Lists all products               |
| `add.php`      | Form to add a new product        |
| `edit.php`     | Edit existing product info       |
| `delete.php`   | Deletes a product record         |
| `style.css`    | Festive styling and layout       |
| `script.js`    | JS-based low-stock quantity alert |
| `db.php`       | Database connection using PDO    |

---

## 🙌 Credits

- **Font Awesome** icons: [https://fontawesome.com](https://fontawesome.com)
- Button color ideas based on Bootstrap's palette
- Developed with ❤️ by [Your Name Here]

---



