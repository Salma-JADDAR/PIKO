# 🐦 PIKO – Animal Marketplace Platform

<p align="center">
A full-stack web application that provides a secure and trusted marketplace for buying and selling animals through advertisement validation, a dynamic trust score system, secure messaging, and role-based access control.
</p>

<p align="center">

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php)
![Blade](https://img.shields.io/badge/Blade-Laravel-FB503B?style=for-the-badge)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge&logo=bootstrap)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql)
![Git](https://img.shields.io/badge/Git-Version_Control-F05032?style=for-the-badge&logo=git)

---

# 📖 About

PIKO is a full-stack web application developed to provide a secure marketplace dedicated to animal advertisements.

The platform enables users to publish, browse, and purchase animals through a trusted environment while reducing fraudulent activities using a dynamic trust score system, administrative validation, secure messaging, and role-based permissions.

Built with Laravel MVC architecture, PIKO focuses on security, scalability, and delivering an intuitive user experience.

---

# 🎯 Objectives

The project aims to:

* Provide a trusted marketplace for animal advertisements.
* Improve confidence between buyers and sellers.
* Prevent fraudulent advertisements.
* Simplify animal management.
* Secure communications between users.
* Offer administrators complete moderation tools.

---

# ✨ Features

## 👤 User Management

* User registration and authentication
* Profile management
* Role-based permissions
* Dynamic Trust Score
* Automatic promotion to Verified User
* Automatic account suspension

---

## 🐦 Advertisement Management

* Create advertisements
* Save advertisements as drafts
* Upload up to five images
* Edit advertisements
* Submit advertisements for validation
* Mark advertisements as sold
* Search and filter advertisements
* Sort advertisements by different criteria
* View advertisement details

---

## 📩 Secure Messaging

* Buyer and seller communication
* Email masking
* One conversation per advertisement
* Seller reply system
* Automatic email notifications
* Self-contact prevention

---

## ⭐ Favorites

* Add advertisements to favorites
* Remove favorites
* Personalized favorites list
* Favorite limits based on user role

---

## ⭐ Trust Score System

The platform evaluates user behavior through a dynamic trust score.

* Advertisement approval increases trust score
* Advertisement rejection decreases trust score
* Automatic promotion to Verified User
* Automatic suspension for low trust score

---

## 👑 Administration

Global administrators can:

* Validate advertisements
* Reject advertisements with reasons
* Manage users
* Suspend and restore accounts
* Manage animal species
* View platform statistics
* Update user roles

---

# 👥 User Roles

| Role | Permissions |
|------|-------------|
| Visitor | Browse advertisements and search animals |
| Standard User | Publish advertisements, manage favorites, send messages |
| Verified User | Higher limits and faster advertisement validation |
| Administrator | Platform administration and moderation |

---

# 🛠 Technologies

## Backend

* Laravel 10
* PHP 8.1

## Frontend

* Blade Templates
* Bootstrap 5
* Alpine.js

## Database

* MySQL

## Development Tools

* Git
* GitHub
* Composer
* NPM
* Postman
* phpMyAdmin
* MySQL Workbench
* Laravel Debugbar
* Trello
* Slack
* VS Code

---

# 📂 Project Structure

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

---

# 🔒 Security

The application includes several security mechanisms:

* Authentication
* Authorization
* CSRF Protection
* XSS Protection
* Input Validation
* Secure File Upload
* Email Privacy Protection
* Role-based Access Control
* Dynamic Trust Score Monitoring

---

# 🚀 Installation

```bash
git clone https://github.com/Salma-JADDAR/PIKO

cd piko

composer install

npm install

cp .env.example .env

php artisan key:generate

php artisan migrate

npm run dev

php artisan serve
```



# 🔮 Future Improvements

* Mobile Application
* REST API
* AI-based Advertisement Recommendation
* Advanced Search Filters
* Online Payment Integration
* Real-Time Notifications
* Multi-language Support
* Analytics Dashboard

---

# 👨‍💻 Author

**Salma**

Computer Science Student

Full-Stack Developer

---

# 📄 License

This project was developed for educational purposes as part of a Full-Stack Web Development graduation project.
