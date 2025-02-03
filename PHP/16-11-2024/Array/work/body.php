<?php
// Initialize variables
$name = $email = $password = $gender = "";
$nameErr = $emailErr = $passwordErr = $genderErr = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required.";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format.";
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required.";
    } else {
        $password = test_input($_POST["password"]);
    }

    // Validate Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required.";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

// Function to sanitize form data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h2>Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br>
        <span style="color: red;"><?php echo $nameErr; ?></span><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>
        <span style="color: red;"><?php echo $emailErr; ?></span><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>" required><br>
        <span style="color: red;"><?php echo $passwordErr; ?></span><br><br>

        <label for="gender">Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male" <?php echo ($gender == "male" ? "checked" : ""); ?> required>
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female" <?php echo ($gender == "female" ? "checked" : ""); ?> required>
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other" <?php echo ($gender == "other" ? "checked" : ""); ?> required>
        <label for="other">Other</label><br>
        <span style="color: red;"><?php echo $genderErr; ?></span><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // Display submitted data if form is valid
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameErr && !$emailErr && !$passwordErr && !$genderErr) {
        echo "<h3>Form Submission Result:</h3>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Password:</strong> $password</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
    }
    ?>
</body>
</html>
