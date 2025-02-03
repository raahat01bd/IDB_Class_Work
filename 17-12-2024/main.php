<!-- main file -->

<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* Body: Gradient Background */
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

        /* Form Container */
        .form-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15), 
                        0 6px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Title */
        h1 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
        }

        /* Form */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            text-align: left;
            font-size: 14px;
            font-weight: bold;
            color: #555555;
        }

        input[type="text"], 
        input[type="email"], 
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
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
        }

        input[type="submit"]:hover {
            background-color: #1e88e5;
        }

        a {
            margin-top: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            color: #1e88e5;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Registration Form</h1>
        <form action="submit.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            
            <input type="submit" value="Submit">
            <a href="logout.php">Logout</a>
        </form>
    </div>
</body>
</html>
