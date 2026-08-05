# ShikVan – Coaching Management System (SaaS)

ShikVan is a **multi-tenant SaaS-based Coaching Management System** designed to help coaching organizations manage their complete operations through a scalable, secure, and role-based platform.

The system supports a hierarchical organization model where multiple employers can manage institutes and branches while maintaining complete tenant-level data isolation. It provides modules for admissions, user management, role-based access control, and automated fee tracking.

---

## 🚀 Key Features

### 🏢 Multi-Level Organization Hierarchy

ShikVan follows a structured organizational model:

```
Employer
   └── Institute
          └── Branch
```

This enables organizations with multiple institutes and branches to manage their operations from a centralized platform.

---

### 🔐 Multi-Tenant Architecture

* Implemented a tenant-based isolation model for SaaS scalability.
* Each employer/institute operates as an independent tenant.
* Ensures secure separation of data between different organizations.
* Supports scalable onboarding of multiple coaching businesses on the same platform.

---

### 👥 Role-Based Access Control (RBAC)

Implemented a flexible permission system supporting multiple user levels.

Example roles:

* Super Admin
* Employer Admin
* Institute Admin
* Branch Manager
* Counselor
* Accountant
* Faculty

Each role has controlled access to specific modules and operations based on assigned permissions.

---

## 📚 Core Modules

### 🎓 Admission Management

Manage the complete student admission workflow:

* Student registration
* Admission records
* Course and batch allocation
* Branch-wise student management
* Admission status tracking

---

### 💰 Automated Fee Management

Streamline financial operations with:

* Fee structure management
* Student payment tracking
* Pending fee calculation
* Payment history
* Automated fee status updates

---

### 👤 User & Organization Management

Manage platform users and organizational units:

* Employer management
* Institute creation
* Branch management
* User onboarding
* Role assignment
* Permission control

---

## 🏗️ System Architecture

ShikVan is designed using a scalable SaaS architecture with:

* Multi-tenant data isolation
* Modular service design
* Secure authentication and authorization
* Role-based permissions
* Organization-level access control

---

## 🛠️ Technology Stack

(Add your actual technologies here)

Example:

**Backend**

* Node.js / Java / .NET / Django

**Frontend**

* React.js / Angular / Vue.js

**Database**

* PostgreSQL / MySQL / MongoDB

**Authentication**

* JWT / OAuth / Session-based Authentication

**Deployment**

* Docker / AWS / Azure / VPS

---

## 📂 Project Structure

```
ShikVan/
│
├── backend/
│   ├── modules/
│   ├── authentication/
│   ├── tenant-management/
│   └── database/
│
├── frontend/
│   ├── components/
│   ├── pages/
│   └── services/
│
├── docs/
│
└── README.md
```

---

## 🔒 Security Design

The system implements:

* Tenant-level data isolation
* Role-based authorization
* Protected API access
* Permission-driven operations
* Secure user authentication

---

## 🎯 Project Goals

The objective of ShikVan is to provide coaching institutes with a centralized platform to:

* Manage multiple branches efficiently
* Securely handle organizational data
* Automate admission workflows
* Track student payments
* Improve operational efficiency

---

## 📈 Future Enhancements

Potential improvements:

* Online payment gateway integration
* Student and parent portals
* Attendance management
* Exam and result management
* Analytics dashboard
* Notification system

---

## 👨‍💻 Developer

Built as a scalable SaaS solution for modern coaching institute management.

---

## 📄 License

This project is licensed under the MIT License.
