<?php
if(isset($_POST["submit"])) {
    $filename = $_FILES["fileToUpload"]["name"];
    $temp = $_FILES["fileToUpload"]["tmp_name"];
    $img = "img/";
    $file_size = $_FILES["fileToUpload"]["size"];
    $kb = 100 * 1024;

    if($file_size > $kb) {
        echo "<div class='error-message'>File is too large. Only ".($kb / 1024)." KB is allowed.</div>";
    } else {
        // $uploadPath = $img . $filename;
        move_uploaded_file($temp, $filename);
        echo "<div class='success-message'>File uploaded successfully.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="file"] {
            padding: 10px;
            margin: 20px 0;
            border-radius: 5px;
            border: 2px solid #ccc;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Image Display */
        img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            max-height: 300px;
            border-radius: 8px;
        }

        /* Message Styles */
        .error-message {
            color: #e74c3c;
            text-align: center;
            font-weight: bold;
        }

        .success-message {
            color: #2ecc71;
            text-align: center;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <h1>Upload Your File</h1>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload">
            <input type="submit" value="Upload File" name="submit">
        </form>

        <?php
            echo "<img src='$img.$filename'>";
        ?>
    </div>
</body>
</html>
