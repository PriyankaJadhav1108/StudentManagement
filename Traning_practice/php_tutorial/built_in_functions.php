<?php
// PHP Built-in Functions

// String functions
$text = "Hello World";
echo "Original: " . $text . "<br>";
echo "Length: " . strlen($text) . "<br>";
echo "Uppercase: " . strtoupper($text) . "<br>";
echo "Lowercase: " . strtolower($text) . "<br>";
echo "Reverse: " . strrev($text) . "<br>";
echo "Substring: " . substr($text, 6) . "<br>";

// Math functions
$number = 25.7;
echo "<br>Number: " . $number . "<br>";
echo "Absolute: " . abs($number) . "<br>";
echo "Ceil: " . ceil($number) . "<br>";
echo "Floor: " . floor($number) . "<br>";
echo "Round: " . round($number) . "<br>";
echo "Square root: " . sqrt(16) . "<br>";
echo "Power: " . pow(2, 3) . "<br>";
echo "Random: " . rand(1, 100) . "<br>";

// Array functions
$array = array(3, 1, 4, 1, 5);
echo "<br>Array: " . implode(", ", $array) . "<br>";
sort($array);
echo "Sorted: " . implode(", ", $array) . "<br>";
echo "Count: " . count($array) . "<br>";
echo "Max: " . max($array) . "<br>";
echo "Min: " . min($array) . "<br>";

// Date and time functions
echo "<br>Current date: " . date("Y-m-d") . "<br>";
echo "Current time: " . date("H:i:s") . "<br>";
echo "Timestamp: " . time() . "<br>";

// File functions
$filename = "test.txt";
if (file_exists($filename)) {
    echo "<br>File exists<br>";
    echo "File size: " . filesize($filename) . " bytes<br>";
} else {
    echo "<br>File does not exist<br>";
}

// Type checking functions
$value = 42;
echo "<br>Value: " . $value . "<br>";
echo "Is integer: " . (is_int($value) ? "Yes" : "No") . "<br>";
echo "Is string: " . (is_string($value) ? "Yes" : "No") . "<br>";
echo "Is array: " . (is_array($value) ? "Yes" : "No") . "<br>";
?>