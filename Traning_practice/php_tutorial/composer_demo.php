<?php

// Include Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Use the classes from composer.json
use Ashuu\PhpTutorial\Example;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;

echo "<h1>Composer Dependencies Example</h1>";

// Create an instance of our custom class
$example = new Example("Welcome to PHP with Composer!");
echo "<p>" . $example->getMessage() . "</p>";

// Set up Monolog logger
$logger = new Logger('php_tutorial');
$logger->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::DEBUG));

// Log a message
$result = $example->logMessage($logger);
echo "<p>$result</p>";

// Demonstrate Guzzle HTTP client
$client = new Client();
try {
    $response = $client->get('https://httpbin.org/get', ['timeout' => 5]);
    $data = json_decode($response->getBody(), true);
    echo "<p>HTTP Request successful! Origin: " . ($data['origin'] ?? 'unknown') . "</p>";
} catch (Exception $e) {
    echo "<p>HTTP Request failed: " . $e->getMessage() . "</p>";
}

// Demonstrate Symfony HTTP Foundation
$request = Request::createFromGlobals();
echo "<p>Request Method: " . $request->getMethod() . "</p>";
echo "<p>Request URI: " . $request->getRequestUri() . "</p>";

echo "<h2>Installed Packages</h2>";
echo "<ul>";
echo "<li><strong>Monolog</strong> - Logging library</li>";
echo "<li><strong>Guzzle</strong> - HTTP client</li>";
echo "<li><strong>Symfony HTTP Foundation</strong> - HTTP abstractions</li>";
echo "<li><strong>PHPUnit</strong> - Testing framework (dev dependency)</li>";
echo "<li><strong>PHPStan</strong> - Static analysis tool (dev dependency)</li>";
echo "</ul>";

echo "<p><a href='index.php'>Back to main tutorial</a></p>";