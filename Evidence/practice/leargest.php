<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Largest Number</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        h1 {
            color: #4CAF50;
            font-size: 2em;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1.1em;
            color: #333;
            text-align: left;
        }

        input[type="number"] {
            padding: 10px;
            font-size: 1.1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
        }

        input[type="number"]:focus {
            border-color: #4CAF50;
        }

        input[type="submit"] {
            padding: 12px;
            font-size: 1.1em;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            font-size: 1.3em;
            font-weight: bold;
            color: #333;
        }

        .result span {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Find the Largest Number</h1>
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
            echo "<div class='result'>The largest number among <span>$num1</span>, <span>$num2</span>, and <span>$num3</span> is: <span>$largest</span></div>";
        }
        ?>
    </div>
</body>
</html>
