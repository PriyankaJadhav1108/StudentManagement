<?php

namespace StudentManagement\Tests;

use PHPUnit\Framework\TestCase;
use StudentManagement\StudentManager;

class StudentManagerTest extends TestCase
{
    private $conn;
    private StudentManager $studentManager;

    protected function setUp(): void
    {
        // Connect to test database
        $this->conn = mysqli_connect(
            getenv('MYSQL_HOST') ?: 'localhost',
            getenv('MYSQL_USER') ?: 'root',
            getenv('MYSQL_PASSWORD') ?: '',
            getenv('MYSQL_DATABASE') ?: 'student_db_test'
        );

        if (!$this->conn) {
            $this->fail("Could not connect to test database");
        }

        // Create students table for testing
        $sql = "CREATE TABLE IF NOT EXISTS students (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            phone VARCHAR(20),
            course VARCHAR(100)
        )";
        mysqli_query($this->conn, $sql);

        // Clear table before each test
        mysqli_query($this->conn, "DELETE FROM students");

        $this->studentManager = new StudentManager($this->conn);
    }

    protected function tearDown(): void
    {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

    public function testAddStudentSuccess()
    {
        $studentData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '123-456-7890',
            'course' => 'Computer Science'
        ];

        $result = $this->studentManager->addStudent($studentData);

        $this->assertTrue($result);

        // Verify student was added
        $students = $this->studentManager->getAllStudents();
        $this->assertCount(1, $students);
        $this->assertEquals('John Doe', $students[0]['name']);
        $this->assertEquals('john@example.com', $students[0]['email']);
    }

    public function testAddStudentWithEmptyName()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Name and email are required");

        $studentData = [
            'name' => '',
            'email' => 'john@example.com',
            'phone' => '123-456-7890',
            'course' => 'Computer Science'
        ];

        $this->studentManager->addStudent($studentData);
    }

    public function testAddStudentWithInvalidEmail()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid email format");

        $studentData = [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'phone' => '123-456-7890',
            'course' => 'Computer Science'
        ];

        $this->studentManager->addStudent($studentData);
    }

    public function testGetStudentById()
    {
        // Add a student first
        $studentData = [
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '098-765-4321',
            'course' => 'Mathematics'
        ];
        $this->studentManager->addStudent($studentData);

        // Get all students to find the ID
        $students = $this->studentManager->getAllStudents();
        $studentId = $students[0]['id'];

        // Test getting student by ID
        $student = $this->studentManager->getStudentById($studentId);

        $this->assertNotNull($student);
        $this->assertEquals('Jane Smith', $student['name']);
        $this->assertEquals('jane@example.com', $student['email']);
    }

    public function testGetStudentByIdNotFound()
    {
        $student = $this->studentManager->getStudentById(999);

        $this->assertNull($student);
    }

    public function testUpdateStudent()
    {
        // Add initial student
        $initialData = [
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'phone' => '111-222-3333',
            'course' => 'Physics'
        ];
        $this->studentManager->addStudent($initialData);

        // Get student ID
        $students = $this->studentManager->getAllStudents();
        $studentId = $students[0]['id'];

        // Update student
        $updatedData = [
            'name' => 'Bob Johnson Updated',
            'email' => 'bob.updated@example.com',
            'phone' => '444-555-6666',
            'course' => 'Advanced Physics'
        ];

        $result = $this->studentManager->updateStudent($studentId, $updatedData);
        $this->assertTrue($result);

        // Verify update
        $student = $this->studentManager->getStudentById($studentId);
        $this->assertEquals('Bob Johnson Updated', $student['name']);
        $this->assertEquals('bob.updated@example.com', $student['email']);
    }

    public function testDeleteStudent()
    {
        // Add student
        $studentData = [
            'name' => 'Alice Brown',
            'email' => 'alice@example.com',
            'phone' => '777-888-9999',
            'course' => 'Chemistry'
        ];
        $this->studentManager->addStudent($studentData);

        // Get student ID
        $students = $this->studentManager->getAllStudents();
        $studentId = $students[0]['id'];

        // Delete student
        $result = $this->studentManager->deleteStudent($studentId);
        $this->assertTrue($result);

        // Verify deletion
        $student = $this->studentManager->getStudentById($studentId);
        $this->assertNull($student);

        $allStudents = $this->studentManager->getAllStudents();
        $this->assertCount(0, $allStudents);
    }

    public function testGetAllStudents()
    {
        // Add multiple students
        $studentsData = [
            [
                'name' => 'Charlie Wilson',
                'email' => 'charlie@example.com',
                'phone' => '111-111-1111',
                'course' => 'Biology'
            ],
            [
                'name' => 'Diana Prince',
                'email' => 'diana@example.com',
                'phone' => '222-222-2222',
                'course' => 'History'
            ]
        ];

        foreach ($studentsData as $studentData) {
            $this->studentManager->addStudent($studentData);
        }

        $students = $this->studentManager->getAllStudents();

        $this->assertCount(2, $students);
        // Should be ordered by name
        $this->assertEquals('Charlie Wilson', $students[0]['name']);
        $this->assertEquals('Diana Prince', $students[1]['name']);
    }
}