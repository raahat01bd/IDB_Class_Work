<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Number</title>
</head>
<body>
<h2>Find the prime Number</h2>
<form method="POST" action="">
    <label for="num">Enter the number:</label><br>
    <input type="number" id="num" name="num" required><br><br>
    <input type="submit" value="Find Prime">
</form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = $_POST["num"];
        echo "You enter the number: $num<br>";
        if ($num <= 1) {
            echo "$num is not a prime number.";
        } else {
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                    echo "$num is not a prime number.";
                    
                    break;
                }
            }
            if ($i > sqrt($num)) {
                echo "$num is a prime number.";
            }
        }
    }
    
    ?>
</body>
</html>