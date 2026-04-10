<?php
// PHP Comments

// This is a single line comment

/*
This is a multi-line comment
It can span multiple lines
*/

# This is also a single line comment (shell style)

// Comments are ignored by PHP interpreter
// They are useful for documentation

/**
 * This is a PHPDoc comment
 * Used for documenting functions, classes, etc.
 * @param string $name The name parameter
 * @return string The greeting message
 */
function greet($name) {
    return "Hello, " . $name . "!"; // Inline comment
}

echo greet("World"); // Call the function
?>