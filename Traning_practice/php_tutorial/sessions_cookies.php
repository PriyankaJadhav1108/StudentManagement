<?php
// PHP State Management - Sessions and Cookies

session_start(); // Start session

echo "<h1>PHP State Management</h1>";

// Cookies
echo "<h2>Cookies</h2>";

// Set a cookie (expires in 1 hour)
setcookie("username", "John Doe", time() + 3600, "/");
setcookie("visit_count", 1, time() + 86400 * 30, "/"); // 30 days

// Check if cookie exists
if (isset($_COOKIE['username'])) {
    echo "Welcome back, " . $_COOKIE['username'] . "!<br>";
    // Increment visit count
    $visits = isset($_COOKIE['visit_count']) ? $_COOKIE['visit_count'] + 1 : 1;
    setcookie("visit_count", $visits, time() + 86400 * 30, "/");
    echo "Visit count: $visits<br>";
} else {
    echo "Welcome, new visitor!<br>";
}

// Sessions
echo "<h2>Sessions</h2>";

// Store data in session
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = rand(1000, 9999);
    $_SESSION['login_time'] = date("Y-m-d H:i:s");
    $_SESSION['page_views'] = 0;
}

$_SESSION['page_views']++;

echo "User ID: " . $_SESSION['user_id'] . "<br>";
echo "Login Time: " . $_SESSION['login_time'] . "<br>";
echo "Page Views: " . $_SESSION['page_views'] . "<br>";

// Session array example
$_SESSION['preferences'] = array(
    'theme' => 'dark',
    'language' => 'en',
    'notifications' => true
);

echo "Theme: " . $_SESSION['preferences']['theme'] . "<br>";
echo "Language: " . $_SESSION['preferences']['language'] . "<br>";

// Check session status
echo "<br>Session Status: ";
switch (session_status()) {
    case PHP_SESSION_DISABLED:
        echo "Disabled";
        break;
    case PHP_SESSION_NONE:
        echo "None";
        break;
    case PHP_SESSION_ACTIVE:
        echo "Active";
        break;
}

// Session ID
echo "<br>Session ID: " . session_id() . "<br>";

// Destroy session (uncomment to test)
// session_destroy();

echo "<h2>Session vs Cookies Comparison</h2>";
echo "<table border='1'>";
echo "<tr><th>Feature</th><th>Cookies</th><th>Sessions</th></tr>";
echo "<tr><td>Storage</td><td>Client-side</td><td>Server-side</td></tr>";
echo "<tr><td>Security</td><td>Less secure</td><td>More secure</td></tr>";
echo "<tr><td>Data size</td><td>Limited (~4KB)</td><td>Larger amounts</td></tr>";
echo "<tr><td>Lifetime</td><td>Set expiration</td><td>Until browser closes or destroyed</td></tr>";
echo "<tr><td>Scope</td><td>Domain-specific</td><td>Per user session</td></tr>";
echo "</table>";

// Practical example: Shopping cart
echo "<h2>Shopping Cart Example</h2>";
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add items to cart (simulate)
if (isset($_GET['add'])) {
    $item = $_GET['add'];
    if (!isset($_SESSION['cart'][$item])) {
        $_SESSION['cart'][$item] = 0;
    }
    $_SESSION['cart'][$item]++;
    echo "Added $item to cart<br>";
}

// Display cart
if (!empty($_SESSION['cart'])) {
    echo "<h3>Your Cart:</h3>";
    foreach ($_SESSION['cart'] as $item => $quantity) {
        echo "$item: $quantity<br>";
    }
} else {
    echo "Your cart is empty<br>";
}

echo "<br><a href='?add=Apple'>Add Apple</a> | ";
echo "<a href='?add=Banana'>Add Banana</a> | ";
echo "<a href='?add=Orange'>Add Orange</a>";
?>