<?php 

    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "idb";

    $conn = mysqli_connect("localhost", "root", "", "idb");

    if (!$conn)
    {
        die("Connection failed");
    }
    echo "Connection successful";

?>