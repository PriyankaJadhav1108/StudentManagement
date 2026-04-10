<?php
// PHP Magic Methods

class Person {
    private $data = array();
    private $name;
    private $age;

    // Constructor
    public function __construct($name = "", $age = 0) {
        $this->name = $name;
        $this->age = $age;
        echo "__construct called: Person created with name '$name' and age $age<br>";
    }

    // Destructor
    public function __destruct() {
        echo "__destruct called: Person '$this->name' is being destroyed<br>";
    }

    // Magic getter
    public function __get($property) {
        echo "__get called for property '$property'<br>";
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        }
        return "Property '$property' not found";
    }

    // Magic setter
    public function __set($property, $value) {
        echo "__set called for property '$property' with value '$value'<br>";
        $this->data[$property] = $value;
    }

    // Magic isset
    public function __isset($property) {
        echo "__isset called for property '$property'<br>";
        return isset($this->data[$property]);
    }

    // Magic unset
    public function __unset($property) {
        echo "__unset called for property '$property'<br>";
        unset($this->data[$property]);
    }

    // Magic toString
    public function __toString() {
        return "__toString called: Person: $this->name, Age: $this->age";
    }

    // Magic call (for undefined methods)
    public function __call($method, $arguments) {
        echo "__call called: Method '$method' does not exist. Arguments: " . implode(", ", $arguments) . "<br>";
        return "Method not found";
    }

    // Magic callStatic (for undefined static methods)
    public static function __callStatic($method, $arguments) {
        echo "__callStatic called: Static method '$method' does not exist. Arguments: " . implode(", ", $arguments) . "<br>";
        return "Static method not found";
    }

    // Magic invoke (when object is called as function)
    public function __invoke($argument = "") {
        echo "__invoke called: Object used as function with argument '$argument'<br>";
        return "Hello from $this->name!";
    }

    // Magic clone
    public function __clone() {
        echo "__clone called: Person object cloned<br>";
        $this->name = $this->name . " (Clone)";
    }

    // Magic sleep (for serialization)
    public function __sleep() {
        echo "__sleep called: Preparing for serialization<br>";
        return array('name', 'age', 'data');
    }

    // Magic wakeup (for unserialization)
    public function __wakeup() {
        echo "__wakeup called: Object unserialized<br>";
    }
}

// Demonstrate magic methods
echo "<h1>PHP Magic Methods Demonstration</h1>";

// Constructor
$person = new Person("John", 25);

// Getter and Setter
$person->city = "New York"; // __set
echo "City: " . $person->city . "<br>"; // __get

// isset and unset
isset($person->city); // __isset
unset($person->city); // __unset

// toString
echo $person . "<br>"; // __toString

// call
$person->nonExistentMethod("arg1", "arg2"); // __call

// callStatic
Person::nonExistentStaticMethod("arg1"); // __callStatic

// invoke
$result = $person("test argument"); // __invoke
echo "Invoke result: $result<br>";

// clone
$clonedPerson = clone $person; // __clone
echo "Cloned person name: $clonedPerson->name<br>";

// serialize/unserialize
$serialized = serialize($person); // __sleep
echo "Serialized: $serialized<br>";

$unserialized = unserialize($serialized); // __wakeup
echo "Unserialized person name: $unserialized->name<br>";

// Destructor will be called automatically when script ends
?>