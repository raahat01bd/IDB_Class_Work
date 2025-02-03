<?php
if (isset($_POST['submit'])) {
    $filename = $_FILES["my-file"]["name"];
    $temp = $_FILES["my-file"]["tmp_name"];
    $img = "img/";
    $size = $_FILES["my-file"]["size"];
    $kb = 100 * 1024;

    if (!empty($filename)){
        if ($size > $kb) {
            $img = "img/";
            echo "File is too large ";
        } else {
            $img = "img/";                        
            move_uploaded_file("$temp", "$img.$filename");
            echo "succes";
        }
    }
    else {
        echo " please enter a file ";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>file
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="my-file">
        <input type="submit" value="Submit" name="submit">
    </form>


    <?php
    echo "  <img src='$img.$filename' alt='car img'>";
    ?>
</body>

</html>