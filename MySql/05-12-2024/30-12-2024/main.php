<?php 
$db = new mysqli("localhost", "root", "", "thirty_one_dec");


if(isset($_POST['btn'])){
    $name=$_POST["mname"];
    $address=$_POST["maddress"];
    $contact=$_POST["mcontact"];

    $sql = "CALL insert_manufacturer('$name', '$address', '$contact')";

    if ($conn->query($sql)===TRUE){
        echo "Insertes Successfully";
    }else{
        echo "Error: ". $sql. "<br>". $conn->error;
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
</head>
<body>
    <h2>Add Manufacturer</h2>
    <form action="" method="post">
        <label for="mname">Manufacturer Name:</label>
        <input type="text" id="mname" name="mname" required>
        <label for="maddress">Manufacturer Address:</label>
        <input type="text" id="maddress" name="maddress" required>
        <label for="mcontact">Contat_No:</label>
        <input type="text" id="mcontact" name="mcontact" required>
        <input type="submit" value="Add Manufacturer" name="btnsubmit">
    </form>
    
</body>
</html>