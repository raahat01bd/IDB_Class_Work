<?php
$nameError = $emailError = $passwordError = "";
$outputMessage = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        // Check if the name is empty
        if (empty($_POST["name"])) {
            throw new Exception("Name is required.");
        } else {
            $name = htmlspecialchars($_POST["name"]);
        }

        // Check if the email is empty and valid
        if (empty($_POST["email"])) {
            throw new Exception("Email is required.");
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        } else {
            $email = htmlspecialchars($_POST["email"]);
        }

        // Check if the password is empty and has at least 6 characters
        if (empty($_POST["password"])) {
            throw new Exception("Password is required.");
        } elseif (strlen($_POST["password"]) < 6) {
            throw new Exception("Password must be at least 6 characters.");
        } else {
            $password = htmlspecialchars($_POST["password"]);
        }

        // If no exception, process the form
        $outputMessage = "<div class='success-message'>Form submitted successfully!<br>
                          Name: $name<br>
                          Email: $email<br>
                          Password: $password</div>"; // Note: Never show passwords in production
    } catch (Exception $e) {
        // Display the error message
        $outputMessage = "<div class='error-message'>" . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Throw Catch Error Handling Form in PHP</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-size: 16px;
            margin-bottom: 8px;
            color: #555;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #e74c3c;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            background-color: #f8d7da;
            border-radius: 4px;
        }

        .success-message {
            color: #2ecc71;
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            border-radius: 4px;
        }

        .output-container {
            width: 100%;
            max-width: 400px;
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h2>PHP Form with Error Handling</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Submit" name="btnSubmit">
        </form>
    </div>

    <!-- Output Message Area -->
    <div class="output-container">
        <?php
            // Display success or error message
            if ($outputMessage) {
                echo $outputMessage;
            }
        ?>
    </div>
</body>
</html>
