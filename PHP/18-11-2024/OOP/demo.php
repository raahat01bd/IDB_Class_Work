<?php

class Car 
{
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

$car1 = new Car();


$car1->info();

$car1->name = "Mercedes";

$car1->info();


?>