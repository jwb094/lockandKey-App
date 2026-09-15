# 🔐 Password Keeper

A Laravel-based password management application for securely organising and managing website login credentials.

The application allows users to store website credentials, organise passwords into categories, and manage their saved passwords through a responsive dashboard.

> **Status:** 🚧 Work in Progress

---

## 📋 Table of Contents

* [About](#-about)
* [Features](#-features)
* [Technology Stack](#-technology-stack)
* [Application Structure](#-application-structure)
* [Database Structure](#-database-structure)
* [Authentication](#-authentication)
* [Installation](#-installation)
* [Environment Configuration](#-environment-configuration)
* [Database Setup](#-database-setup)
* [Running the Application](#-running-the-application)
* [Project Architecture](#-project-architecture)
* [Validation](#-validation)
* [Responsive Interface](#-responsive-interface)
* [Security Considerations](#-security-considerations)
* [Future Improvements](#-future-improvements)

---

## 📖 About

Password Keeper is a web application built with Laravel that provides a centralised location for managing website login credentials.

Users can:

* Create password records
* Store website and username information
* Store encrypted/hashed password data
* Organise passwords by category
* Edit existing password records
* Delete password records
* View passwords through a responsive dashboard
* Manage categories
* Authenticate through a user account

The project is also being used as a practical Laravel application to develop experience with MVC architecture, Eloquent relationships, Form Requests, Actions, Services, authentication, database migrations and Blade components.

---

## ✨ Features

### 👤 User Authentication

* User registration
* User login
* User logout
* Authenticated dashboard
* Protected application routes
* Session-based authentication

### 🔑 Password Management

* Add password records
* Edit password records
* Delete password records
* Store website information
* Store usernames
* Store password credentials
* Add notes to password records
* Assign passwords to categories
* Allow passwords to exist without a category

### 🗂️ Categories

Passwords can be organised into categories.

Example:

```text
Social Media
├── Facebook
├── Instagram
└── LinkedIn

Banking
├── Barclays
├── HSBC
└── Monzo

Email
├── Gmail
└── Outlook
```

### 🖥️ Dashboard

The dashboard provides different interfaces depending on screen size.

#### Desktop / Tablet

Passwords are displayed using a tab-based interface.

#### Mobile

Passwords are displayed using a Bootstrap accordion to provide a more suitable mobile interface.

---

## 🛠️ Technology Stack

### Backend

* PHP
* Laravel
* Laravel Eloquent ORM
* SQLite

### Frontend

* Blade
* Bootstrap 5.3
* HTML5
* CSS3
* JavaScript

### Development Tools

* Laravel Herd
* Composer
* Node.js / npm
* Vite

---

## 📁 Application Structure

The application follows Laravel's standard structure with additional Actions and Services used to separate application logic from controllers.

```text
app/
├── Http/
│   ├── Controllers/
│   └── Requests/
│
├── Models/
│   ├── User.php
│   ├── Password.php
│   └── Category.php
│
├── Services/
│   └── ...
│
└── ...
```

---

## 🗄️ Database Structure

The main entities are:

```text
User
 │
 └── Passwords

Category
 │
 └── Passwords
```

### Users

Stores application users.

Example fields:

```text
id
first_name
last_name
email
password
password_hash
remember_token
created_at
updated_at
```

### Categories

Stores password categories.

Example:

```text
id
title
notes
created_at
updated_at
```

### Passwords

Stores password records.

Example:

```text
id
category_id
website
username
password
password_hash
notes
created_at
updated_at
```

### Relationships

A category can have many passwords:

```php
public function passwords()
{
    return $this->hasMany(Password::class);
}
```

A password belongs to a category:

```php
public function category()
{
    return $this->belongsTo(Category::class);
}
```

The `category_id` column can be nullable, allowing a password to exist without being assigned to a category.

---

## 🔐 Authentication

The application uses Laravel authentication to protect dashboard functionality.

Unauthenticated users are prevented from accessing protected routes.

The general authentication flow is:

```text
Login Form
    ↓
LoginRequest
    ↓
Controller
    ↓
LoginUserAction
    ↓
Authentication
    ↓
Dashboard
```

Logout follows the same application-layer approach where appropriate:

```text
Logout Request
    ↓
Controller
    ↓
LogoutUserAction
    ↓
Auth::logout()
    ↓
Login Page
```

The application uses a custom `password_hash` database column for storing password hashes.

---

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
```

Navigate into the project:

```bash
cd passwords-app
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install JavaScript Dependencies

```bash
npm install
```

### 4. Create the Environment File

```bash
cp .env.example .env
```

### 5. Generate the Application Key

```bash
php artisan key:generate
```

---

## ⚙️ Environment Configuration

Configure the `.env` file with the appropriate application and database settings.

Example:

```env
APP_NAME="Password Keeper"
APP_ENV=local
APP_KEY=
APP_DEBUG=true

DB_CONNECTION=sqlite
```

For SQLite, create the database file:

```bash
touch database/database.sqlite
```

---

## 🗃️ Database Setup

Run the database migrations:

```bash
php artisan migrate
```

If you are working with a development database and want to completely rebuild it:

```bash
php artisan migrate:fresh
```

> ⚠️ `migrate:fresh` deletes all existing database tables and their data.

---

## 🌱 Database Seeding

If database seeders are available, run:

```bash
php artisan db:seed
```

Or:

```bash
php artisan migrate --seed
```

---

## ▶️ Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

Start Vite:

```bash
npm run dev
```

If using Laravel Herd, the application can also be accessed through the configured Herd site.

---

## 🏗️ Project Architecture

The application aims to keep controllers thin and separate HTTP concerns from application/business logic.

The general flow is:

```text
HTTP Request
     ↓
Route
     ↓
Controller
     ↓
Form Request
     ↓
Action / Service
     ↓
Eloquent Model
     ↓
Database
```

### Controllers

Controllers act as the HTTP layer of the application.

They are responsible for:

* Receiving requests
* Calling Form Requests
* Calling Actions or Services
* Returning responses/views/redirects

Controllers should avoid containing large amounts of business logic.

### Form Requests

Form Requests are responsible for validating incoming form data.

Example:

```php
'category_id' => [
    'nullable',
    'exists:categories,id',
],
```

This ensures that an optional category either contains a valid category ID or `NULL`.

### Actions

Actions represent individual application operations.

Examples:

```text
LoginUserAction
LogoutUserAction
CreatePasswordAction
UpdatePasswordAction
DeletePasswordAction
```

An Action should generally represent a single meaningful use case.

### Services

Services are used where multiple related operations or more complex business logic need to be grouped together.

The intention is to prevent controllers from becoming overly large and difficult to maintain.

---

## ✅ Validation

Validation is handled through Laravel Form Request classes rather than placing validation directly inside controllers.

Typical validation includes:

* Required fields
* Email validation
* Password validation
* Category existence
* String length
* Optional fields

Example:

```php
'website' => [
    'required',
    'string',
    'max:255',
],

'username' => [
    'required',
    'string',
    'max:255',
],

'category_id' => [
    'nullable',
    'exists:categories,id',
],
```

---

## 📱 Responsive Interface

The application provides different navigation interfaces depending on viewport size.

### Desktop / Tablet

Bootstrap tabs are used:

```text
┌──────────────┬──────────────────────────────┐
│ Social       │ Facebook                     │
│ Banking      │ Instagram                    │
│ Email        │ LinkedIn                     │
│ Work         │                              │
└──────────────┴──────────────────────────────┘
```

### Mobile

Bootstrap's accordion is used:

```text
┌──────────────────────────────┐
│ Social Media             ▼   │
├──────────────────────────────┤
│ Banking                  ▶   │
├──────────────────────────────┤
│ Email                    ▶   │
└──────────────────────────────┘
```

The two interfaces use separate element IDs to prevent Bootstrap's JavaScript components from conflicting when both components exist in the DOM.

---

## 🔒 Security Considerations

Password management applications require particular attention to security.

Important considerations include:

* Passwords should never be stored as plain text.
* Password hashes should be generated using Laravel's hashing functionality.
* Authentication routes should be protected by middleware.
* Form input should be validated.
* CSRF protection should remain enabled.
* Database queries should use Eloquent/query builder rather than manually constructing SQL.
* Sensitive information should not be exposed in views or application logs.
* Production applications should use HTTPS.
* Application secrets should not be committed to version control.

> **Important:** This project is primarily a Laravel development/learning project and should not be considered a production-grade password manager without further security review and additional protections.

---

## 🔮 Future Improvements

Potential future features include:

* [ ] Password generator
* [ ] Password strength indicator
* [ ] Password visibility toggle
* [ ] Copy username/password to clipboard
* [ ] Search passwords
* [ ] Filter passwords by category
* [ ] Create/edit/delete categories
* [ ] Password favourites
* [ ] Password expiry reminders
* [ ] Password history
* [ ] User-specific password records
* [ ] Encryption for stored credentials
* [ ] Two-factor authentication
* [ ] Account recovery
* [ ] Activity/audit logging
* [ ] API
* [ ] Automated tests
* [ ] Feature tests
* [ ] Unit tests
* [ ] Improved accessibility
* [ ] Dark mode

---

## 📚 Learning Objectives

This project is also designed to provide practical experience with Laravel development.

Key concepts explored include:

* Laravel MVC
* Routing
* Controllers
* Blade
* Blade Components
* Form Requests
* Eloquent ORM
* Eloquent Relationships
* Database Migrations
* Authentication
* Middleware
* Dependency Injection
* Actions
* Services
* CRUD operations
* Responsive Bootstrap interfaces
* Session management
* Validation
* Database constraints
* Foreign keys
* Nullable relationships
* Vite
* JavaScript
* Application architecture

---

## 📌 Project Status

**Work in Progress**

The application is actively being developed and refactored as new Laravel concepts and architectural patterns are introduced.

The current focus is on building a clean Laravel architecture while keeping the application practical and maintainable.
