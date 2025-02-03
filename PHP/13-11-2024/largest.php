<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Largest Number</title>
</head>
<body>

<h2>Find the Largest Number</h2>
<form method="POST" action="">
    <label for="num1">Enter first number:</label><br>
    <input type="number" id="num1" name="num1" required><br><br>
    
    <label for="num2">Enter second number:</label><br>
    <input type="number" id="num2" name="num2" required><br><br>
    
    <label for="num3">Enter third number:</label><br>
    <input type="number" id="num3" name="num3" required><br><br>
    
    <input type="submit" value="Find Largest">
</form>

</body>
</html>
<?php

if ($_POST) {
   
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];


    echo "<h3>Input Numbers:</h3>";
    echo "First number: $num1<br>";
    echo "Second number: $num2<br>";
    echo "Third number: $num3<br>";

    function findLargest($num1, $num2, $num3) {
        if ($num1 >= $num2 && $num1 >= $num3) {
            return $num1;
        } elseif ($num2 >= $num1 && $num2 >= $num3) {
            return $num2;
        } else {
            return $num3;
        }
    }

    $largest = findLargest($num1, $num2, $num3);
    echo "<h3>The largest number is: $largest</h3>";
}
?>


