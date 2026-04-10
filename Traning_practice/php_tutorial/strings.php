<?php
// PHP Strings

// Single quotes
$name = 'John Doe';
echo "Single quotes: " . $name . "<br>";

// Double quotes (allows variable interpolation)
$greeting = "Hello, $name!";
echo "Double quotes: " . $greeting . "<br>";

// String functions
$text = "Hello World";

// Length
echo "Length: " . strlen($text) . "<br>";

// Uppercase
echo "Uppercase: " . strtoupper($text) . "<br>";

// Lowercase
echo "Lowercase: " . strtolower($text) . "<br>";

// Substring
echo "Substring: " . substr($text, 6, 5) . "<br>";

// Replace
echo "Replace: " . str_replace("World", "PHP", $text) . "<br>";

// Position
echo "Position of 'World': " . strpos($text, "World") . "<br>";

// Trim
$spaced = "  Hello  ";
echo "Trimmed: '" . trim($spaced) . "'<br>";
?>