<?php 

    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "first_project";

    $conn = mysqli_connect("localhost", "root", "", "first_project");

    if (!$conn)
    {
        die("Connection failed");
    }
    echo "Connection successful";

?>