<?php
session_start();
include "db.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $course = $_POST['course'] ?? '';

    $stmt = mysqli_prepare($conn, "INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $course);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['flash'] = 'added';
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="topbar">
        <div class="topbar-inner">
            <h1 class="brand">Add Student</h1>
            <a href="dashboard.php" class="btn btn-ghost btn-sm">← Back</a>
        </div>
    </header>

    <main class="container container-narrow">
        <form method="POST" id="addStudentForm" class="card form-stack" novalidate>
            <label class="label">Name</label>
            <input type="text" name="name" class="input">

            <label class="label">Email</label>
            <input type="email" name="email" class="input">

            <label class="label">Course</label>
            <input type="text" name="course" class="input">

            <div class="form-actions">
                <button type="submit" name="submit" value="1" class="btn btn-primary">Add Student</button>
            </div>
        </form>
    </main>
    <script src="js/app.js" defer></script>
</body>
</html>
