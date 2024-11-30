# Task Manager Laravel Project

## Project Overview
A simple Task Management API built with Laravel, allowing CRUD operations for tasks.

## Prerequisites
- PHP 8.1+
- Composer
- MySQL
- Git

## Installation Steps

### 1. Clone the Repository
```bash
git clone https://github.com/vinay-s36/task-manager.git
cd task-manager
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Configuration
1. Copy `.env.example` to `.env`
```bash
cp .env.example .env
```

2. Generate Application Key
```bash
php artisan key:generate
```

### 4. Database Setup
1. Create a MySQL database
```bash
mysql -u root -p
CREATE DATABASE task_management;
exit;
```

2. Configure Database in `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Database Migrations
```bash
php artisan migrate
```

### 6. Optional: Seed Database (If needed)
```bash
php artisan db:seed
```

## Running the Application

### Development Server
```bash
php artisan serve
```
The application will be available at `http://localhost:8000`

## API Endpoints

### Tasks
- `GET /api/tasks` - List all tasks
- `POST /api/tasks` - Create a new task
- `GET /api/tasks/{id}` - Get a specific task
- `PUT /api/tasks/{id}` - Update a task
- `DELETE /api/tasks/{id}` - Delete a task

## Sample Task Payload
```json
{
    "title": "Complete Project",
    "description": "Finish the Laravel API project",
    "status": "pending",
    "priority": "high",
    "due_date": "2024-12-31"
}
```

## Troubleshooting
- Ensure all dependencies are installed
- Check database connection
- Verify `.env` file configurations
- Run `php artisan config:clear` if encountering config issues

## Project Structure
- `app/Models/Task.php` - Task Model
- `app/Http/Controllers/TaskController.php` - Task Controller
- `database/migrations/` - Database Migrations
- `routes/web.php` - Route Definitions

## Common Commands
- Clear Cache: `php artisan config:clear`
- Generate Key: `php artisan key:generate`
- Migrate Database: `php artisan migrate`
- Rollback Migration: `php artisan migrate:rollback`
