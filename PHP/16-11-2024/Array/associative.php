<?php

$fruits = array("Apple", "Banana", "Cherry");
$fruits[] = "Orange";
print_r($fruits) ;
echo "<br>";

$cars = array("brand" => "Ford", "model" => "Mustang");
$cars["color"] = "Red";
print_r($cars) ;
echo "<br>";

$fruits = array("Apple", "Banana", "Cherry");
array_push($fruits, "Orange", "Kiwi", "Lemon");
print_r($fruits) ;
echo "<br>";

$cars = array("brand" => "Ford", "model" => "Mustang");
$cars += ["color" => "red", "year" => 1964];
print_r($cars) ;
echo "<br>";

$cars = array("Volvo", "BMW", "Toyota");
array_splice($cars, 1, 1);
print_r($cars);
echo "<br>";



$cars = array("Volvo", "BMW", "Toyota");
unset($cars[1]);
print_r($cars);
echo "<br>";


$cars = array("Volvo", "BMW", "Toyota");
array_splice($cars, 1, 2);
print_r($cars);
echo "<br>";


$cars = array("Volvo", "BMW", "Toyota");
unset($cars[0], $cars[1]);
print_r($cars);
echo "<br>";


$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
$newarray = array_diff($cars, ["Mustang", 1964]);
print_r($newarray);
echo "<br>";


$numbers = array(4, 6, 2, 22, 11);
sort($numbers);
print_r($numbers);

?>