<?php
// Input string
$inputString = "this is a sample string";

// Regular expression to match lowercase letters
$outputString = preg_replace_callback("/[a-z]/", function($matches) {
    return strtoupper($matches[0]);  // Convert matched lowercase letter to uppercase
}, $inputString);

echo $outputString;

?> <br>
<?php
// Input string
$inputString = "THIS IS A SAMPLE STRING";

// Regular expression to match uppercase letters
$outputString = preg_replace_callback("/[A-Z]/", function($matches) {
    return strtolower($matches[0]);  // Convert matched uppercase letter to lowercase
}, $inputString);

echo $outputString;
?>

<?php
$date = "2000-01-04 00:00:00";
$outputString = preg_replace_callback("/[a-",   $outputString, $date);
print_r(preg_split($pattern, $date)."<br>");

?>