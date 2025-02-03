<?php

class User
{

    public static $name = "Hello World..!!"."<br>";

    static function myname() 
    {
        echo self::$name;
    }
}

echo User::$name;
echo User::$name = "Hello PHP..!"."<br>";
User::myname();


?>