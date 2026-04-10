<?php

namespace StudentManagement;

class StudentManager
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addStudent($data)
    {
        if (empty($data['name']) || empty($data['email'])) {
            throw new \InvalidArgumentException("Name and email are required");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email format");
        }

        $stmt = mysqli_prepare($this->conn, "INSERT INTO students (name, email, phone, course) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $data['name'], $data['email'], $data['phone'], $data['course']);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }

    public function getStudentById($id)
    {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM students WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $student = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        return $student;
    }

    public function updateStudent($id, $data)
    {
        if (empty($data['name']) || empty($data['email'])) {
            throw new \InvalidArgumentException("Name and email are required");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email format");
        }

        $stmt = mysqli_prepare($this->conn, "UPDATE students SET name=?, email=?, phone=?, course=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "ssssi", $data['name'], $data['email'], $data['phone'], $data['course'], $id);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }

    public function deleteStudent($id)
    {
        $stmt = mysqli_prepare($this->conn, "DELETE FROM students WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }

    public function getAllStudents()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM students ORDER BY name");
        $students = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }

        return $students;
    }
}