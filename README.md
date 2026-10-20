# Personal Budget Management System

## Overview

The Personal Budget Management System is a web application built with Laravel to help users organize their finances by tracking income, expenses, and monthly budgets.

The project focuses on making it easier to understand where money comes from, how it is spent, and whether spending stays within planned limits.

I built this project to strengthen my understanding of Laravel, database relationships, CRUD operations, and application business logic.

## Features

- **Dashboard:** View financial summaries and spending insights.
- **Transaction Management:** Add, view, edit, and delete financial transactions.
- **Category Management:** Organize transactions into income and expense categories.
- **Budget Management:** Set monthly spending limits for expense categories.
- **Monthly Filtering:** Filter financial summaries and transactions by month.
- **Spending Visualization:** View spending trends over time and the breakdown of expenses by category.
- **Recent Transactions:** Quickly review the latest recorded transactions.

## Technologies Used

- PHP
- Laravel
- MySQL
- Blade Templates
- Bootstrap
- JavaScript

## Key Concepts Practiced

- Model–View–Controller (MVC) architecture
- CRUD operations
- Database migrations and relationships
- Form validation
- Eloquent ORM
- Business logic for financial summaries and budget tracking
- Data visualization

## Getting Started

### Prerequisites

Make sure you have the following installed:

- PHP
- Composer
- MySQL
- Node.js and npm, if required by your frontend setup

### Installation

1. Clone the repository:

   ```bash
   git clone <your-repository-url>
   ```

2. Navigate into the project directory:

   ```bash
   cd <your-project-folder>
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Create your environment file:

   ```bash
   cp .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure your database credentials in the `.env` file.

7. Run database migrations:

   ```bash
   php artisan migrate
   ```

8. Start the development server:

   ```bash
   php artisan serve
   ```

Open the local URL shown in your terminal to access the application.

## Project Status

This project is a learning and development project. Additional features and improvements may be introduced as development continues.

## What I Learned

Building this application helped me understand how database records, application logic, and the user interface work together. It also gave me practical experience implementing financial calculations and organizing data through Laravel.

## Author

**Priscilla Azure**

GitHub: [Azure-priscy](https://github.com/Azure-priscy)
