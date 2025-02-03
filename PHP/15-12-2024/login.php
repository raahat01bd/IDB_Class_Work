<?php
    session_start();

    if(isset($_POST['btnLogin'])) 
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // validate email
        $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if (!preg_match($emailPattern, $email)) {
            $error = "Invalid email format!";
        }
    
        if ($username == "Rahat" && $password == "2585" && $email == "merahatbd@gmail.com") {
            $_SESSION["user"] = $username;
            header("Location:main.php");
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
</head>
<body>
    <H3>Login Page</H3>
    <form action="" method="post">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login" name="btnLogin">
    </form>
    
</body>
</html>