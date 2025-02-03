<?php

class Car 
{
    public $name;
    public $model;
    public $year;
    public $color;


    function __destruct()
    {
        echo "The car ". $this->name. " ". $this->model. " has been destroyed.";
        echo "<br>";
    }

    function __construct($name = "BMW", $model = "X5", $year = 2020, $color = "Black")
    {
        $this->name = $name;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
        echo "A new car ". $this->name. " ". $this->model. " has been created.";
        echo "<br>";
    }


    function info()
    {
        echo "The car is a ". $this->color. " ". $this->name. " ". $this->model. ", manufactured in ". $this->year. ". It can reach a speed of 1000 km/h.";
        echo "<br>";
    }
};


$car1 = new Car("Audi", "Q7", 2022, "Red");
$car1->info();


$car2 = new Car();
$car2->info();

?>
