<?php 
if(isset($_POST['btnSubmit']))
{
    $filename = $_FILES["my-file"]["name"];
    $temp = $_FILES["my-file"]["tmp_name"];
    $img = "img/";
    $size = $_FILES["my-file"]["size"];
    $kb = 100*1024;

    // check file type and size
    if($size > $kb) {
        $img = "img/";
        echo "File is too large ";
    } else {
                           
        move_uploaded_file($temp, "$img.$filename");
        
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file upload</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="my-file">
        <input type="submit" value="Upload" name="btnSubmit">
    </form>

    <?php 
    echo "<img src='$img.$filename' alt='car img'>";
    
    ?>
    
</body>
</html>