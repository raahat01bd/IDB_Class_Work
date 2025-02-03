<?php
    echo $_GET['fname'];
?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="get">
    Name: <input type="text" name="fname"><br>
    <input type="submit" value="Submit">
</form>