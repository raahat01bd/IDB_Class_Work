<?php
require_once("student.php");

// Check if the form is submitted
if (isset($_POST["btnSubmit"])) {
    // Get data from the form
    $id = $_POST["txtId"];
    $name = $_POST["txtName"];
    $phone = $_POST["txtPhone"];

    // Create a new student object and save it
    $student = new Student($id, $name, $phone);
    $student->save();

    // Redirect to the same page after saving
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data Entry Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="number"], input[type="text"], input[type="tel"] {
            padding: 8px;
            width: 200px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Student Data Entry</h1>

    <!-- Form to collect student data -->
    <form action="#" method="post">
        <label for="id">ID:</label>
        <input type="number" id="id" name="txtId" required><br><br>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="txtName" required><br><br>
        
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="txtPhone" pattern="[0-9+]{11,14}" required><br><br>

        <input type="submit" value="Submit" name="btnSubmit">
    </form>

    <!-- Display all saved students -->
    <h2>All Students List</h2>
    <?php
    // Display the list of students after form submission
    Student::displayAll();
    ?>

</body>
</html>
