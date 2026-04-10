<?php
// PHP Control Structures

// If statement
$age = 18;
if ($age >= 18) {
    echo "You are an adult.<br>";
} else {
    echo "You are a minor.<br>";
}

// If-elseif-else
$score = 85;
if ($score >= 90) {
    echo "Grade: A<br>";
} elseif ($score >= 80) {
    echo "Grade: B<br>";
} elseif ($score >= 70) {
    echo "Grade: C<br>";
} else {
    echo "Grade: F<br>";
}

// Switch statement
$day = "Monday";
switch ($day) {
    case "Monday":
        echo "Start of work week<br>";
        break;
    case "Friday":
        echo "TGIF!<br>";
        break;
    case "Saturday":
    case "Sunday":
        echo "Weekend!<br>";
        break;
    default:
        echo "Regular day<br>";
}

// While loop
echo "<br>While loop:<br>";
$i = 1;
while ($i <= 5) {
    echo "Count: $i<br>";
    $i++;
}

// Do-while loop
echo "<br>Do-while loop:<br>";
$j = 1;
do {
    echo "Number: $j<br>";
    $j++;
} while ($j <= 3);

// For loop
echo "<br>For loop:<br>";
for ($k = 1; $k <= 5; $k++) {
    echo "Iteration: $k<br>";
}

// Foreach loop
echo "<br>Foreach loop:<br>";
$fruits = array("Apple", "Banana", "Orange");
foreach ($fruits as $fruit) {
    echo "Fruit: $fruit<br>";
}

// Foreach with key-value
echo "<br>Foreach with keys:<br>";
$person = array("name" => "John", "age" => 25, "city" => "New York");
foreach ($person as $key => $value) {
    echo "$key: $value<br>";
}

// Break and continue
echo "<br>Break example:<br>";
for ($m = 1; $m <= 10; $m++) {
    if ($m == 6) {
        break; // Exit loop when m equals 6
    }
    echo "Number: $m<br>";
}

echo "<br>Continue example:<br>";
for ($n = 1; $n <= 5; $n++) {
    if ($n == 3) {
        continue; // Skip when n equals 3
    }
    echo "Number: $n<br>";
}
?>