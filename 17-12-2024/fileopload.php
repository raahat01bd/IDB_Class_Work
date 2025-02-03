<?php 
if(isset($_POST['btnSubmit']))
{
    $filename = $_FILES["my-file"]["name"];
    $temp = $_FILES["my-file"]["tmp_name"];
    $img = "img/";
    $size = $_FILES["my-file"]["size"];
    $kb = 100*1024;

    // Get the file extension
    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

    // Check file size
    if($size > $kb) {
        $errorMsg = "File is too large. Maximum allowed size is 100 KB.";
    } 
    // Check if the file type is allowed
    elseif (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        $errorMsg = "Only JPG, JPEG, PNG, and GIF files are allowed.";
    } 
    else {
        // Try to move the uploaded file
        if (move_uploaded_file($temp, "$img$filename")) {
            $successMsg = "File uploaded successfully!";
            $imgPath = "$img$filename";
        } else {
            $errorMsg = "Failed to upload the file. Please try again.";
        }
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
        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #f3f4f6, #90caf9);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Form Container */
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            font-size: 1.8em;
        }

        /* File Input */
        input[type="file"] {
            border: 1px solid #ddd;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 15px;
            border-radius: 5px;
            transition: border 0.3s ease-in-out;
        }

        input[type="file"]:focus {
            border: 1px solid #42a5f5;
            outline: none;
        }

        /* Submit Button */
        input[type="submit"] {
            background-color: #42a5f5;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1e88e5;
        }

        /* Success and Error Messages */
        .message {
            margin-top: 15px;
            font-size: 1em;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        /* Uploaded Image */
        img {
            margin-top: 20px;
            max-width: 100%;
            border: 2px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Upload a File</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="my-file" required>
            <input type="submit" value="Upload" name="btnSubmit">
        </form>

        <?php if (isset($successMsg)): ?>
            <p class="message success"><?php echo $successMsg; ?></p>
            <img src="<?php echo $imgPath; ?>" alt="Uploaded File">
        <?php elseif (isset($errorMsg)): ?>
            <p class="message error"><?php echo $errorMsg; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
