<?php 

    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "new_database";

    $conn = mysqli_connect("localhost", "root", "", "new_database");

    if (!$conn)
    {
        die("Connection Error");
    }
    echo"Connection Succesfully Connected";

?>