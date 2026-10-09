# ShikVan — Coaching Management System

ShikVan is a Laravel-based coaching management application designed to help coaching organizations manage institutes, branches, learners, academic activities, admissions, enrollments, and fee-related operations through a centralized system.

The project explores a multi-level organization structure and role-based access patterns for managing different users and responsibilities within a coaching organization.

**Project type:** SaaS-oriented web application
**Backend:** PHP 8.2+ and Laravel 12
**Database:** MySQL
**Frontend:** Laravel views and the frontend assets configured in the project

## 1. Project Objectives

The main objectives of ShikVan are to:

* Organize employers, institutes, and branches.
* Manage users and their assigned roles.
* Support learner admissions and enrollment workflows.
* Manage programs, courses, batches, and academic activities.
* Track fees, payments, discounts, and related financial records.
* Provide a foundation for managing multiple coaching organizations within a structured application.

## 2. Organization Structure

The application uses the following conceptual organization hierarchy:

```text
Employer
└── Institute
    └── Branch
        ├── Users and Roles
        ├── Learners
        ├── Programs and Courses
        ├── Batches and Enrollments
        └── Academic and Financial Activities
```

This structure represents how the main organizational entities relate to one another. The enforcement of access restrictions between organizations and branches must be evaluated across the relevant routes, controllers, middleware, and database queries.

## 3. Main Application Modules

The codebase contains models, controllers, routes, and database migrations associated with the following areas.

### Organization and User Management

* Employer and institute information
* Branch management
* User profiles and user onboarding
* Role and permission records
* User-to-role and user-to-branch relationships

### Programs, Courses, and Batches

* Program and course management
* Program pricing and related configuration
* Batch management
* Instructor-course assignments
* Learner-to-batch relationships

### Admissions and Enrollment

* Admission form configuration
* Public admission form workflows
* Admission tokens and admission records
* Learner enrollment
* Enrollment-related course and fee records

### Fees and Payments

* Fee configuration
* Payment records and payment tracking
* Enrollment fee records
* Discounts and penalties
* Tax-related configuration

### Academic Management

* Timetable management
* Learner and lecture attendance
* Assignments and submissions
* Examinations, exam papers, and results
* Academic lifecycle records

### Additional Application Areas

The codebase also contains models for subscriptions, packages, pricing zones, activity logs, communications, support tickets, and related application records.

**Implementation note:** The presence of a model, migration, controller, or route does not by itself confirm that a complete feature is implemented, tested, or ready for production. Feature completeness and access-control behavior should be verified separately.

## 4. Technology Stack

| Component                  | Technology                                             |
| -------------------------- | ------------------------------------------------------ |
| Backend framework          | Laravel 12                                             |
| Programming language       | PHP 8.2 or later                                       |
| Database                   | MySQL                                                  |
| Dependency management      | Composer                                               |
| Frontend build tooling     | npm and Vite, as configured by the project             |
| File and media integration | Cloudinary Laravel package is included as a dependency |
| Version control            | Git and GitHub                                         |

The exact frontend libraries, deployment environment, and active use of external integrations should be confirmed from the project configuration before being described as implemented capabilities.

## 5. Repository Structure

The application follows a Laravel project structure. Important directories include:

```text
ShikVan/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Models/
│   └── Services/
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── resources/
├── routes/
├── tests/
├── composer.json
├── package.json
└── README.md
```

This is a high-level overview of the Laravel application. It is not an exhaustive list of every file or subdirectory.

* **`app/Http/Controllers/`** — handles application requests and feature workflows.
* **`app/Http/Middleware/`** — contains request middleware, including role-related routing checks.
* **`app/Models/`** — defines application models and their data relationships.
* **`app/Services/`** — contains reusable service-level logic.
* **`database/migrations/`** — defines database tables and schema changes.
* **`routes/`** — defines application endpoints and their middleware groups.
* **`resources/`** — contains frontend resources and view-related files.
* **`tests/`** — is the intended location for automated tests.

## 6. Local Development Setup

### Prerequisites

Install the following before running the application:

* PHP 8.2 or later
* Composer
* MySQL
* Node.js and npm
* Git

### Step 1 — Clone the repository

```bash
git clone https://github.com/MayurNB/CLMS-SaaS-Prouduct-Shikvan.git
cd CLMS-SaaS-Prouduct-Shikvan
```

### Step 2 — Install PHP dependencies

```bash
composer install
```

### Step 3 — Configure the environment

Create a local environment file:

```bash
cp .env.example .env
```

On Windows, you can also copy `.env.example` to `.env` using File Explorer.

Generate the application key:

```bash
php artisan key:generate
```

### Step 4 — Configure the database

Create a local MySQL database and update the database connection settings in `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Replace the example values with your local database credentials.

### Step 5 — Run database migrations

After reviewing the migrations and configuring the database:

```bash
php artisan migrate
```

If the application requires specific seed data, follow the project's actual seeder configuration. Do not run destructive database commands against data you need to preserve.

### Step 6 — Install frontend dependencies

```bash
npm install
npm run build
```

### Step 7 — Start the application

```bash
php artisan serve
```

Use the local address shown in the terminal to access the application.

**Setup note:** These are the standard Laravel setup steps adapted to this repository. Additional environment variables, storage configuration, or project-specific initialization may be necessary. Successful setup has not been verified by this README.

## 7. Architecture and Security Considerations

ShikVan contains organizational relationships, user-role relationships, branch assignments, and middleware used to organize access to application routes.

Important areas for further verification include:

* Whether users can access only the organizations and branches they are authorized to access.
* Whether authorization is enforced in addition to selecting a role in the session.
* Whether individual record lookups and database queries are scoped appropriately.
* Whether payment and enrollment operations validate ownership and access permissions.
* Whether public admission tokens are validated and handled safely.
* Whether sensitive configuration and credentials are excluded from version control.

These are important review areas for a multi-tenant application. Their inclusion here identifies what must be verified; it is not a claim that every security requirement has already been satisfied.

## 8. Current Development Status

ShikVan is an individual software development project covering multiple interconnected coaching-management domains.

The repository contains implementation code and database schema elements for the modules described above. The completeness of individual workflows, automated test coverage, deployment readiness, and production security still need to be assessed against the actual application.

The next development priorities are to:

1. Verify the main application workflows.
2. Review tenant and branch-level access restrictions.
3. Document the relationships between major modules.
4. Test important admission, enrollment, and payment scenarios.
5. Improve setup instructions and maintain clear technical documentation.

## 9. Related Architecture Documentation

The companion repository contains the architecture and case-study documentation for ShikVan:

**[LMS-SaaS-MultiTenant-Architecture-CaseStudy](https://github.com/MayurNB/LMS-SaaS-MultiTenant-Architecture-CaseStudy)**

The application repository is the source-code implementation. The companion repository is intended to explain the system design, organization hierarchy, workflows, and architectural concepts.

As the codebase is reviewed, the documentation in both repositories should be kept consistent with the actual implementation.

## 10. Developer

Developed individually as a software engineering project focused on Laravel application development, relational data modeling, coaching-management workflows, and SaaS-oriented architecture.
