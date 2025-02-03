<?php
if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $filename = $_FILES["fileToUpload"]["name"];
    $temp = $_FILES["fileToUpload"]["tmp_name"];
    $img = "img/";
    $file_size = $_FILES["fileToUpload"]["size"];
    $kb = 100 * 1024; // Max file size limit (100 KB)

    // password validation
    if($password != '25852') {
        echo "<div class='error-message'>Password is incorrect. Please enter a valid password.</div>";
    }
    // file validation
    else if($file_size > $kb) {
        echo "<div class='error-message'>File is too large. Only ".($kb / 1024)." KB is allowed.</div>";
    } else {
        echo "All Set";
        
        $uploadPath = $img . $filename;
        move_uploaded_file($temp, $uploadPath); // Move the file to the 'img/' folder
        echo "<div class='success-message'>File uploaded successfully.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        .error-message { color: red; }
        .success-message { color: green; }
    </style>
</head>
<body>
    <h1>Registration Form</h1>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"> <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"> <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"> <br><br>
            <input type="file" name="fileToUpload"><br><br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
    
    <?php 
    // Display the Name, Email, and Password after form submission
    if(isset($_POST["submit"])) {
        echo "<h2>Submitted Information:</h2>";
        echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
        echo "<p><strong>Password:</strong> " . htmlspecialchars($password) . "</p>";

        // Display the uploaded image after successful upload
        if(isset($uploadPath) && file_exists($uploadPath)) {
            echo "<h2>Uploaded Image:</h2>";
            echo "<img src='$uploadPath' alt='Uploaded Image' width='300' />"; // Display image
        }
    }
    ?>
</body>
</html>
