<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade System</title>
</head>
<body>
    
<?php
    $grade = 95;
    
    if ($grade >= 90) {
        echo "Grade: A";
    } elseif ($grade >= 80) {
        echo "Grade: B";
    } elseif ($grade >= 70) {
        echo "Grade: C";
    } elseif ($grade >= 60) {
        echo "Grade: D";
    } else {
        echo "Grade: F";
    }
?>
</body>
</html>