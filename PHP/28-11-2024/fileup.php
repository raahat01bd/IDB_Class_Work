<?php
if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $file = $_FILES["file"]["name"];
    $targetDir = "image/";

    // Ensure the target directory exists
    if(!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Creates directory if it doesn't exist
    }

    // Path where the file will be saved
    $targetFilePath = $targetDir . basename($file);

    // Move the uploaded file
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        echo "File uploaded successfully.<br>";
    } else {
        echo "Error in file upload.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Form</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        Name: <br>
        <input type="text" name="name" required><br>
        <span style="color: red;"><?php echo isset($name) ? htmlspecialchars($name) : ''; ?></span><br><br>
        
        File: <br>
        <span style="color: red;"><?php echo isset($file) ? htmlspecialchars($file) : ''; ?></span><br><br>
        Select a file: <input type="file" name="file" required><br>
        <input type="submit" name="submit" value="Upload">
    </form>

    <?php
    if (isset($targetFilePath)) {
        echo "<img src='" . htmlspecialchars($targetFilePath) . "' alt='Uploaded Image' style='max-width: 300px;'>";
    }
    ?>
</body>
</html>
