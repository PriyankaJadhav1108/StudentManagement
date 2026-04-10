<?php
// PHP Regular Expressions (PCRE)

// Basic pattern matching
echo "<h1>PHP Regular Expressions</h1>";

// preg_match - find first match
$text = "Hello World";
$pattern = "/World/";
if (preg_match($pattern, $text)) {
    echo "Pattern '$pattern' found in '$text'<br>";
} else {
    echo "Pattern not found<br>";
}

// preg_match_all - find all matches
$text = "The quick brown fox jumps over the lazy dog";
$pattern = "/the/i"; // Case insensitive
$matches = array();
$count = preg_match_all($pattern, $text, $matches);
echo "Found $count occurrences of 'the' (case insensitive): " . implode(", ", $matches[0]) . "<br>";

// preg_replace - replace matches
$text = "Hello World, hello universe";
$pattern = "/hello/i";
$replacement = "Hi";
$result = preg_replace($pattern, $replacement, $text);
echo "Original: '$text'<br>";
echo "Replaced: '$result'<br>";

// preg_split - split string by pattern
$text = "apple,banana;orange:grape";
$pattern = "/[,;:]/";
$fruits = preg_split($pattern, $text);
echo "Split result: " . implode(" | ", $fruits) . "<br>";

// Common regex patterns
echo "<h2>Common Regex Patterns</h2>";

// Email validation
$emails = array("user@example.com", "invalid-email", "test@domain.co.uk", "user@.com");
$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
foreach ($emails as $email) {
    $valid = preg_match($emailPattern, $email) ? "Valid" : "Invalid";
    echo "Email '$email': $valid<br>";
}

// Phone number validation
$phones = array("123-456-7890", "(123) 456-7890", "1234567890", "123-45-6789");
$phonePattern = "/^\(?[0-9]{3}\)?[-.\s]?[0-9]{3}[-.\s]?[0-9]{4}$/";
foreach ($phones as $phone) {
    $valid = preg_match($phonePattern, $phone) ? "Valid" : "Invalid";
    echo "Phone '$phone': $valid<br>";
}

// URL validation
$urls = array("http://example.com", "https://www.example.com/path", "invalid-url", "ftp://example.com");
$urlPattern = "/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i";
foreach ($urls as $url) {
    $valid = preg_match($urlPattern, $url) ? "Valid" : "Invalid";
    echo "URL '$url': $valid<br>";
}

// Extract data with capturing groups
$text = "Name: John Doe, Age: 25, City: New York";
$pattern = "/Name:\s*([^,]+),\s*Age:\s*(\d+),\s*City:\s*(.+)/";
if (preg_match($pattern, $text, $matches)) {
    echo "<br>Extracted data:<br>";
    echo "Name: {$matches[1]}<br>";
    echo "Age: {$matches[2]}<br>";
    echo "City: {$matches[3]}<br>";
}

// preg_grep - filter array with regex
$words = array("apple", "Banana", "cherry", "Date", "elderberry");
$pattern = "/^[A-Z]/"; // Words starting with capital letter
$capitalWords = preg_grep($pattern, $words);
echo "<br>Words starting with capital letter: " . implode(", ", $capitalWords) . "<br>";

// preg_filter - filter and replace in array
$numbers = array("one", "two", "three", "four", "five");
$pattern = "/(one|two|three)/";
$replacement = "number";
$result = preg_filter($pattern, $replacement, $numbers);
echo "<br>Filtered numbers: " . implode(", ", $result) . "<br>";

// Regex modifiers
echo "<h2>Regex Modifiers</h2>";
$text = "Hello\nWorld\nPHP";
$pattern = "/^Hello/m"; // Multiline modifier
if (preg_match($pattern, $text)) {
    echo "'Hello' found at start of line (multiline)<br>";
}

$text = "The quick brown fox";
$pattern = "/brown.*fox/s"; // Dot matches newlines
if (preg_match($pattern, $text)) {
    echo "'brown fox' found with dot matching all<br>";
}

// preg_quote - escape special characters
$specialString = "Hello (world) [test]";
$quoted = preg_quote($specialString, "/");
echo "<br>Original: $specialString<br>";
echo "Quoted: $quoted<br>";

// Error handling
$invalidPattern = "/unclosed";
$result = @preg_match($invalidPattern, "test");
if ($result === false) {
    echo "<br>Regex error occurred<br>";
}
?>