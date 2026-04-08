# Hands-on Labs / Exercises - Unit Testing

## Lab 1: Setting Up PHPUnit

### Objective
Install PHPUnit and create the basic testing infrastructure.

### Steps

1. **Install Composer** (if not already installed)
   ```bash
   # Download and install Composer
   curl -sS https://getcomposer.org/installer | php
   mv composer.phar /usr/local/bin/composer
   ```

2. **Initialize Composer in your project**
   ```bash
   composer init
   ```

3. **Install PHPUnit**
   ```bash
   composer require --dev phpunit/phpunit
   ```

4. **Create phpunit.xml configuration**
   ```xml
   <?xml version="1.0" encoding="UTF-8"?>
   <phpunit bootstrap="vendor/autoload.php" colors="true">
       <testsuites>
           <testsuite name="Student Management Tests">
               <directory>tests</directory>
           </testsuite>
       </testsuites>
   </phpunit>
   ```

5. **Create tests directory**
   ```bash
   mkdir tests
   ```

6. **Run PHPUnit to verify setup**
   ```bash
   vendor/bin/phpunit
   ```

## Lab 2: Writing Your First Unit Test

### Objective
Create a simple unit test to understand the testing structure.

### Exercise

Create `tests/CalculatorTest.php`:

```php
<?php
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAddition()
    {
        // Arrange
        $calculator = new Calculator();
        $a = 5;
        $b = 3;
        $expected = 8;

        // Act
        $result = $calculator->add($a, $b);

        // Assert
        $this->assertEquals($expected, $result);
    }
}
```

Create `src/Calculator.php`:

```php
<?php
class Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }
}
```

Run the test:
```bash
vendor/bin/phpunit tests/CalculatorTest.php
```

## Lab 3: Testing Database Operations

### Objective
Test database connection and basic CRUD operations.

### Exercise

1. **Create DatabaseTest.php**
```php
<?php
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    protected $conn;

    protected function setUp(): void
    {
        // Use test database
        $this->conn = mysqli_connect('localhost', 'root', '', 'student_db_test');

        // Create test table
        $sql = "CREATE TABLE IF NOT EXISTS test_students (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL
        )";
        mysqli_query($this->conn, $sql);
    }

    protected function tearDown(): void
    {
        // Clean up test data
        mysqli_query($this->conn, "DROP TABLE IF EXISTS test_students");
        mysqli_close($this->conn);
    }

    public function testDatabaseConnection()
    {
        $this->assertNotNull($this->conn);
        $this->assertTrue(mysqli_ping($this->conn));
    }

    public function testInsertStudent()
    {
        $name = "John Doe";
        $email = "john@example.com";

        $stmt = mysqli_prepare($this->conn, "INSERT INTO test_students (name, email) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $name, $email);
        $result = mysqli_stmt_execute($stmt);

        $this->assertTrue($result);

        // Verify insertion
        $result = mysqli_query($this->conn, "SELECT COUNT(*) as count FROM test_students");
        $row = mysqli_fetch_assoc($result);
        $this->assertEquals(1, $row['count']);

        mysqli_stmt_close($stmt);
    }
}
```

2. **Create test database**
```sql
CREATE DATABASE student_db_test;
```

3. **Run the database tests**
```bash
vendor/bin/phpunit tests/DatabaseTest.php
```

## Lab 4: Testing User Authentication

### Objective
Test login functionality with various scenarios.

### Exercise

1. **Create AuthenticationTest.php**
```php
<?php
use PHPUnit\Framework\TestCase;

class AuthenticationTest extends TestCase
{
    public function testValidLogin()
    {
        // Mock session
        $_SESSION = [];

        // Simulate valid login
        $username = 'admin';
        $password = '1234';

        // In a real scenario, you'd call your login function
        // For this exercise, simulate the logic
        $isValid = $this->validateCredentials($username, $password);

        $this->assertTrue($isValid);
        $this->assertEquals($username, $_SESSION['username'] ?? null);
    }

    public function testInvalidLogin()
    {
        $_SESSION = [];

        $username = 'admin';
        $password = 'wrongpassword';

        $isValid = $this->validateCredentials($username, $password);

        $this->assertFalse($isValid);
        $this->assertArrayNotHasKey('username', $_SESSION);
    }

    public function testEmptyCredentials()
    {
        $_SESSION = [];

        $username = '';
        $password = '';

        $isValid = $this->validateCredentials($username, $password);

        $this->assertFalse($isValid);
    }

    private function validateCredentials($username, $password)
    {
        // Simulate your login validation logic
        if ($username === 'admin' && $password === '1234') {
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }
}
```

2. **Run authentication tests**
```bash
vendor/bin/phpunit tests/AuthenticationTest.php
```

## Lab 5: Testing Student CRUD Operations

### Objective
Test all CRUD operations for student management.

### Exercise

1. **Create StudentManagerTest.php**
```php
<?php
use PHPUnit\Framework\TestCase;

class StudentManagerTest extends TestCase
{
    protected $conn;

    protected function setUp(): void
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'student_db_test');

        // Create test students table
        $sql = "CREATE TABLE IF NOT EXISTS students (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            phone VARCHAR(20),
            course VARCHAR(100)
        )";
        mysqli_query($this->conn, $sql);
    }

    protected function tearDown(): void
    {
        mysqli_query($this->conn, "DROP TABLE IF EXISTS students");
        mysqli_close($this->conn);
    }

    public function testAddStudent()
    {
        $studentData = [
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '123-456-7890',
            'course' => 'Computer Science'
        ];

        $result = $this->addStudent($studentData);

        $this->assertTrue($result);

        // Verify student was added
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM students WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "s", $studentData['email']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $student = mysqli_fetch_assoc($result);

        $this->assertNotNull($student);
        $this->assertEquals($studentData['name'], $student['name']);
        $this->assertEquals($studentData['email'], $student['email']);

        mysqli_stmt_close($stmt);
    }

    public function testGetStudentById()
    {
        // First add a student
        $studentData = [
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'phone' => '098-765-4321',
            'course' => 'Mathematics'
        ];
        $this->addStudent($studentData);

        // Get the student ID
        $result = mysqli_query($this->conn, "SELECT id FROM students WHERE email = 'bob@example.com'");
        $row = mysqli_fetch_assoc($result);
        $studentId = $row['id'];

        // Test getting student by ID
        $student = $this->getStudentById($studentId);

        $this->assertNotNull($student);
        $this->assertEquals($studentData['name'], $student['name']);
        $this->assertEquals($studentData['email'], $student['email']);
    }

    public function testUpdateStudent()
    {
        // Add initial student
        $initialData = [
            'name' => 'Alice Brown',
            'email' => 'alice@example.com',
            'phone' => '111-222-3333',
            'course' => 'Physics'
        ];
        $this->addStudent($initialData);

        // Get student ID
        $result = mysqli_query($this->conn, "SELECT id FROM students WHERE email = 'alice@example.com'");
        $row = mysqli_fetch_assoc($result);
        $studentId = $row['id'];

        // Update student
        $updatedData = [
            'name' => 'Alice Brown Updated',
            'email' => 'alice.updated@example.com',
            'phone' => '444-555-6666',
            'course' => 'Advanced Physics'
        ];

        $result = $this->updateStudent($studentId, $updatedData);
        $this->assertTrue($result);

        // Verify update
        $student = $this->getStudentById($studentId);
        $this->assertEquals($updatedData['name'], $student['name']);
        $this->assertEquals($updatedData['email'], $student['email']);
    }

    public function testDeleteStudent()
    {
        // Add student
        $studentData = [
            'name' => 'Charlie Wilson',
            'email' => 'charlie@example.com',
            'phone' => '777-888-9999',
            'course' => 'Chemistry'
        ];
        $this->addStudent($studentData);

        // Get student ID
        $result = mysqli_query($this->conn, "SELECT id FROM students WHERE email = 'charlie@example.com'");
        $row = mysqli_fetch_assoc($result);
        $studentId = $row['id'];

        // Delete student
        $result = $this->deleteStudent($studentId);
        $this->assertTrue($result);

        // Verify deletion
        $student = $this->getStudentById($studentId);
        $this->assertNull($student);
    }

    // Helper methods (simulating your actual functions)
    private function addStudent($data)
    {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO students (name, email, phone, course) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $data['name'], $data['email'], $data['phone'], $data['course']);
        return mysqli_stmt_execute($stmt);
    }

    private function getStudentById($id)
    {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM students WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    private function updateStudent($id, $data)
    {
        $stmt = mysqli_prepare($this->conn, "UPDATE students SET name=?, email=?, phone=?, course=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "ssssi", $data['name'], $data['email'], $data['phone'], $data['course'], $id);
        return mysqli_stmt_execute($stmt);
    }

    private function deleteStudent($id)
    {
        $stmt = mysqli_prepare($this->conn, "DELETE FROM students WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}
```

2. **Run CRUD tests**
```bash
vendor/bin/phpunit tests/StudentManagerTest.php
```

## Lab 6: Code Coverage and Test Reports

### Objective
Generate code coverage reports and analyze test effectiveness.

### Exercise

1. **Update phpunit.xml for coverage**
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

2. **Run tests with coverage**
```bash
vendor/bin/phpunit --coverage-html coverage/html
```

3. **Analyze coverage report**
   - Open `coverage/html/index.html` in browser
   - Review which lines are covered/not covered
   - Identify areas needing more tests

4. **Improve coverage by adding more tests**
   - Test edge cases
   - Test error conditions
   - Test boundary values

## Additional Exercises

### Exercise 1: Data Provider Tests
Create tests using PHPUnit data providers for multiple input scenarios.

### Exercise 2: Mock External Dependencies
Use PHPUnit mocks to test functions that depend on external services.

### Exercise 3: Test Exception Handling
Write tests that verify proper exception handling in error conditions.

### Exercise 4: Integration Tests
Create integration tests that test multiple components working together.

### Exercise 5: Performance Testing
Use PHPUnit to measure execution time and memory usage of functions.