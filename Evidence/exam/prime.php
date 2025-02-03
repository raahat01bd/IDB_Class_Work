<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Number</title>
    <style>
        /* General body styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form styling */
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        form label {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }

        form input[type="number"] {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            outline: none;
            transition: border 0.3s ease;
        }

        form input[type="number"]:focus {
            border-color: #007bff;
        }

        form input[type="submit"] {
            padding: 12px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Output styling */
        .result {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        /* Responsive styling */
        @media (max-width: 600px) {
            form {
                width: 90%;
                padding: 20px;
            }
            form input[type="number"], form input[type="submit"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<h2>Find the Prime Number</h2>

<form method="POST" action="">
    <label for="num">Enter the number:</label><br>
    <input type="number" id="num" name="num" required><br><br>
    <input type="submit" value="Find Prime">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = $_POST["num"];
    echo "<div class='result'>";
    echo "You entered the number: $num<br>";

    if ($num <= 1) {
        echo "<span class='error'>$num is not a prime number.</span>";
    } else {
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                echo "<span class='error'>$num is not a prime number.</span>";
                break;
            }
        }
        if ($i > sqrt($num)) {
            echo "<span class='success'>$num is a prime number.</span>";
        }
    }
    echo "</div>";
}
?>

</body>
</html>
