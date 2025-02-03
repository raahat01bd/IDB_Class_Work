<?php 

$hostname = "localhost";
$user = "root";
$password = "";
$database = "idb";

$conn = mysqli_connect("localhost", "root", "", "idb");

if (!$conn)
{
    die("connection failed");
}
echo "Connection successful";

?>