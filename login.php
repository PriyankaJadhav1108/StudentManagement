<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === "admin" && $password === "1234") {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit;
    }

    $error = "Invalid login";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Student Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page-login">
    <main class="card card-narrow">
        <h1 class="title">Student Management</h1>
        <p class="subtitle">Sign in to continue</p>
        <?php if (!empty($error)) { ?>
            <p class="msg-error"><?php echo htmlspecialchars($error); ?></p>
        <?php } ?>
        <form method="POST" id="loginForm" class="form-stack" novalidate>
            <label class="label">Username</label>
            <input type="text" name="username" class="input" autocomplete="username">

            <label class="label">Password</label>
            <input type="password" name="password" class="input" autocomplete="current-password">

            <button type="submit" name="login" value="1" class="btn btn-primary">Login</button>
        </form>
    </main>
    <script src="js/app.js" defer></script>
</body>
</html>
