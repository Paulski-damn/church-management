<div align="center">
  
# ⛪ ChurchConnect

### Church Membership Management System

_Connecting Your Church Community_

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![TailwindCSS](https://img.shields.io/badge/Tailwind-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](LICENSE)

<img src="https://img.icons8.com/color/200/church.png" alt="ChurchConnect Logo" width="200"/>

[Features](#-features) • [Screenshots](#-screenshots) • [Installation](#-installation) • [Tech Stack](#-tech-stack) • [Usage](#-usage) • [Contributing](#-contributing)

---

</div>

## 📋 Table of Contents

-   [About](#-about)
-   [Features](#-features)
-   [Screenshots](#-screenshots)
-   [Tech Stack](#-tech-stack)
-   [Requirements](#-requirements)
-   [Installation](#-installation)
-   [Configuration](#-configuration)
-   [Usage](#-usage)
-   [Database Structure](#-database-structure)
-   [API Documentation](#-api-documentation)
-   [Testing](#-testing)
-   [Contributing](#-contributing)
-   [License](#-license)
-   [Support](#-support)

---

## 🌟 About

**ChurchConnect** is a comprehensive church membership management system designed to help churches efficiently manage their members, track demographics, and maintain organized records. Built with modern web technologies, it provides an intuitive interface for church administrators to oversee their congregation.

### Why ChurchConnect?

-   ✅ **Simple & Intuitive** - Easy to use interface for all age groups
-   ✅ **Comprehensive** - Complete member information management
-   ✅ **Secure** - Built-in authentication and authorization
-   ✅ **Analytics** - Real-time dashboard with demographic insights
-   ✅ **Responsive** - Works seamlessly on desktop, tablet, and mobile
-   ✅ **Open Source** - Free to use and customize

---

## ✨ Features

### 🔐 Authentication & Security

-   Secure login system with Laravel Breeze
-   Password encryption and protection
-   Session management
-   Role-based access control (future enhancement)

### 👥 Member Management

-   **Add Members** - Comprehensive member registration form
-   **View Members** - Detailed member profiles with complete information
-   **Edit Members** - Update member information easily
-   **Delete Members** - Remove inactive members with confirmation
-   **Search & Filter** - Quickly find members by name or contact
-   **Active/Inactive Status** - Track member activity status

### 📊 Dashboard Analytics

Real-time statistics and demographics:

-   **Total Active Members** - Overall congregation size
-   **Children (0-11 years)** - Track young members
-   **CYF (12-30 years)** - Christian Youth Fellowship
-   **CYAF (31-50 years)** - Christian Young Adult Fellowship
-   **UCM (51+ Men)** - United Church Men
-   **CWA (51+ Women)** - Church Women Association

### 📝 Member Information Fields

-   Personal Details (First, Middle, Last Name)
-   Date of Birth (with automatic age calculation)
-   Gender
-   Complete Address
-   Contact Number
-   Family Information (Father's & Mother's Name)
-   Membership Date
-   Active/Inactive Status

### 🎨 User Interface

-   Modern, clean design with Tailwind CSS
-   Responsive layout for all devices
-   Intuitive navigation
-   Professional color-coded categories
-   Beautiful gradient headers
-   Icon-based actions

### 📄 Additional Features

-   Member profile viewing with detailed layout
-   Print-friendly member profiles
-   Pagination for large member lists
-   Success/Error notifications
-   Data validation
-   Professional footer with contact information

---

## 📸 Screenshots

### Dashboard

![Dashboard](https://via.placeholder.com/800x450.png?text=Dashboard+Screenshot)
_Real-time analytics showing member demographics and statistics_

### Members List

![Members List](https://via.placeholder.com/800x450.png?text=Members+List+Screenshot)
_Comprehensive table view with search and filter options_

### Member Profile

![Member Profile](https://via.placeholder.com/800x450.png?text=Member+Profile+Screenshot)
_Detailed member information with organized sections_

### Add Member Form

![Add Member](https://via.placeholder.com/800x450.png?text=Add+Member+Screenshot)
_Clean, validated form for adding new members_

---

## 🛠️ Tech Stack

### Backend

| Technology                                                                                         | Version | Purpose              |
| -------------------------------------------------------------------------------------------------- | ------- | -------------------- |
| ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)                | 8.2+    | Server-side language |
| ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)    | 11.x    | PHP Framework        |
| ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)          | 8.0+    | Database             |
| ![Composer](https://img.shields.io/badge/Composer-885630?style=flat&logo=composer&logoColor=white) | 2.x     | Dependency Manager   |

### Frontend

| Technology                                                                                                | Version | Purpose         |
| --------------------------------------------------------------------------------------------------------- | ------- | --------------- |
| ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white)                 | 5       | Markup Language |
| ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white)                    | 3       | Styling         |
| ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)  | ES6+    | Interactivity   |
| ![TailwindCSS](https://img.shields.io/badge/Tailwind-38B2AC?style=flat&logo=tailwind-css&logoColor=white) | 3.x     | CSS Framework   |
| ![Blade](https://img.shields.io/badge/Blade-FF2D20?style=flat&logo=laravel&logoColor=white)               | -       | Template Engine |
| ![Vite](https://img.shields.io/badge/Vite-646CFF?style=flat&logo=vite&logoColor=white)                    | 5.x     | Build Tool      |

### Development Tools

| Tool                                                                                                        | Purpose             |
| ----------------------------------------------------------------------------------------------------------- | ------------------- |
| ![Git](https://img.shields.io/badge/Git-F05032?style=flat&logo=git&logoColor=white)                         | Version Control     |
| ![VSCode](https://img.shields.io/badge/VS%20Code-007ACC?style=flat&logo=visual-studio-code&logoColor=white) | Code Editor         |
| ![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=flat&logo=xampp&logoColor=white)                   | Local Server        |
| ![phpMyAdmin](https://img.shields.io/badge/phpMyAdmin-6C78AF?style=flat&logo=phpmyadmin&logoColor=white)    | Database Management |

### Packages & Libraries

```json
{
    "laravel/framework": "^11.0",
    "laravel/breeze": "^2.0",
    "tailwindcss": "^3.4",
    "alpinejs": "^3.13"
}
```
