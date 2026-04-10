<?php
// PHP Constants

// Define constants using define()
define("SITE_NAME", "My Website");
define("VERSION", "1.0.0");
define("PI", 3.14159);

// Constants are global and case-sensitive by default
echo "Site Name: " . SITE_NAME . "<br>";
echo "Version: " . VERSION . "<br>";
echo "PI: " . PI . "<br>";

// Case-insensitive constant (not recommended)
define("DEBUG", true, true);
echo "Debug (case-insensitive): " . DEBUG . "<br>";
echo "debug (lowercase): " . debug . "<br>";

// Using constants in expressions
$area = PI * 5 * 5;
echo "Area of circle with radius 5: " . $area . "<br>";

// Built-in constants
echo "PHP Version: " . PHP_VERSION . "<br>";
echo "Operating System: " . PHP_OS . "<br>";
echo "File: " . __FILE__ . "<br>";
echo "Line: " . __LINE__ . "<br>";

// Magic constants
function testMagic() {
    echo "Function: " . __FUNCTION__ . "<br>";
    echo "Class: " . __CLASS__ . "<br>";
    echo "Method: " . __METHOD__ . "<br>";
}
testMagic();
?>