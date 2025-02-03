<?php 

    $a = 40;
    try {
        if ($a>30) {
            throw new Exception("Valid Number");
        } else {
            throw new Exception("Invalid Number");
        }
    } 
    catch (Exception $e) {
        echo "Your error is: " .$e->getMessage()."<br>";
    }
    finally {
        echo "This is finally work my work.";
    }
        

?>