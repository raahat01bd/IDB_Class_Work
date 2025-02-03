<?php
if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $filename = $_FILES["fileToUpload"]["name"];
    $temp = $_FILES["fileToUpload"]["tmp_name"];
    $img = "img/"; // Path to the directory where the image will be stored
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
        // Ensure the directory exists, and then upload the file
        if (!file_exists($img)) {
            mkdir($img, 0777, true); // Create 'img' directory if it doesn't exist
        }
        
        $uploadPath = $img . $filename; // Path to save the uploaded file
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
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        label {
            font-size: 14px;
            font-weight: 600;
            color: #555;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Messages */
        .error-message {
            color: red;
            background-color: #f8d7da;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            margin-top: 20px;
            font-size: 16px;
        }

        .success-message {
            color: green;
            background-color: #d4edda;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-top: 20px;
            font-size: 16px;
        }

        /* Output Section */
        .output {
            margin-top: 20px;
        }

        .output h2 {
            font-size: 20px;
            color: #333;
        }

        .output p {
            font-size: 16px;
            color: #555;
        }

        .output img {
            margin-top: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Form</h1>
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
        
        <?php 
        // Display the Name, Email, and Password after form submission
        if(isset($_POST["submit"])) {
            echo "<div class='output'>";
            echo "<h2>Submitted Information:</h2>";
            echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Password:</strong> " . htmlspecialchars($password) . "</p>";

            // Display the uploaded image after successful upload
            if(isset($uploadPath) && file_exists($uploadPath)) {
                echo "<h2>Uploaded Image:</h2>";
                echo "<img src='$uploadPath' alt='Uploaded Image' width='300' />"; // Display image
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
