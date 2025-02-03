<?php

require_once("student.php");

if (isset($_POST["btnSubmit"])) {
    $id = $_POST["txtId"];
    $name = $_POST["txtName"];
    $batch = $_POST["txtBatch"];

    // Create object
    $student = new Student($id, $name, $batch);
    $student->save();

    // Redirect to the same page to prevent form resubmission
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
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
            border-color: #4caf50;
            outline: none;
        }
        form div input[type="submit"] {
            background: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        form div input[type="submit"]:hover {
            background: #4caf50;
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
            background-color: #4caf50;
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
        Batch: <br>
        <select name="txtBatch" required>
            <option value="">Select Batch</option>
            <option value="PWAD/NCLC-M/60/01">PWAD/NCLC-M/60/01</option>
            <option value="PWAD/NCLC-M/61/01">PWAD/NCLC-M/61/01</option>
            <option value="PWAD/NCLC-M/62/01">PWAD/NCLC-M/62/01</option>
            <option value="PWAD/NCLC-M/63/01">PWAD/NCLC-M/63/01</option>
            <option value="PWAD/NCLC-M/64/01">PWAD/NCLC-M/64/01</option>
            <option value="PWAD/NCLC-M/64/01">PWAD/NCLC-M/65/01</option>
        </select>
    </div> <br>
    <div>
        <input type="submit" value="Submit" name="btnSubmit">
    </div>
</form>

<?php
// Display the list of students
Student::result();
?>

</body>
</html>  