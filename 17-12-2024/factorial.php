<!-- factorial -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial Calculator</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #e3f2fd, #90caf9);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        h1 {
            font-size: 1.8em;
            color: #333333;
            margin-bottom: 20px;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label, input[type="number"] {
            text-align: center;
            font-size: 1em;
        }

        input[type="number"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box;
            transition: border 0.3s ease-in-out;
        }

        input[type="number"]:focus {
            border: 1px solid #42a5f5;
            outline: none;
            box-shadow: 0 0 5px rgba(66, 165, 245, 0.5);
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #42a5f5;
            color: #ffffff;
            border: none;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1e88e5;
        }

        /* Result Output */
        .result {
            margin-top: 20px;
            font-size: 1.2em;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Factorial Calculator</h1>
        <form method="post">
            <label for="number">Enter a number:</label>
            <input type="number" id="number" name="number" min="0" required>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        if ($_POST) {
            $fact = 1;
            $number = $_POST['number'];
            for ($i = 1; $i <= $number; $i++) {
                $fact = $fact * $i;
            }
            echo "<div class='result'>Factorial of $number is: <span>$fact</span></div>";
        }
        ?>
    </div>
</body>
</html>
