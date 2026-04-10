<?php
// PHP String Concatenation

$firstName = "John";
$lastName = "Doe";

// Using dot operator
$fullName = $firstName . " " . $lastName;
echo "Full name: " . $fullName . "<br>";

// Concatenation assignment
$message = "Hello";
$message .= " World"; // Same as $message = $message . " World";
$message .= "!";
echo "Message: " . $message . "<br>";

// Multiple concatenations
$greeting = "Hello" . ", " . $firstName . " " . $lastName . "!";
echo "Greeting: " . $greeting . "<br>";

// With numbers
$age = 25;
$info = "Name: " . $fullName . ", Age: " . $age;
echo "Info: " . $info . "<br>";

// Heredoc syntax (alternative to concatenation)
$heredoc = <<<EOT
This is a heredoc string.
It can span multiple lines.
Name: $fullName
Age: $age
EOT;
echo "Heredoc:<br>" . nl2br($heredoc) . "<br>";
?>