# PHP Tutorial

This is a comprehensive PHP tutorial covering basic to advanced concepts.

## Topics Covered

1. **PHP Syntax** - Basic PHP structure and embedding in HTML
2. **Data Types** - String, Integer, Float, Boolean, Array, Object, Null
3. **PHP Variables** - Variable naming, scope, and usage
4. **PHP Strings** - String manipulation and functions
5. **Concatenation** - String concatenation techniques
6. **Constants** - Defining and using constants
7. **PHP Comments** - Single-line and multi-line comments
8. **PHP Built-in Functions** - Common PHP functions for strings, math, arrays, etc.
9. **Basic Output Formatting** - echo, print, printf, var_dump
10. **PHP Operators** - Arithmetic, assignment, comparison, logical, increment/decrement
11. **Control Structures** - if/else, switch, loops (while, do-while, for, foreach)
12. **Arrays and Functions** - Indexed arrays, associative arrays, multidimensional arrays, user-defined functions
13. **PHP Forms and User Input** - Handling GET/POST data, form validation
14. **Working with Files and Dates** - File operations, directory handling, date/time functions
15. **State Management** - Sessions and Cookies
16. **Advanced PHP Concepts - API** - REST API development
17. **Namespace** - Organizing code with namespaces
18. **Magic Methods** - PHP's special methods (__construct, __destruct, __get, __set, etc.)
19. **Regular Expressions** - Pattern matching and text processing
20. **Composer** - PHP dependency management

## Setup Instructions

1. **Install PHP** (version 7.4 or higher)
   - Download from: https://www.php.net/downloads
   - Or use a package manager like Chocolatey: `choco install php`

2. **Install Composer** (PHP dependency manager)
   - Download from: https://getcomposer.org/download/
   - Or use Chocolatey: `choco install composer`
   - Verify installation: `composer --version`

3. **Install Dependencies**
   ```bash
   cd php_tutorial
   composer install
   ```

4. **Start Development Server**
   ```bash
   composer run-script start-server
   ```
   Or manually:
   ```bash
   php -S localhost:8000
   ```

5. Open `http://localhost:8000` in your browser

## File Structure

```
php_tutorial/
├── composer.json          # Composer configuration
├── README.md             # This file
├── syntax.php            # PHP syntax basics
├── data_types.php        # Data types demonstration
├── variables.php         # Variable usage
├── strings.php           # String manipulation
├── concatenation.php     # String concatenation
├── constants.php         # Constants usage
├── comments.php          # Comments examples
├── built_in_functions.php # PHP built-in functions
├── output_formatting.php  # Output formatting
├── operators.php         # Operators demonstration
├── control_structures.php # Control structures
├── arrays_functions.php   # Arrays and functions
├── forms.php             # Form handling
├── files_dates.php       # File and date operations
├── sessions_cookies.php  # State management
├── api.php               # REST API example
├── namespace.php         # Namespaces
├── magic_methods.php     # Magic methods
└── regular_expressions.php # Regular expressions
```

## Running Individual Examples

Each PHP file can be run independently. For files that output HTML, access them through a web server. For pure PHP files, you can run them from command line:

```bash
php filename.php
```

## Dependencies

This project uses Composer for dependency management. The main dependencies include:

- **Monolog** - Logging library
- **Guzzle** - HTTP client
- **Symfony HTTP Foundation** - HTTP abstractions

## Testing

Run tests with:
```bash
composer test
```

## Code Analysis

Run static analysis with:
```bash
composer analyze
```

## Learning Path

Start with the basic files (syntax.php through operators.php), then move to control structures and arrays/functions. After that, explore forms, file handling, and state management. Finally, dive into the advanced topics like APIs, namespaces, magic methods, and regular expressions.

## Additional Resources

- [PHP Official Documentation](https://www.php.net/docs.php)
- [Composer Documentation](https://getcomposer.org/doc/)
- [PHP The Right Way](https://phptherightway.com/)

Happy learning!