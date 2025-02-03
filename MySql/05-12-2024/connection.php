<?php 

$hostname = "localhost";
$user = "root";
$password = "";
$database = "student_info";

$conn = mysqli_connect("localhost", "root", "", "student_info");

if (!$conn)
{
    die("connection failed");
}
echo "Connection successful";

?>