<?php 

    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "university";

    $conn = mysqli_connect("localhost", "root", "", "university");

    if (!$conn)
    {
        die("Connection Error");
    }
    echo"Connection Succesfully Connected";

?>