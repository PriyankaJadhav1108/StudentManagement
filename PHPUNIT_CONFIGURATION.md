# PHPUnit Configuration

## Configuration File (phpunit.xml)

PHPUnit uses XML configuration files to define test suites, coverage settings, and environment variables. The main configuration file is typically named `phpunit.xml` or `phpunit.xml.dist`.

## Basic Structure

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/10.0/phpunit.xsd"
         bootstrap="vendor/autoload.php"
         colors="true">
    <!-- Configuration content -->
</phpunit>
```

## Key Configuration Elements

### 1. **Testsuites**
Define which directories contain test files:

```xml
<testsuites>
    <testsuite name="Student Management Tests">
        <directory>tests</directory>
        <directory suffix="Test.php">./tests</directory>
    </testsuite>
</testsuites>
```

### 2. **Source Directories**
Specify which directories contain source code for coverage:

```xml
<source>
    <include>
        <directory suffix=".php">src</directory>
    </include>
</source>
```

### 3. **Code Coverage**
Configure code coverage reporting:

```xml
<coverage>
    <include>
        <directory suffix=".php">src</directory>
    </include>
    <report>
        <html outputDirectory="coverage/html"/>
        <text outputFile="coverage/coverage.txt"/>
    </report>
</coverage>
```

### 4. **PHP Configuration**
Set PHP configuration and environment variables:

```xml
<php>
    <ini name="error_reporting" value="E_ALL"/>
    <env name="MYSQL_HOST" value="localhost"/>
    <env name="MYSQL_USER" value="root"/>
    <env name="MYSQL_PASSWORD" value=""/>
    <env name="MYSQL_DATABASE" value="student_db_test"/>
</php>
```

### 5. **Logging**
Configure test result logging:

```xml
<logging>
    <junit outputFile="logs/junit.xml"/>
    <testdox outputFile="logs/testdox.html"/>
</logging>
```

## Complete Example Configuration

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/10.0/phpunit.xsd"
         bootstrap="vendor/autoload.php"
         colors="true"
         verbose="true">
    <testsuites>
        <testsuite name="Student Management Tests">
            <directory>tests</directory>
        </testsuite>
    </testsuites>

    <coverage>
        <include>
            <directory suffix=".php">src</directory>
        </include>
        <report>
            <html outputDirectory="coverage/html"/>
            <text outputFile="coverage/coverage.txt"/>
        </report>
    </coverage>

    <php>
        <env name="MYSQL_HOST" value="localhost"/>
        <env name="MYSQL_USER" value="root"/>
        <env name="MYSQL_PASSWORD" value=""/>
        <env name="MYSQL_DATABASE" value="student_db_test"/>
    </php>

    <logging>
        <junit outputFile="logs/junit.xml"/>
    </logging>
</phpunit>
```

## Configuration Options

### Command Line Options
- `--bootstrap`: Specify bootstrap file
- `--colors`: Enable/disable colored output
- `--verbose`: Enable verbose output
- `--coverage-html`: Generate HTML coverage report
- `--filter`: Run specific tests matching pattern

### Environment Variables
Use `<env>` tags to set environment variables for tests:

```xml
<php>
    <env name="APP_ENV" value="testing"/>
    <env name="DB_CONNECTION" value="sqlite"/>
</php>
```

### Test Groups
Organize tests into groups for selective execution:

```xml
<groups>
    <include>
        <group>fast</group>
        <group>database</group>
    </include>
</groups>
```

## Bootstrap File

The bootstrap file (`bootstrap="vendor/autoload.php"`) is loaded before running tests. It typically:
- Includes Composer's autoloader
- Sets up global test configuration
- Defines test-specific constants

## Directory Structure

Recommended project structure with PHPUnit:

```
project/
├── src/                    # Source code
├── tests/                  # Test files
│   ├── Unit/              # Unit tests
│   ├── Integration/       # Integration tests
│   └── bootstrap.php      # Test bootstrap
├── vendor/                # Composer dependencies
├── phpunit.xml           # PHPUnit configuration
└── composer.json         # Composer configuration
```

## Running Tests with Configuration

```bash
# Run all tests using phpunit.xml
vendor/bin/phpunit

# Run with specific configuration file
vendor/bin/phpunit -c phpunit.xml.dist

# Run tests with coverage
vendor/bin/phpunit --coverage-html coverage/
```

## Best Practices

1. **Separate Test Database**: Use a dedicated test database
2. **Environment Variables**: Configure test-specific settings
3. **Code Coverage**: Enable coverage for critical code paths
4. **CI/CD Integration**: Configure for automated testing
5. **Logging**: Enable logging for test reports and analysis