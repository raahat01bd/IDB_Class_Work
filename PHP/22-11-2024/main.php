<?php
require_once("student.php");

if (isset($_POST["btnSubmit"])) {
    $id = trim($_POST["txtId"]);
    $name = trim($_POST["txtName"]);
    $course = trim($_POST["txtCourse"]);
    $phone = trim($_POST["txtPhone"]);

    // Validate phone number
    if (preg_match("/^[0-9+]{11,14}$/", $phone)) {
        // Save student details
        $student = new Student($id, $name, $course, $phone);
        $student->save();
        $message = "Student saved successfully!";
    } else {
        $message = "Error: Invalid phone number format.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>

</head>
<body>
    <form action="#" method="post">
        <div>
            ID: <br>
            <input type="text" name="txtId" required>
        </div>
        <div>
            Name: <br>
            <input type="text" name="txtName" required>
        </div>
        <div>
            Course: <br>
            <input type="text" name="txtCourse" required>
        </div>
        <div>
            Phone: <br>
            <input type="text" name="txtPhone" required>
        </div> <br><br>

        <div>
            <input type="submit" name="btnSubmit" value="Submit">
        </div>
    </form>

    <?php
    // Display success or error message
    if (isset($message)) {
        echo "<p>$message</p>";
    }

    // Display the list of students
    Student::display_students();
    ?>
</body>
</html>
