<?php
// PHP Variables

// Variable naming rules:
// Start with $ followed by letter or underscore
// Can contain letters, numbers, underscores
// Case sensitive

$name = "John"; // String variable
$age = 30; // Integer variable
$price = 99.99; // Float variable
$isActive = true; // Boolean variable

echo "Name: " . $name . "<br>";
echo "Age: " . $age . "<br>";
echo "Price: $" . $price . "<br>";
echo "Active: " . ($isActive ? 'Yes' : 'No') . "<br>";

// Variable scope
function testScope() {
    $localVar = "I'm local";
    echo $localVar . "<br>";
}
testScope();

// Global variable
global $globalVar;
$globalVar = "I'm global";
echo $globalVar . "<br>";
?>