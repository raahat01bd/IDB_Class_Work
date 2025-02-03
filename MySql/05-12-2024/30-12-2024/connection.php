<?php 

    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "thirty_one_dec";

    $conn = mysqli_connect("localhost", "root", "", "thirty_one_dec");

    if (!$conn)
    {
        die("Connection Error");
    }
    echo"Connection Succesfully Connected";

?>