<!-- submit file -->

<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirmPassword = htmlspecialchars($_POST["confirm_password"]);
    
    // Check if passwords match
    if ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        $success = "Registration successful!";
    }
} else {
    header("Location: main.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom right, #e3f2fd, #90caf9);
        }
        .success-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h1 {
            color: #2e7d32;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        a {
            text-decoration: none;
            font-weight: bold;
            color: #1e88e5;
            margin-top: 15px;
            display: inline-block;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <?php if (isset($error)): ?>
            <h1 style="color: red;">Error</h1>
            <p><?php echo $error; ?></p>
            <a href="main.php">Go Back</a>
        <?php else: ?>
            <h1><?php echo $success; ?></h1>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <a href="main.php">Back to Registration Form</a>
        <?php endif; ?>
    </div>
</body>
</html>
