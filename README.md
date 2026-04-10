# Student Management System

PHP + MySQL web app with session login, CRUD for students, and client-side JavaScript (search, validation, flash messages).

## Setup

1. Create database `student_db` and table `students` (see SQL in your coursework).
2. Place the project under your web server (e.g. XAMPP `htdocs`).
3. Adjust `db.php` if your MySQL user/password differ.
4. Open `login.php` — default demo login: `admin` / `1234`.

## Stack

- PHP (sessions, mysqli prepared statements)
- MySQL
- HTML/CSS + JavaScript (`js/app.js`)

## Unit Testing

This project includes comprehensive unit testing setup with PHPUnit.

### Prerequisites

- PHP 8.0 or higher
- Composer (PHP dependency manager)

### Installation

1. **Install Composer** (if not already installed):
   ```bash
   # Download Composer installer
   curl -sS https://getcomposer.org/installer | php

   # Move to global path (may require sudo)
   mv composer.phar /usr/local/bin/composer
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

### Running Tests

#### Local Development
```bash
# Run all tests
vendor/bin/phpunit

# Run specific test file
vendor/bin/phpunit tests/CalculatorTest.php

# Run with code coverage
vendor/bin/phpunit --coverage-html coverage/

# Run specific test method
vendor/bin/phpunit --filter testAddition
```

#### Docker Environment
If running in Docker, execute tests inside the PHP container:

```bash
# Access the PHP container
docker compose exec web bash

# Install dependencies (if not already done)
composer install

# Run tests
vendor/bin/phpunit

# Run with coverage
vendor/bin/phpunit --coverage-html coverage/
```

### Test Structure

- `tests/` - Test files directory
- `src/` - Source code for testable classes
- `phpunit.xml` - PHPUnit configuration
- `composer.json` - PHP dependencies

### Available Tests

1. **CalculatorTest** - Basic arithmetic operations
2. **StudentManagerTest** - Database CRUD operations

### Documentation

See the following files for detailed information:
- `UNIT_TESTING_INTRODUCTION.md` - Introduction to unit testing
- `WHAT_IS_UNIT_TESTING.md` - Detailed explanation of unit testing concepts
- `PHPUNIT_FRAMEWORK.md` - PHPUnit framework guide
- `PHPUNIT_CONFIGURATION.md` - Configuration details
- `HANDS_ON_LABS_EXERCISES.md` - Practical exercises and labs

## Docker (PHP + MySQL)

From the `student-management` folder:

```bash
docker compose up --build
```

- App: **http://localhost:8080/login.php** (or `http://localhost:8080/` if you add `DirectoryIndex`)
- MySQL uses host **`db`** inside Compose; `db.php` reads `MYSQL_*` env vars when set.
- First run: `docker/mysql/init.sql` creates the `students` table. If you change init SQL, reset the DB volume:

  ```bash
  docker compose down -v
  docker compose up --build
  ```

**Manual SQL** (if you prefer not to use init):

```bash
docker compose exec db mysql -u root -proot student_db -e "SHOW TABLES;"
```

Login: `admin` / `1234`.

## Local XAMPP (no Docker)

Leave env vars unset — `db.php` defaults to `localhost`, user `root`, empty password (typical XAMPP).
