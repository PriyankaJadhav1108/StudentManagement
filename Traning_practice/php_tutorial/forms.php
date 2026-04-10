<!DOCTYPE html>
<html>
<head>
    <title>PHP Forms</title>
</head>
<body>
    <h1>PHP Forms and User Input Handling</h1>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate input
        $name = htmlspecialchars(trim($_POST['name']));
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $age = intval($_POST['age']);
        $message = htmlspecialchars(trim($_POST['message']));

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color: red;'>Invalid email format</p>";
        } else {
            echo "<h2>Form Submitted Successfully!</h2>";
            echo "<p>Name: $name</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Age: $age</p>";
            echo "<p>Message: $message</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" min="1" max="120"><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

    <h2>GET Parameters Example</h2>
    <?php
    if (isset($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        echo "<p>Searching for: $search</p>";
    }
    ?>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Search">
    </form>
</body>
</html>