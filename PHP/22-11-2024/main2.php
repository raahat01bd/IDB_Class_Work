<?php

require_once("student2.php");
if (isset($_POST["btnSubmit"])) 
{
    $id = $_POST["txtId"];
    $name = $_POST["txtName"];
    $email = $_POST["txtEmail"];
    $phone = $_POST["txtPhone"];
    $course = $_POST["txtCourse"];

    // validate phone number

   // Validate phone number
   if (preg_match("/^[0-9+]{11,14}$/", $phone))
   {
    // Save student details
    $student = new Student($id, $name, $email, $phone, $course,);
    $student->save();
    $message = "Student saved successfully!";
    } 
    else 
    {
    $message = "Error: Invalid phone number format.";
    }

    header("Location:".$_SERVER["PHP_SELF"]);
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
            background-color: #fff;
        
        }
        h1 {
            text-align: center;
        }
        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid black;
            border-radius: 5px;
            background-color: #57B0F8;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
        div {
            margin-bottom: 10px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
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
        Phone: <br> <input type="number" name="txtPhone" required>
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