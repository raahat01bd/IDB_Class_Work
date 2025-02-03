<?php 

    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "first_project";

    $conn = mysqli_connect("localhost", "root", "", "fourteen_dec");

    if (!$conn)
    {
        die("Connection failed");
    }
    echo "Connection successful";

?>