<?php

// class Car 
// {
//     public $name;
//     public $model;
//     public $color;

//     function set_name($name)
//     {
//         $this->name = $name;
//     }

//     function get_name()
//     {
//         return $this->name;
        
//     }

// };

// $ncar = new Car();
// $ncar->set_name("BMW");
// echo $ncar->get_name();

class Car 
{
    public $name;
    public $model;

    function bikename($bname)
    {
       return $this->name = $bname;
    }

};

$honda = new Car();
echo $honda->bikename ("Honda");



?>