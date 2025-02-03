<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation Example</title>
</head>
<body>
    <h2>Contact Form</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
        <span><?php echo $nameErr; ?></span><br><br>

        Email: <input type="text" name="email" value="<?php echo $email; ?>"><br>
        <span><?php echo $emailErr; ?></span><br><br>

        Message: <textarea name="message"><?php echo $message; ?></textarea><br>
        <span><?php echo $messageErr; ?></span><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
// Initialize variables to store user input and error messages
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required.";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and spaces are allowed.";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
    } else {
        $email = test_input($_POST["email"]);
        // Check if the email format is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format.";
        }
    }

    // Validate Message
    if (empty($_POST["message"])) {
        $messageErr = "Message is required.";
    } else {
        $message = test_input($_POST["message"]);
        // You could also add length or other checks for the message here
    }

    // If no errors, you can process the form (e.g., store in the database)
    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        // Form data is valid, proceed with processing (e.g., saving to DB)
        echo "Form submitted successfully!";
    }
}

// Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

</body>
</html>
