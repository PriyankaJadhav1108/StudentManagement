<?php
// PHP Basic Output Formatting

// echo - outputs one or more strings
echo "Hello World<br>";
echo "Hello", " ", "World", "<br>";

// print - similar to echo, returns 1
$result = print("Hello with print<br>");
echo "Print returned: " . $result . "<br>";

// printf - formatted output
$name = "John";
$age = 25;
printf("Name: %s, Age: %d<br>", $name, $age);

// sprintf - returns formatted string
$formatted = sprintf("Name: %s, Age: %d", $name, $age);
echo $formatted . "<br>";

// var_dump - displays structured information about variables
$array = array("apple", "banana", "cherry");
var_dump($array);
echo "<br>";

// print_r - prints human-readable information about a variable
print_r($array);
echo "<br>";

// HTML formatting
echo "<h1>Formatted Output</h1>";
echo "<p style='color: blue;'>This is blue text</p>";
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Age</th></tr>";
echo "<tr><td>$name</td><td>$age</td></tr>";
echo "</table>";

// Number formatting
$price = 1234.567;
echo "<br>Price: $" . number_format($price, 2) . "<br>";
echo "Price (German): " . number_format($price, 2, ',', '.') . " €<br>";
?>