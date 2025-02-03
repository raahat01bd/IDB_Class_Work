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
        header("Location: demo.php");
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
    body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    color: #444;
    transition: all 0.3s ease-in-out;
}

.login-container {
    width: 100%;
    max-width: 400px;
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    padding: 30px 25px;
    animation: fadeIn 0.8s ease-in-out;
    transform: scale(1.02);
    transition: transform 0.3s ease;
}

.login-container:hover {
    transform: scale(1.05);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333333;
    font-size: 28px;
    font-weight: bold;
    text-transform: uppercase;
}

.login-container form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

label {
    font-weight: bold;
    font-size: 14px;
    color: #333333;
    margin-bottom: 8px;
    text-transform: uppercase;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #2575fc;
    box-shadow: 0 0 8px rgba(37, 117, 252, 0.2);
    outline: none;
}

input[type="submit"] {
    padding: 14px 20px;
    font-size: 18px;
    font-weight: bold;
    color: #ffffff;
    background: linear-gradient(135deg, #2575fc, #6a11cb);
    border: none;
    border-radius: 8px;
    cursor: pointer;
    text-transform: uppercase;
    transition: background 0.3s ease, transform 0.3s ease;
}

input[type="submit"]:hover {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(106, 17, 203, 0.3);
}

a {
    text-decoration: none;
    color: #2575fc;
    font-weight: bold;
    font-size: 14px;
    margin-top: 15px;
    display: block;
    text-align: center;
    transition: color 0.3s ease, transform 0.3s ease;
}

a:hover {
    color: #6a11cb;
    transform: scale(1.1);
}

.error-message {
    color: #e74c3c;
    text-align: center;
    margin-bottom: 15px;
    font-weight: bold;
    font-size: 14px;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .login-container {
        padding: 20px;
    }

    h1 {
        font-size: 22px;
    }

    input[type="submit"] {
        font-size: 16px;
    }
}

    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login Page</h1>
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
        <a>Aren't register? Click register to login here.</a><br>
        <a href="register.php">Register</a>
    </div>
</body>
</html>
