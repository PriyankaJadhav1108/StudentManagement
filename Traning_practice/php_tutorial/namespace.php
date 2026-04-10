<?php
// PHP Namespaces

// Define a namespace
namespace MyProject;

// Classes in this namespace
class User {
    public $name;
    public $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getInfo() {
        return "Name: {$this->name}, Email: {$this->email}";
    }
}

class Product {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

// Sub-namespace
namespace MyProject\Utils;

class StringHelper {
    public static function capitalize($string) {
        return ucwords(strtolower($string));
    }

    public static function slugify($string) {
        return strtolower(str_replace(' ', '-', $string));
    }
}

// Global namespace
namespace {

    // Use classes from namespaces
    use MyProject\User;
    use MyProject\Product;
    use MyProject\Utils\StringHelper as StrHelper;

    // Create objects
    $user = new User("John Doe", "john@example.com");
    $product = new Product("Laptop", 999.99);

    echo "<h1>PHP Namespaces Example</h1>";
    echo "<p>" . $user->getInfo() . "</p>";
    echo "<p>Product: {$product->name} - $" . $product->getPrice() . "</p>";

    // Use utility class
    $name = "john doe";
    echo "<p>Capitalized: " . StrHelper::capitalize($name) . "</p>";
    echo "<p>Slugified: " . StrHelper::slugify("Hello World PHP") . "</p>";

    // Accessing classes without use statement
    $user2 = new MyProject\User("Jane Smith", "jane@example.com");
    echo "<p>" . $user2->getInfo() . "</p>";

    // Namespace constants and functions
    namespace MyProject;

    const VERSION = "1.0.0";

    function getVersion() {
        return VERSION;
    }

    // Back to global namespace
    namespace {

        echo "<p>Version: " . MyProject\getVersion() . "</p>";
        echo "<p>Version constant: " . MyProject\VERSION . "</p>";

        // __NAMESPACE__ magic constant
        echo "<p>Current namespace: " . __NAMESPACE__ . "</p>";
        echo "<p>MyProject namespace: " . MyProject\__NAMESPACE__ . "</p>";
    }
}
?>