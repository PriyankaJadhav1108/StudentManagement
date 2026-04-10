// JavaScript Tutorial: Basics and Advanced Concepts
// This file demonstrates JavaScript fundamentals and advanced features

// ==========================================
// WHAT IS JAVASCRIPT (JS)?
// ==========================================
/*
JavaScript is a high-level, interpreted programming language that is primarily used for web development.
It allows you to add interactivity to websites, create dynamic content, and build web applications.
JS runs in the browser and can also run on the server-side with Node.js.

Key characteristics:
- Dynamically typed
- Object-oriented
- Functional programming support
- Event-driven
- Single-threaded with asynchronous capabilities
*/

// ==========================================
// FEATURES OF JAVASCRIPT
// ==========================================
/*
1. Client-side scripting for web browsers
2. Server-side development with Node.js
3. Cross-platform compatibility
4. Rich ecosystem of libraries and frameworks
5. Asynchronous programming with promises and async/await
6. DOM manipulation
7. Event handling
8. JSON support
9. Regular expressions
10. Prototypal inheritance
*/

// ==========================================
// HOW TO ADD JS TO A WEBPAGE
// ==========================================
/*
There are several ways to add JavaScript to a webpage:

1. Inline script (not recommended for large code):
   <script>
       console.log("Hello World!");
   </script>

2. External file (recommended):
   <script src="script.js"></script>

3. Event handlers (inline, not recommended):
   <button onclick="alert('Clicked!')">Click me</button>

4. Programmatically (in external JS file):
   - See examples below
*/

// ==========================================
// VARIABLES
// ==========================================

// var (function-scoped, can be redeclared, hoisted)
var oldStyle = "This is var";
console.log("var:", oldStyle);

// let (block-scoped, cannot be redeclared in same scope)
let modernVariable = "This is let";
console.log("let:", modernVariable);

// const (block-scoped, cannot be reassigned)
const constantValue = "This is const";
console.log("const:", constantValue);

// Variable types
let stringVar = "Hello";
let numberVar = 42;
let booleanVar = true;
let nullVar = null;
let undefinedVar;
let objectVar = { key: "value" };
let arrayVar = [1, 2, 3];

console.log("Variable types:");
console.log("String:", stringVar, typeof stringVar);
console.log("Number:", numberVar, typeof numberVar);
console.log("Boolean:", booleanVar, typeof booleanVar);
console.log("Null:", nullVar, typeof nullVar);
console.log("Undefined:", undefinedVar, typeof undefinedVar);
console.log("Object:", objectVar, typeof objectVar);
console.log("Array:", arrayVar, typeof arrayVar);

// ==========================================
// OPERATORS
// ==========================================

// Arithmetic operators
let a = 10, b = 3;
console.log("Arithmetic:");
console.log("a + b =", a + b); // 13
console.log("a - b =", a - b); // 7
console.log("a * b =", a * b); // 30
console.log("a / b =", a / b); // 3.333...
console.log("a % b =", a % b); // 1
console.log("a ** b =", a ** b); // 1000

// Comparison operators
console.log("Comparison:");
console.log("a == b:", a == b); // false
console.log("a === b:", a === b); // false (strict equality)
console.log("a != b:", a != b); // true
console.log("a !== b:", a !== b); // true
console.log("a > b:", a > b); // true
console.log("a < b:", a < b); // false
console.log("a >= b:", a >= b); // true
console.log("a <= b:", a <= b); // false

// Logical operators
let x = true, y = false;
console.log("Logical:");
console.log("x && y:", x && y); // false
console.log("x || y:", x || y); // true
console.log("!x:", !x); // false

// Assignment operators
let c = 5;
c += 3; // c = c + 3
console.log("c after += 3:", c); // 8
c *= 2; // c = c * 2
console.log("c after *= 2:", c); // 16

// ==========================================
// LOOPS
// ==========================================

// for loop
console.log("For loop:");
for (let i = 0; i < 5; i++) {
    console.log("Iteration:", i);
}

// while loop
console.log("While loop:");
let counter = 0;
while (counter < 3) {
    console.log("Counter:", counter);
    counter++;
}

// do-while loop
console.log("Do-while loop:");
let doCounter = 0;
do {
    console.log("Do counter:", doCounter);
    doCounter++;
} while (doCounter < 3);

// for-in loop (for objects)
console.log("For-in loop:");
let person = { name: "John", age: 30, city: "New York" };
for (let key in person) {
    console.log(key + ":", person[key]);
}

// for-of loop (for arrays and iterables)
console.log("For-of loop:");
let fruits = ["apple", "banana", "orange"];
for (let fruit of fruits) {
    console.log("Fruit:", fruit);
}

// ==========================================
// HOW JS IS INTEGRATED
// ==========================================
/*
JavaScript integrates with HTML and CSS to create interactive web pages:

1. DOM Manipulation - Changing HTML content and styles
2. Event Handling - Responding to user interactions
3. AJAX - Communicating with servers without page reload
4. APIs - Accessing browser features and external services
5. Frameworks/Libraries - React, Vue, Angular for complex applications
6. Node.js - Server-side JavaScript
*/

// ==========================================
// ADVANCED TOPICS
// ==========================================

// ==========================================
// OBJECTS
// ==========================================

// Object literal
let car = {
    brand: "Toyota",
    model: "Camry",
    year: 2020,
    start: function() {
        console.log("Car started");
    }
};

console.log("Car object:", car);
car.start();

// Constructor function
function Person(name, age) {
    this.name = name;
    this.age = age;
    this.greet = function() {
        console.log("Hello, my name is " + this.name);
    };
}

let person1 = new Person("Alice", 25);
person1.greet();

// ES6 Classes
class Animal {
    constructor(name, species) {
        this.name = name;
        this.species = species;
    }

    makeSound() {
        console.log(this.name + " makes a sound");
    }
}

let dog = new Animal("Buddy", "Dog");
dog.makeSound();

// ==========================================
// STRING, DATE, ARRAY, BOOLEAN
// ==========================================

// String methods
let text = "Hello, World!";
console.log("String methods:");
console.log("Length:", text.length);
console.log("Uppercase:", text.toUpperCase());
console.log("Substring:", text.substring(0, 5));
console.log("Split:", text.split(", "));
console.log("Replace:", text.replace("World", "JavaScript"));

// Date object
let now = new Date();
console.log("Date methods:");
console.log("Current date:", now);
console.log("Year:", now.getFullYear());
console.log("Month:", now.getMonth() + 1); // Months are 0-indexed
console.log("Day:", now.getDate());
console.log("Formatted:", now.toLocaleDateString());

// Array methods
let numbers = [1, 2, 3, 4, 5];
console.log("Array methods:");
console.log("Original:", numbers);
numbers.push(6);
console.log("After push:", numbers);
numbers.pop();
console.log("After pop:", numbers);
console.log("Slice:", numbers.slice(1, 4));
console.log("Map:", numbers.map(n => n * 2));
console.log("Filter:", numbers.filter(n => n > 3));
console.log("Reduce:", numbers.reduce((sum, n) => sum + n, 0));

// Boolean
let isTrue = true;
let isFalse = false;
console.log("Boolean operations:");
console.log("true && false:", isTrue && isFalse);
console.log("true || false:", isTrue || isFalse);
console.log("!true:", !isTrue);

// ==========================================
// MATH
// ==========================================

console.log("Math object:");
console.log("PI:", Math.PI);
console.log("E:", Math.E);
console.log("Random:", Math.random());
console.log("Round:", Math.round(3.7));
console.log("Floor:", Math.floor(3.7));
console.log("Ceil:", Math.ceil(3.2));
console.log("Max:", Math.max(1, 5, 3));
console.log("Min:", Math.min(1, 5, 3));
console.log("Sqrt:", Math.sqrt(16));
console.log("Pow:", Math.pow(2, 3));

// ==========================================
// REGULAR EXPRESSIONS (RegEx)
// ==========================================

// Creating regex
let pattern = /hello/i; // case-insensitive
let regex = new RegExp("world", "g"); // global match

let testString = "Hello World, hello universe";
console.log("RegEx:");
console.log("Test pattern:", pattern.test(testString));
console.log("Match:", testString.match(pattern));
console.log("Replace:", testString.replace(/hello/gi, "hi"));

// ==========================================
// BROWSER OBJECTS
// ==========================================

// Window object (global in browser)
console.log("Browser objects:");
if (typeof window !== 'undefined') {
    console.log("Window inner width:", window.innerWidth);
    console.log("Window location:", window.location.href);
} else {
    console.log("Running in Node.js environment");
}

// Document object
if (typeof document !== 'undefined') {
    console.log("Document title:", document.title);
    console.log("Document ready state:", document.readyState);
} else {
    console.log("Document object not available (Node.js)");
}

// ==========================================
// COOKIES
// ==========================================

// Cookie functions (would work in browser)
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    if (typeof document !== 'undefined') {
        document.cookie = name + "=" + value + expires + "; path=/";
    }
}

function getCookie(name) {
    if (typeof document === 'undefined') return null;
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

console.log("Cookie demo:");
setCookie("testCookie", "Hello Cookie", 7);
console.log("Cookie set (check browser dev tools)");

// ==========================================
// VALIDATION
// ==========================================

function validateEmail(email) {
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePhone(phone) {
    let phoneRegex = /^\+?[\d\s\-\(\)]+$/;
    return phoneRegex.test(phone);
}

console.log("Validation:");
console.log("Email valid:", validateEmail("test@example.com"));
console.log("Email invalid:", validateEmail("invalid-email"));
console.log("Phone valid:", validatePhone("+1-555-123-4567"));
console.log("Phone invalid:", validatePhone("abc"));

// ==========================================
// TIMING
// ==========================================

// setTimeout
console.log("Timing demo:");
setTimeout(() => {
    console.log("This runs after 2 seconds");
}, 2000);

// setInterval
let intervalId = setInterval(() => {
    console.log("This runs every second");
}, 1000);

// Stop interval after 5 seconds
setTimeout(() => {
    clearInterval(intervalId);
    console.log("Interval stopped");
}, 5000);

// ==========================================
// BROWSER DEVELOPER TOOLS
// ==========================================
/*
Browser Developer Tools (DevTools) are built-in tools in modern browsers:

1. Console - For logging and debugging
2. Elements - For inspecting and editing HTML/CSS
3. Network - For monitoring network requests
4. Sources - For debugging JavaScript
5. Application - For inspecting storage, cookies, etc.
6. Performance - For analyzing page performance

Usage examples:
- console.log() - Log messages
- console.error() - Log errors
- console.warn() - Log warnings
- console.table() - Display tabular data
- debugger; - Set breakpoints
*/

// Console examples
console.log("Regular log");
console.warn("Warning message");
console.error("Error message");
console.table([
    { name: "John", age: 30 },
    { name: "Jane", age: 25 }
]);

// ==========================================
// AJAX
// ==========================================

// XMLHttpRequest (traditional way)
function makeAjaxRequest(url) {
    return new Promise((resolve, reject) => {
        if (typeof XMLHttpRequest === 'undefined') {
            reject("XMLHttpRequest not available (Node.js)");
            return;
        }

        let xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    resolve(xhr.responseText);
                } else {
                    reject("Error: " + xhr.status);
                }
            }
        };
        xhr.send();
    });
}

// Fetch API (modern way)
async function fetchData(url) {
    try {
        if (typeof fetch === 'undefined') {
            throw new Error("Fetch API not available (Node.js)");
        }
        let response = await fetch(url);
        if (!response.ok) {
            throw new Error("HTTP error! status: " + response.status);
        }
        let data = await response.json();
        return data;
    } catch (error) {
        console.error("Fetch error:", error);
        return null;
    }
}

console.log("AJAX demo:");
// Uncomment to test (requires a web server)
// makeAjaxRequest('https://jsonplaceholder.typicode.com/todos/1')
//     .then(data => console.log("XHR result:", data))
//     .catch(error => console.error("XHR error:", error));

// fetchData('https://jsonplaceholder.typicode.com/todos/1')
//     .then(data => console.log("Fetch result:", data));

// ==========================================
// NODE JS
// ==========================================
/*
Node.js is a JavaScript runtime built on Chrome's V8 JavaScript engine.
It allows you to run JavaScript on the server-side.

Key features:
1. Non-blocking I/O
2. Event-driven architecture
3. NPM (Node Package Manager)
4. Built-in modules (fs, http, path, etc.)
5. Cross-platform

This code is designed to run in both browser and Node.js environments.
*/

// Node.js specific code
if (typeof process !== 'undefined' && process.version) {
    console.log("Running in Node.js version:", process.version);

    // File system operations (Node.js only)
    const fs = require('fs');
    const path = require('path');

    // Example: Read this file
    try {
        let fileContent = fs.readFileSync(__filename, 'utf8');
        console.log("File read successfully, length:", fileContent.length);
    } catch (error) {
        console.error("File read error:", error.message);
    }

    // HTTP server example
    const http = require('http');
    const server = http.createServer((req, res) => {
        res.writeHead(200, { 'Content-Type': 'text/plain' });
        res.end('Hello from Node.js server!\n');
    });

    // Uncomment to start server (will run indefinitely)
    // server.listen(3000, () => {
    //     console.log('Server running at http://localhost:3000/');
    // });

} else {
    console.log("Running in browser environment");
}

// ==========================================
// CONCLUSION
// ==========================================

console.log("JavaScript tutorial completed!");
console.log("This file demonstrates both browser and Node.js compatible code.");
console.log("For web development, focus on DOM manipulation and browser APIs.");
console.log("For server development, explore Node.js modules and frameworks.");
