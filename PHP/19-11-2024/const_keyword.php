<?php
class Goodbye 
{
    const LEAVING_MESSAGE = "Thank you for doing const method..!";

    public static function sayGoodbye()
    {
        echo self::LEAVING_MESSAGE;
    }
};

Goodbye::sayGoodbye();



?>