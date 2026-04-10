<?php
// PHP Arrays and Functions

// Indexed arrays
$fruits = array("Apple", "Banana", "Orange");
echo "Fruits: " . implode(", ", $fruits) . "<br>";

// Associative arrays
$person = array(
    "name" => "John Doe",
    "age" => 25,
    "city" => "New York"
);
echo "Name: " . $person["name"] . "<br>";
echo "Age: " . $person["age"] . "<br>";

// Multidimensional arrays
$students = array(
    array("John", 85, "A"),
    array("Jane", 92, "A+"),
    array("Bob", 78, "B")
);
echo "<br>Students:<br>";
foreach ($students as $student) {
    echo "Name: " . $student[0] . ", Score: " . $student[1] . ", Grade: " . $student[2] . "<br>";
}

// Array functions
$numbers = array(3, 1, 4, 1, 5, 9, 2, 6);
echo "<br>Original array: " . implode(", ", $numbers) . "<br>";
sort($numbers);
echo "Sorted: " . implode(", ", $numbers) . "<br>";
echo "Count: " . count($numbers) . "<br>";
echo "Max: " . max($numbers) . "<br>";
echo "Min: " . min($numbers) . "<br>";

// Functions
function greet($name = "World") {
    return "Hello, " . $name . "!";
}
echo "<br>" . greet() . "<br>";
echo greet("Alice") . "<br>";

// Function with multiple parameters
function calculate($a, $b, $operation = "add") {
    switch ($operation) {
        case "add":
            return $a + $b;
        case "subtract":
            return $a - $b;
        case "multiply":
            return $a * $b;
        case "divide":
            return $b != 0 ? $a / $b : "Division by zero";
        default:
            return "Invalid operation";
    }
}
echo "<br>5 + 3 = " . calculate(5, 3) . "<br>";
echo "10 - 4 = " . calculate(10, 4, "subtract") . "<br>";
echo "6 * 7 = " . calculate(6, 7, "multiply") . "<br>";

// Variable functions
function add($a, $b) {
    return $a + $b;
}
function multiply($a, $b) {
    return $a * $b;
}
$operation = "add";
$result = $operation(5, 3); // Calls add(5, 3)
echo "<br>Variable function result: $result<br>";

// Anonymous functions (closures)
$square = function($x) {
    return $x * $x;
};
echo "Square of 5: " . $square(5) . "<br>";

// Recursive function
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}
echo "Factorial of 5: " . factorial(5) . "<br>";
?>