<?php

require_once("student1.php");

if (isset($_POST["btnSubmit"])) {
    $id = $_POST["txtId"];
    $name = $_POST["txtName"];
    $email = $_POST["txtEmail"];
    $phone = $_POST["txtPhone"];
    $course = $_POST["txtCourse"];

    // Validate phone number
    if (preg_match("/^[0-9+]{11,14}$/", $phone)) {
        // Save student details
        $student = new Student($id, $name, $email, $phone, $course);
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
    <title>Student Entry Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #444;
            margin-top: 20px;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form div {
            margin-bottom: 15px;
        }
        form div input, form div select {
            width: calc(100% - 20px);
            padding: 8px 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        form div input:focus, form div select:focus {
            border-color: #007bff;
            outline: none;
        }
        form div input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        form div input[type="submit"]:hover {
            background: #0056b3;
        }
        p {
            text-align: center;
            font-size: 16px;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 10px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #007bff;
            color: #fff;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        @media (max-width: 600px) {
            form {
                width: 90%;
                padding: 10px;
            }
            table {
                width: 100%;
            }
            table th, table td {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<h1>Student Entry Form</h1>
<form action="" method="post">
    <div>
        ID: <br> <input type="text" name="txtId" required>
    </div>
    <div>
        Name: <br> <input type="text" name="txtName" required>
    </div>
    <div>
        Email: <br> <input type="email" name="txtEmail" required>
    </div>
    <div>
        Phone: <br> <input type="text" name="txtPhone" required>
    </div>
    <div>
        Course Name: <br>
        <select name="txtCourse" required>
            <option value="">Select Course</option>
            <option value="Web Application Development">Web Application Development</option>
            <option value="Graphics">Graphics</option>
            <option value="Networking">Networking</option>
            <option value="Database">Database</option>
            <option value="Java">Java</option>
            <option value="ASP.NET">ASP.NET</option>
        </select>
    </div> <br>
    <div>
        <input type="submit" value="Submit" name="btnSubmit">
    </div>
</form>

<?php
// Display success or error message
if (isset($message)) {
    echo "<p>$message</p>";
}

// Display the list of students
Student::displayAll();
?>

</body>
</html>


