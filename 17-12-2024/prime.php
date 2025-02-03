<!-- Prime number -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Number</title>
    <style>
        /* General Body Styling */
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

        /* Container for Content */
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }

        /* Heading Styling */
        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #555;
            text-align: left;
        }

        input[type="number"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
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
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1e88e5;
        }

        /* Results Styling */
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
        <h2>Find the Prime Number</h2>
        <form method="POST" action="">
            <label for="num">Enter the number:</label>
            <input type="number" id="num" name="num" required><br><br>
            <input type="submit" value="Find Prime">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num = $_POST["num"];
            echo "<div class='result'>You entered the number: $num<br>";
            if ($num <= 1) {
                echo "$num is not a prime number.</div>";
            } else {
                $isPrime = true;
                for ($i = 2; $i <= sqrt($num); $i++) {
                    if ($num % $i == 0) {
                        $isPrime = false;
                        break;
                    }
                }
                if ($isPrime) {
                    echo "$num is a prime number.</div>";
                } else {
                    echo "$num is not a prime number.</div>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
