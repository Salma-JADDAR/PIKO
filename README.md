<div align="center">

# 🐦 PIKO - Animal Marketplace Platform

<p align="center">
A modern full-stack web platform for buying and selling animals securely with a dynamic trust score system, administrative validation, secure messaging, and role-based access control.
</p>

<p align="center">

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge\&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge\&logo=php)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge\&logo=bootstrap)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge\&logo=mysql)
![Blade](https://img.shields.io/badge/Blade-Laravel-FB503B?style=for-the-badge)
![Git](https://img.shields.io/badge/Git-Version_Control-F05032?style=for-the-badge\&logo=git)
![GitHub](https://img.shields.io/badge/GitHub-Repository-181717?style=for-the-badge\&logo=github)

</p>

---

## 📖 Table of Contents

* [About](#-about)
* [Project Objectives](#-project-objectives)
* [Key Features](#-key-features)
* [Application Modules](#-application-modules)
* [Technologies](#-technologies)
* [System Overview](#-system-overview)

---

# 📌 About

**PIKO** is a full-stack web application developed as a graduation project.

The platform provides a secure marketplace where users can publish, browse, and purchase animals through a trusted environment.

Unlike traditional classified advertisement websites, PIKO introduces a **Dynamic Trust Score System**, administrative validation of advertisements, secure messaging, favorites management, and intelligent moderation mechanisms to improve user confidence and reduce fraudulent activities.

The application follows modern web development practices using Laravel and provides a responsive and intuitive user experience.

---

# 🎯 Project Objectives

The main objectives of PIKO are:

* Build a secure marketplace dedicated to animal advertisements.
* Improve trust between buyers and sellers.
* Prevent fraudulent advertisements.
* Simplify animal searching and browsing.
* Provide a responsive and user-friendly interface.
* Encourage responsible trading through a trust score system.
* Offer administrators complete moderation tools.

---

# 🚀 Key Features

## 🔐 Authentication & User Management

* Secure user registration
* Secure login/logout
* Password hashing
* Profile management
* Email verification
* Role-based authorization
* Dynamic Trust Score
* Automatic role promotion
* Automatic account suspension

---

## 📝 Advertisement Management

Users can:

* Create advertisements
* Save advertisements as draft
* Upload up to five images
* Edit advertisements
* Submit advertisements for approval
* Mark advertisements as sold
* Search advertisements
* Filter advertisements
* Sort advertisements
* View advertisement details

---

## 👑 Administration Panel

Administrators can:

* Validate advertisements
* Reject advertisements with reasons
* Manage users
* Suspend accounts
* Restore suspended users
* Manage animal species
* Update user roles
* Access platform statistics

---

## 💬 Secure Messaging

The platform includes an internal messaging system allowing buyers and sellers to communicate safely.

Features include:

* Email masking
* Anti self-contact protection
* One conversation per advertisement
* Seller reply system
* Automatic email notifications

---

## ⭐ Favorites

Users can:

* Save favorite advertisements
* Remove favorites
* Access personalized favorite lists

Favorite limits depend on the user's role.

---

## 📊 Statistics Dashboard

The administration dashboard provides:

* Total advertisements
* Pending advertisements
* Approved advertisements
* Rejected advertisements
* Active users
* Suspended users
* Trust score monitoring

---

# 🧩 Application Modules

The platform consists of several independent modules:

* Authentication Module
* Advertisement Module
* Administration Module
* User Management Module
* Favorites Module
* Messaging Module
* Notification Module
* Trust Score Engine
* Animal Species Management
* Search & Filtering Module

---

# 💡 Why PIKO?

Unlike traditional marketplace applications, PIKO focuses on building trust between users.

The project introduces several innovative ideas such as:

* Dynamic Trust Score
* Advertisement Validation Workflow
* Secure Messaging
* Automatic User Promotion
* Intelligent User Suspension
* Email Privacy Protection

These mechanisms make the platform safer and more reliable for animal trading.

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
* Visual Studio Code

---

# 🌍 System Overview

PIKO connects three main actors:

👤 Visitor

⬇

👥 Registered Users

⬇

🛡 Administrator

Each actor has specific permissions designed to guarantee platform security and maintain a high level of trust.

---

---

# 👥 User Roles

PIKO defines three user roles, each with specific permissions and platform limitations.

| Role              | Permissions                                                                                                        |
| ----------------- | ------------------------------------------------------------------------------------------------------------------ |
| **Visitor**       | Browse advertisements, search animals, and view public information.                                                |
| **Standard User** | Publish advertisements, manage favorites, send messages, and edit their profile.                                   |
| **Verified User** | Higher advertisement and favorites limits with accelerated advertisement validation.                               |
| **Administrator** | Full access to user management, advertisement validation, species management, statistics, and platform moderation. |

---

# ⭐ Dynamic Trust Score System

One of the core features of PIKO is the **Dynamic Trust Score System**, designed to improve trust and reduce fraudulent activities.

### Trust Score Rules

| Action                 |                             Score Impact |
| ---------------------- | ---------------------------------------: |
| Advertisement approved |                                       +5 |
| Advertisement rejected |                                      -10 |
| Trust score ≥ 70       | Automatic promotion to **Verified User** |
| Trust score < 40       |             Automatic account suspension |

This scoring mechanism encourages responsible behavior and helps maintain a reliable marketplace.

---

# 🔄 Advertisement Workflow

Every advertisement follows a validation process before becoming publicly visible.

```text
Create Advertisement
        │
        ▼
Save as Draft
        │
        ▼
Submit for Review
        │
        ▼
Administrative Validation
   ┌───────────────┐
   │               │
Approved       Rejected
   │               │
Published     Reason Sent to User
```

---

# 🏗️ Project Structure

```text
PIKO/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
├── storage/
├── tests/
└── README.md
```

---

# 🗄️ Main Database Entities

The application database is organized around the following core entities:

* Users
* Roles
* Advertisements
* Animal Species
* Favorites
* Messages
* Notifications
* Trust Scores

These entities work together to provide secure authentication, advertisement management, communication, and moderation features.

---

# 🔒 Security Features

PIKO implements several security mechanisms to protect users and platform data.

* Password hashing
* CSRF protection
* Role-based authorization
* Input validation
* Secure file upload
* Email privacy protection
* Advertisement moderation
* Automatic account suspension based on trust score

---

# 📈 Future Improvements

Future versions of PIKO may include:

* Mobile application
* Online payment integration
* Interactive maps
* AI-powered fraud detection
* Real-time chat
* Recommendation system
* Multi-language support
* REST API


> ⭐ This project was entirely designed and developed by **Imane** as a Full-Stack Web Development project.
