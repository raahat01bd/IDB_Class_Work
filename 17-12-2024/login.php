<!-- login file -->

<?php
session_start();

if (isset($_POST["btnLogin"])) {
    $username = $_POST["txtUsername"];
    $email = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];

    // Validate email format
    $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (!preg_match($emailPattern, $email)) {
        $error = "Invalid email format!";
    }

    if ($username == "Rahat" && $password == "2585" && $email == "merahatbd@gmail.com") {
        $_SESSION["user"] = $username;
        header("Location: main.php");
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        /* Login Container: Form Styling with Shadow */
        .login-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15), 
                        0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Add a slight hover effect for the form */
        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2), 
                        0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* Title */
        h1 {
            text-align: center;
            font-size: 26px;
            color: #333333;
            margin-bottom: 20px;
        }

        /* Form */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Labels */
        label {
            font-size: 14px;
            font-weight: bold;
            color: #555555;
        }

        /* Input Fields */
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #42a5f5;
            box-shadow: 0 0 5px rgba(66, 165, 245, 0.5);
            outline: none;
        }

        /* Submit Button */
        input[type="submit"] {
            padding: 10px;
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

        /* Error Message */
        .error-message {
            color: #dc3545;
            font-size: 14px;
            text-align: center;
        }

        /* Links */
        a {
            text-align: center;
            font-size: 14px;
            color: #1e88e5;
            text-decoration: none;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="#" method="POST">
            <?php if (!empty($error)): ?>
                <p class="error-message"><?= $error ?></p>
            <?php endif; ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="txtUsername" required>
            <label for="email">Email:</label>
            <input type="text" id="email" name="txtEmail" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="txtPassword" required>
            <input type="submit" value="Login" name="btnLogin">
        </form>
    </div>
</body>
</html>

