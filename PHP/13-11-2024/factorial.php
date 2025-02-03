<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factorial</title>
</head>
<body>
    <form method="post">
        Enter a number: <input type="number" name="number"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if($_POST){
        $fact = 1;
        $number = $_POST['number'];
        for($i=1; $i<=$number; $i++){
            $fact = $fact *$i;
        }
        echo "Factorial of $number is: $fact";
    }
    ?>
</body>
</html>