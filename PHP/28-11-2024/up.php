<?php
if (isset($_POST["submit"])) {

    $filename = $_FILES["my-file"]["name"]; //file name
    $temp = $_FILES["my-file"]["tmp_name"];

    $file_size = $_FILES["my-file"]["size"];
    $kb = 102400;


    if ($file_size > $kb) {
        $img ="image/";
        echo "file is tooo large";

        
    } else {
        $img ="image/";
        move_uploaded_file("$temp","$img.$filename");
        echo "done";
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

<body>

    <form action="#" method="post" enctype="multipart/form-data">

        <input type="file" name="my-file">
        <input type="submit" value="submit" name="submit"><br>
    </form>

    <?php
    
    echo "<img src='$img.$filename'>";



    ?>

</body>

</html>