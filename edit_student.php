<?php
session_start();
include "db.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id < 1) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['update'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $course = $_POST['course'] ?? '';

    $stmt = mysqli_prepare($conn, "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $course, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['flash'] = 'updated';
    header("Location: dashboard.php");
    exit;
}

$stmt = mysqli_prepare($conn, "SELECT id, name, email, course FROM students WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="topbar">
        <div class="topbar-inner">
            <h1 class="brand">Edit Student</h1>
            <a href="dashboard.php" class="btn btn-ghost btn-sm">← Back</a>
        </div>
    </header>

    <main class="container container-narrow">
        <form method="POST" id="editStudentForm" class="card form-stack" novalidate>
            <label class="label">Name</label>
            <input type="text" name="name" class="input" value="<?php echo htmlspecialchars($row['name']); ?>">

            <label class="label">Email</label>
            <input type="email" name="email" class="input" value="<?php echo htmlspecialchars($row['email']); ?>">

            <label class="label">Course</label>
            <input type="text" name="course" class="input" value="<?php echo htmlspecialchars($row['course']); ?>">

            <div class="form-actions">
                <button type="submit" name="update" value="1" class="btn btn-primary">Update</button>
            </div>
        </form>
    </main>
    <script src="js/app.js" defer></script>
</body>
</html>
