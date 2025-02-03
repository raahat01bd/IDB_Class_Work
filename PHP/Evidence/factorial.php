<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial in PHP using recursion function</title>
</head>
<body>
    <h1>Factorial Calculator</h1>
    <form method="post">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Calculate">
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