<?php
// PHP Operators

// Arithmetic operators
$a = 10;
$b = 3;
echo "a = $a, b = $b<br>";
echo "Addition: " . ($a + $b) . "<br>";
echo "Subtraction: " . ($a - $b) . "<br>";
echo "Multiplication: " . ($a * $b) . "<br>";
echo "Division: " . ($a / $b) . "<br>";
echo "Modulus: " . ($a % $b) . "<br>";
echo "Exponentiation: " . ($a ** $b) . "<br>";

// Assignment operators
$x = 5;
echo "<br>x = $x<br>";
$x += 3; // x = x + 3
echo "x += 3: $x<br>";
$x -= 2; // x = x - 2
echo "x -= 2: $x<br>";
$x *= 4; // x = x * 4
echo "x *= 4: $x<br>";
$x /= 2; // x = x / 2
echo "x /= 2: $x<br>";
$x %= 3; // x = x % 3
echo "x %= 3: $x<br>";

// Comparison operators
$y = 5;
$z = "5";
echo "<br>y = $y, z = '$z'<br>";
echo "Equal: " . ($y == $z ? "true" : "false") . "<br>";
echo "Identical: " . ($y === $z ? "true" : "false") . "<br>";
echo "Not equal: " . ($y != $z ? "true" : "false") . "<br>";
echo "Not identical: " . ($y !== $z ? "true" : "false") . "<br>";
echo "Greater than: " . ($y > 3 ? "true" : "false") . "<br>";
echo "Less than: " . ($y < 10 ? "true" : "false") . "<br>";

// Logical operators
$p = true;
$q = false;
echo "<br>p = true, q = false<br>";
echo "AND: " . ($p && $q ? "true" : "false") . "<br>";
echo "OR: " . ($p || $q ? "true" : "false") . "<br>";
echo "NOT p: " . (!$p ? "true" : "false") . "<br>";

// Increment/Decrement operators
$count = 5;
echo "<br>count = $count<br>";
echo "Post-increment: " . $count++ . " (now: $count)<br>";
echo "Pre-increment: " . ++$count . "<br>";
echo "Post-decrement: " . $count-- . " (now: $count)<br>";
echo "Pre-decrement: " . --$count . "<br>";

// String operators
$first = "Hello";
$second = "World";
echo "<br>first = '$first', second = '$second'<br>";
echo "Concatenation: " . ($first . " " . $second) . "<br>";
$first .= " PHP"; // Concatenation assignment
echo "Concatenation assignment: '$first'<br>";
?>