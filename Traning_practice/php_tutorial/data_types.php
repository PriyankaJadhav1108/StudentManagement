<?php
// PHP Data Types

// String
$name = "John Doe";
echo "String: " . $name . "<br>";

// Integer
$age = 25;
echo "Integer: " . $age . "<br>";

// Float
$price = 19.99;
echo "Float: " . $price . "<br>";

// Boolean
$isStudent = true;
echo "Boolean: " . ($isStudent ? 'true' : 'false') . "<br>";

// Array
$fruits = array("Apple", "Banana", "Orange");
echo "Array: " . implode(", ", $fruits) . "<br>";

// Null
$nothing = null;
echo "Null: " . $nothing . "<br>";

// Object (basic example)
class Person {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
}
$person = new Person("Alice");
echo "Object: " . $person->name . "<br>";
?>