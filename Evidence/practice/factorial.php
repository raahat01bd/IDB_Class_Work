<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial in PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
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
            padding: 10px;
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
            font-size: 1.2em;
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
        <h1>Factorial Calculator</h1>
        <form method="post">
            <label for="number">Enter a number:</label>
            <input type="number" id="number" name="number" required>
            <input type="submit" value="Calculate">
        </form>

        <?php
        if ($_POST) {
            $fact = 1;
            $number = $_POST['number'];
            for ($i = 1; $i <= $number; $i++) {
                $fact = $fact * $i;
            }
            echo "<div class='result'>Factorial of <span>$number</span> is: <span>$fact</span></div>";
        }
        ?>
    </div>
</body>
</html>
