<?php

$info = array("dog", "cat", "cow");

list($a,$b,$c)=$info;
echo $a."<br>";
echo $b."<br>";
echo $c."<br>";

?>

<?php
$str="This is a text";

list($a,$b,$c,$d)=explode(" ",$str);
echo $a."<br>";
echo $b."<br>";
echo $c."<br>";
echo $d."<br>";


?>