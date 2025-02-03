<!-- Constructor in php -->
 <?php

 class Car
 {
     public $name;
     public $model;

     function __construct($name, $model)
     {
         $this->name = $name;
         $this->model = $model;
     }
     function info()
     {
         echo "Car Name: ". $this->name. "<br>";
         echo "Car Model: ". $this->model. "<br>";
     }
 }
 
 $myCar = new Car("BMW", "X5");
 
 $myCar->info();
 $myCar->name = "Toyota";
 $myCar->model = "Camry";
 $myCar->info();
 ?>