<!-- inheritance in php -->

<?php

class Car {

    public $name = "BMW";
    public $model = "X5";
    public $year = 2020;
    public $color = "Black";
    public $speed = 1000;
    
    function info ()
    {
        echo "The car is a ". $this->color. " ". $this->name. " ". $this->model. ", manufactured in ". $this->year. ". It can reach a speed of ". $this->speed. " km/h.";
        echo "<br>";
    }

};
class Bike extends Car 
{
    public $brand = "Suzuki";
    public $model = "Giant";


    function info ()
    {
        parent::info();
        echo "The bike is a ". $this->color. " ". $this->brand. " ". $this->model. ".";
        echo "<br>";
    }
};

$bike = new Bike();

$bike->info();

?>