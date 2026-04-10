<?php
// PHP Working with Files and Dates

// File operations
echo "<h2>File Operations</h2>";

// Create a file
$file = "example.txt";
$content = "This is a sample text file.\nCreated on: " . date("Y-m-d H:i:s");
file_put_contents($file, $content);
echo "File created: $file<br>";

// Read file
if (file_exists($file)) {
    $readContent = file_get_contents($file);
    echo "<br>File content:<br><pre>$readContent</pre>";

    // File information
    echo "File size: " . filesize($file) . " bytes<br>";
    echo "Last modified: " . date("Y-m-d H:i:s", filemtime($file)) . "<br>";
}

// Append to file
$additionalContent = "\nAdditional line added.";
file_put_contents($file, $additionalContent, FILE_APPEND);
echo "<br>Content appended to file.<br>";

// Read file line by line
echo "<br>Reading file line by line:<br>";
$lines = file($file);
foreach ($lines as $lineNumber => $line) {
    echo "Line " . ($lineNumber + 1) . ": $line<br>";
}

// Directory operations
echo "<h2>Directory Operations</h2>";
$dir = "test_directory";
if (!is_dir($dir)) {
    mkdir($dir);
    echo "Directory created: $dir<br>";
}

// List files in current directory
echo "<br>Files in current directory:<br>";
$files = scandir(".");
foreach ($files as $file) {
    if ($file != "." && $file != "..") {
        echo "$file<br>";
    }
}

// Date and Time operations
echo "<h2>Date and Time Operations</h2>";

// Current date and time
echo "Current date: " . date("Y-m-d") . "<br>";
echo "Current time: " . date("H:i:s") . "<br>";
echo "Current datetime: " . date("Y-m-d H:i:s") . "<br>";

// Different date formats
echo "<br>Different formats:<br>";
echo "US format: " . date("m/d/Y") . "<br>";
echo "European format: " . date("d/m/Y") . "<br>";
echo "Long format: " . date("l, F j, Y") . "<br>";

// Timestamp operations
$currentTimestamp = time();
echo "<br>Current timestamp: $currentTimestamp<br>";
echo "Date from timestamp: " . date("Y-m-d H:i:s", $currentTimestamp) . "<br>";

// Date calculations
$tomorrow = strtotime("+1 day");
echo "Tomorrow: " . date("Y-m-d", $tomorrow) . "<br>";

$lastWeek = strtotime("-1 week");
echo "Last week: " . date("Y-m-d", $lastWeek) . "<br>";

// Date difference
$date1 = strtotime("2023-01-01");
$date2 = strtotime("2023-12-31");
$diff = $date2 - $date1;
echo "Days between 2023-01-01 and 2023-12-31: " . ($diff / (60*60*24)) . "<br>";

// Timezone
echo "<br>Timezone: " . date_default_timezone_get() . "<br>";
date_default_timezone_set("America/New_York");
echo "New timezone: " . date_default_timezone_get() . "<br>";
echo "Time in New York: " . date("Y-m-d H:i:s T") . "<br>";

// Clean up
unlink($file);
rmdir($dir);
echo "<br>Cleanup completed.<br>";
?>