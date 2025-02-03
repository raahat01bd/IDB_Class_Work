<?php

1. What is the use of session_start() and session_destroy() functions in PHP?
session_start(): Starts or resumes a session. It must be called before any output is sent.

php
Copy code
session_start();
$_SESSION['user'] = 'John';
session_destroy(): Destroys all session data. It does not unset session cookies.

session_start();
session_destroy();
2. What is an Associative Array?
An associative array in PHP is an array where each element is identified by a key instead of an index. Keys are usually strings.

$person = array("name" => "John", "age" => 25);
echo $person["name"]; // Outputs: John
3. What is the difference between include() and require() functions?
include(): Includes a file, but if the file is missing, a warning is shown and script execution continues.

include('file.php');
require(): Includes a file, but if the file is missing, a fatal error occurs and script execution stops.

require('file.php');
4. Explain the differences between abstract classes and interfaces.
Abstract Class:

Can have both abstract (without implementation) and non-abstract methods.
A class can inherit only one abstract class.
Can have properties.

abstract class Animal {
    abstract public function makeSound();
    public function eat() { echo "Eating"; }
}
Interface:

Only method declarations (without implementation).
A class can implement multiple interfaces.
Cannot have properties.

interface Animal {
    public function makeSound();
}
5. What are magic methods in PHP?
Magic methods are predefined methods that begin with double underscores (__). They allow you to alter the default behavior of PHP objects.

__construct(): Constructor for creating objects.


class MyClass {
    public function __construct($name) { echo "Hello, $name!"; }
}
__destruct(): Destructor for cleanup.


class MyClass {
    public function __destruct() { echo "Goodbye!"; }
}
6. Differentiate between variables and constants in PHP.
Variables:

Can be changed during execution.
Defined using $ symbol.

$age = 25;
Constants:

Cannot be changed once defined.
Defined using define() or const.

define("PI", 3.14);
7. What is the difference between echo and print in PHP?
echo:

Can output multiple parameters.
Faster because it does not return any value.

echo "Hello", " ", "World!";
print:

Can only output one parameter.
Returns 1 (can be used in expressions).

print "Hello World!";

?>