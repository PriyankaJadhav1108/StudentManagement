# PHPUnit - PHP Testing Framework

## What is PHPUnit?

PHPUnit is the de facto standard testing framework for PHP applications. It provides a comprehensive set of tools for writing and running unit tests, ensuring code quality and preventing regressions.

## Key Features

### 1. **Assertions**
PHPUnit provides numerous assertion methods to verify expected outcomes:
- `assertEquals()` - Check if two values are equal
- `assertTrue()` / `assertFalse()` - Boolean assertions
- `assertNull()` / `assertNotNull()` - Null checks
- `assertInstanceOf()` - Type checking
- `assertContains()` / `assertNotContains()` - Array membership

### 2. **Test Organization**
- **Test Cases**: Individual test methods
- **Test Suites**: Collections of related test cases
- **Test Fixtures**: Setup and teardown methods

### 3. **Annotations**
- `@test` - Mark a method as a test
- `@dataProvider` - Provide multiple test data sets
- `@expectedException` - Expect exceptions
- `@covers` - Specify code coverage targets

### 4. **Mocking and Stubbing**
- Create mock objects to isolate units under test
- Stub external dependencies
- Verify method calls and interactions

## Installation

PHPUnit is installed via Composer:

```bash
composer require --dev phpunit/phpunit
```

## Basic Test Structure

```php
<?php
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testAddition()
    {
        // Arrange
        $a = 2;
        $b = 3;
        $expected = 5;

        // Act
        $result = $a + $b;

        // Assert
        $this->assertEquals($expected, $result);
    }
}
```

## Test Lifecycle

### 1. **setUp()** - Before Each Test
Called before every test method execution. Used to initialize test fixtures.

### 2. **tearDown()** - After Each Test
Called after every test method execution. Used to clean up resources.

### 3. **setUpBeforeClass()** - Once Before All Tests
Called once before all tests in the class.

### 4. **tearDownAfterClass()** - Once After All Tests
Called once after all tests in the class.

## Data Providers

Use data providers to run the same test with different data sets:

```php
public function additionProvider()
{
    return [
        [1, 2, 3],
        [0, 0, 0],
        [-1, 1, 0],
    ];
}

#[DataProvider('additionProvider')]
public function testAddition($a, $b, $expected)
{
    $this->assertEquals($expected, $a + $b);
}
```

## Exception Testing

Test that code throws expected exceptions:

```php
public function testException()
{
    $this->expectException(InvalidArgumentException::class);
    $this->expectExceptionMessage('Invalid argument');

    // Code that should throw exception
    throw new InvalidArgumentException('Invalid argument');
}
```

## Mocking

Create mock objects for dependencies:

```php
public function testWithMock()
{
    $mock = $this->createMock(SomeClass::class);
    $mock->expects($this->once())
         ->method('someMethod')
         ->willReturn('expected value');

    $service = new Service($mock);
    $result = $service->doSomething();

    $this->assertEquals('expected value', $result);
}
```

## Running Tests

### Command Line
```bash
# Run all tests
vendor/bin/phpunit

# Run specific test file
vendor/bin/phpunit tests/ExampleTest.php

# Run specific test method
vendor/bin/phpunit --filter testAddition

# Generate code coverage report
vendor/bin/phpunit --coverage-html coverage/
```

### Configuration File
Use `phpunit.xml` to configure test execution, coverage, and environment variables.