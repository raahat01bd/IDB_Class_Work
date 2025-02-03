<?php

trait Main 
{
    public function info()
    {
        echo "This is a Main trait."."<br>";
    }
}

class Child
{
    use Main;
    public function save()
    {
        echo "This is a Child class."."<br>";
    }

}

$child = new Child();
$child->info(); 

?>