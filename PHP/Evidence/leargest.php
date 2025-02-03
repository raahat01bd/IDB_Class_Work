<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find leargest number</title>
</head>
<body>
    <h1>Find the largest number..!</h1>
    <form action="" method="post">
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1" required><br><br>
        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2" required><br><br>
        <label for="num3">Number 3:</label>
        <input type="number" id="num3" name="num3" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $num3 = $_POST["num3"];

        if ($num1 >= $num2 && $num1 >= $num3) {
            $largest = $num1;
        } elseif ($num2 >= $num1 && $num2 >= $num3) {
            $largest = $num2;
        } else {
            $largest = $num3;
        }
        echo "The largest number among $num1, $num2, and $num3 is: $largest";
    }
    ?>


    
</body>
</html>