# 🛒 ShopHub

A modern **E-commerce Web Application** built with **Laravel 13**, **Blade**, **Tailwind CSS**, and **MySQL**. This project is being developed to practice real-world Laravel concepts and follows an industry-style architecture with separate **Admin** and **Customer** sections.

## 🚀 Tech Stack

* Laravel 13
* PHP 8+
* Blade Template Engine
* Tailwind CSS
* MySQL
* Laravel Breeze (Authentication)
* Vite
* Laravel Herd (Development Environment)

---

## ✨ Features

### Authentication

* User Registration
* User Login
* User Logout
* Password Reset
* Email Verification

### User Roles

* Admin
* Customer

### Customer Features (Planned)

* Home Page
* Product Listing
* Product Details
* Category Filtering
* Shopping Cart
* Wishlist
* Checkout
* Order History
* Profile Management

### Admin Features (Planned)

* Dashboard
* Product Management (CRUD)
* Category Management
* Order Management
* Customer Management
* Inventory Management

---

## 📂 Project Structure

```text
app/
├── Http/
│   └── Controllers/
│       ├── Admin/
│       └── Frontend/

resources/
└── views/
    ├── admin/
    ├── frontend/
    ├── auth/
    ├── layouts/
    └── components/

routes/
└── web.php
```

---

## 📌 Current Progress

* ✅ Laravel 13 Project Setup
* ✅ Laravel Breeze Authentication
* ✅ Tailwind CSS Configuration
* ✅ User Role System (`admin` & `customer`)
* ✅ Frontend Controller
* ✅ Admin Dashboard Controller
* ✅ Home Page Structure
* 🔄 Admin Middleware (In Progress)

---

## 🛠 Installation

Clone the repository:

```bash
git clone https://github.com/your-username/shophub.git
```

Move into the project:

```bash
cd shophub
```

Install PHP dependencies:

```bash
composer install
```

Install JavaScript dependencies:

```bash
npm install
```

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure your database in the `.env` file, then run:

```bash
php artisan migrate
```

Start the Vite development server:

```bash
npm run dev
```

Serve the application (or use Laravel Herd):

```bash
php artisan serve
```

---

## 🎯 Learning Objectives

This project is focused on mastering Laravel concepts such as:

* Authentication
* Authorization
* Middleware
* Blade Components
* CRUD Operations
* Eloquent Relationships
* File Uploads
* Validation
* Sessions
* Route Model Binding
* Shopping Cart Logic
* Order Management

---

## 📅 Development Roadmap

* [x] Authentication
* [x] User Roles
* [ ] Admin Middleware
* [ ] Layout System
* [ ] Navbar
* [ ] Category Module
* [ ] Product Module
* [ ] Shopping Cart
* [ ] Checkout
* [ ] Orders
* [ ] Wishlist
* [ ] Reviews & Ratings
* [ ] Admin Dashboard
* [ ] Reports & Analytics

---

## 📄 License

This project is created for learning and portfolio purposes.
