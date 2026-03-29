<?php
session_start();
include "db.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$flashMessages = [
    'added' => 'Student added successfully!',
    'deleted' => 'Student deleted successfully!',
    'updated' => 'Student updated successfully!',
];
$flashKey = '';
if (!empty($_SESSION['flash'])) {
    $flashKey = (string) $_SESSION['flash'];
    unset($_SESSION['flash']);
}
$flashMessage = $flashMessages[$flashKey] ?? '';
if ($flashMessage === '' && isset($_GET['ok'])) {
    $flashMessage = $flashMessages[(string) $_GET['ok']] ?? '';
}

$totalStudents = 0;
$countResult = mysqli_query($conn, "SELECT COUNT(*) AS c FROM students");
if ($countResult) {
    $totalStudents = (int) mysqli_fetch_assoc($countResult)['c'];
}

$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
if (!$result) {
    die("Query failed.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Student Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body<?php echo $flashMessage !== '' ? ' data-flash-message="' . htmlspecialchars($flashMessage, ENT_QUOTES, 'UTF-8') . '"' : ''; ?>>
    <header class="topbar">
        <div class="topbar-inner">
            <h1 class="brand">Student Dashboard</h1>
            <nav class="nav-actions">
                <a href="add_student.php" class="btn btn-primary btn-sm">Add Student</a>
                <a href="logout.php" class="btn btn-ghost btn-sm">Logout</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="toolbar">
            <label class="search-wrap">
                <span class="search-icon" aria-hidden="true">⌕</span>
                <input type="search" id="searchInput" class="input search-input" placeholder="Search by name, email, or course…" autocomplete="off">
            </label>
            <p class="student-count" id="studentCount">
                Showing <strong id="visibleCount">0</strong> of <strong id="totalCount"><?php echo $totalStudents; ?></strong> students
            </p>
        </div>

        <div class="table-wrap">
            <table class="data-table" id="studentTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo (int) $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['course']); ?></td>
                        <td class="cell-muted"><?php
                            echo isset($row['created_at']) && $row['created_at'] !== ''
                                ? htmlspecialchars(substr($row['created_at'], 0, 16))
                                : '—';
                        ?></td>
                        <td class="cell-actions">
                            <a class="link-edit" href="edit_student.php?id=<?php echo (int) $row['id']; ?>">Edit</a>
                            <a class="link-delete" href="delete_student.php?id=<?php echo (int) $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="js/app.js" defer></script>
</body>
</html>
