<?php
/**
 * Local XAMPP: uses defaults (localhost, root, no password).
 * Docker: set MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE in docker-compose.yml
 */
$host = getenv('MYSQL_HOST') ?: 'localhost';
$user = getenv('MYSQL_USER') ?: 'root';
$pass = getenv('MYSQL_PASSWORD');
if ($pass === false) {
    $pass = '';
}
$dbname = getenv('MYSQL_DATABASE') ?: 'student_db';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed");
}
