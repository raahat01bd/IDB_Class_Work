<?php
namespace Route;
interface First 
{
    public function sayHello();
}

abstract class Second implements First
{
    public function sayHello()
    {
        echo "Hello from Second class.."."<br>";
    }
    abstract public function sayGoodbye();
}

class Third extends Second 
{
    public function sayGoodbye()
    {
        echo "Goodbye from Third class.."."<br>";
    }
}



?>