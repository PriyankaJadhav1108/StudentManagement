<?php

// Test bootstrap file
require_once __DIR__ . '/../vendor/autoload.php';

// Set up test environment
$_ENV['MYSQL_HOST'] = 'localhost';
$_ENV['MYSQL_USER'] = 'root';
$_ENV['MYSQL_PASSWORD'] = '';
$_ENV['MYSQL_DATABASE'] = 'student_db_test';

// Create test database if it doesn't exist
$conn = mysqli_connect(
    $_ENV['MYSQL_HOST'],
    $_ENV['MYSQL_USER'],
    $_ENV['MYSQL_PASSWORD']
);

if ($conn) {
    mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS student_db_test");
    mysqli_close($conn);
}