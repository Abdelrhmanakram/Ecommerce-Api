# Ecommerce-Task

This project is a simple ecommerce api application built with Laravel. Follow the instructions below to set up the project locally.

## Setup Instructions

### 1. Clone the Repository

Clone the repository using the following command:

```bash
git clone https://github.com/Abdelrhmanakram/Ecommerce-Api.git
```

### 2. Setup your Environment

Copy the Environment File
Copy the .env.example file to create a new .env file:

Install Composer Dependencies:
```bash
composer install
```

Generate the Application Key
Generate a new application key:
```bash
php artisan key:generate
```

Set Up the Database
Create a new database for the application. Update the .env file with the name of your database in the DB_DATABASE variable:
DB_DATABASE=your_database_name

Run Migrations

Run the migrations to set up the database schema:
```bash
php artisan migrate
```

Start the Development Server
Start the Laravel development server:
```bash
php artisan serve
```

Register and Test
    Register an account on the application.

    Enjoy!

You’re all set up. Have fun exploring and developing the Ecommerce application!
