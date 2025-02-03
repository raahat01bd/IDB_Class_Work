<?php 

// Establish database connection
$db = mysqli_connect("localhost", "root", "", "student_info");

// Insert data into the database
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!empty($name) && !empty($email)) {
        // Insert data into the database
        $insert_sql = "INSERT INTO user (id, name, email) VALUES ('$id', '$name', '$email')";
        if (mysqli_query($db, $insert_sql)) {
            echo "<p style='color: green;'>Data inserted successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error inserting data!</p>";
        }
    } else {
        echo "<p style='color: red;'>Please fill in both fields.</p>";
    }
}

// Delete data from the database
if (isset($_GET['deleteid'])) {
    $delete_id = $_GET['deleteid'];

    $sql = "DELETE FROM user WHERE id = $delete_id";
    if (mysqli_query($db, $sql)) {
        header("Location: form.php"); // Redirect to refresh the page
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 80%;
            max-width: 900px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }
        form {
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        input[type="text"], input[type="email"] {
            padding: 10px;
            font-size: 16px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Insert Data Form -->
    <h2>Insert Student Data</h2>
    <form method="POST" action="">
        <input type="text" name="id" placeholder="ID" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" name="submit" value="Insert Data">
    </form>

    <!-- Display Data in Table -->
    <h2>Student Records</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php 
        $user = $db->query("SELECT * FROM user");
        while (list($_id, $_name, $_email) = $user->fetch_row()) {
            echo "
            <tr>
                <td>$_id</td>
                <td>$_name</td>
                <td>$_email</td>
                <td><a href='form.php?deleteid=$_id' style='color: red;'>Delete</a></td>
            </tr>";
        }
        ?>
    </table>

</div>

</body>
</html>
