<!-- largest number -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Largest Number</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #e3f2fd, #90caf9);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Container */
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }

        h2, h3 {
            color: #333333;
            margin-bottom: 20px;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1em;
            color: #555555;
            text-align: left;
        }

        input[type="number"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="number"]:focus {
            border-color: #42a5f5;
            outline: none;
            box-shadow: 0 0 5px rgba(66, 165, 245, 0.5);
        }

        input[type="submit"] {
            padding: 12px;
            background-color: #42a5f5;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1e88e5;
        }

        /* Results */
        .result {
            margin-top: 20px;
            font-size: 1.2em;
            color: #333;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            .container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Find the Largest Number</h2>
        <form method="POST" action="">
            <label for="num1">Enter first number:</label>
            <input type="number" id="num1" name="num1" required>
            
            <label for="num2">Enter second number:</label>
            <input type="number" id="num2" name="num2" required>
            
            <label for="num3">Enter third number:</label>
            <input type="number" id="num3" name="num3" required>
            
            <input type="submit" value="Find Largest">
        </form>
        <?php
        if ($_POST) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $num3 = $_POST['num3'];

            echo "<div class='result'><h3>Input Numbers:</h3>";
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
            echo "<h3>The largest number is: $largest</h3></div>";
        }
        ?>
    </div>
</body>
</html>
