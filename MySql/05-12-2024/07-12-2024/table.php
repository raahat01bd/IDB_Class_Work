<?php 

// Establish database connection
$db = new mysqli("localhost", "root", "", "idb");

if (isset($_POST['btnSubmit'])) {
    $id = $_POST['ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Check if all fields are filled
    if (!empty($name) && !empty($email) && !empty($phone)) {
        // Insert data into the database
        $insert_sql = "INSERT INTO users(id, name, email, phone)  VALUES ('$id', '$name', '$email', '$phone')";
        if (mysqli_query($db, $insert_sql)) {
            echo "<p style='color: green;'>Data inserted successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error inserting data!</p>";
        }
    } else {
        echo "<p style='color: red;'>Please fill in all fields.</p>";
    }
}

// Delete student data
if (isset($_GET['deleteid'])) {
    $delete_id = $_GET['deleteid'];
    $delete_sql = "DELETE FROM users WHERE id =$delete_id";
    if (mysqli_query($db, $delete_sql)) {
        echo "<p style='color: green;'>Data deleted successfully!</p>";
        header("Location:table.php"); // Refresh the page to display updated data
     }
     // else {
    //     echo "<p style='color: red;'>Error deleting data!</p>";
    // }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Student Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            border-color: #6C63FF;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #6C63FF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #5a54e5;
        }

        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            text-align: left;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        a {
            color: red;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Student Data Entry Form</h1>

    <div class="form-container">
        <form action="#" method="POST">
            <label for="ID">ID:</label>
            <input type="text" name="ID" required>
            
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
            
            <input type="submit" value="Submit" name="btnSubmit">
        </form>
    </div>

    <div class="form-container">
        <h2>Show Student Table</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>

            <?php 
            // Fetch and display student records from the database
            $user = mysqli_query($db, "SELECT * FROM users");
            while (list($_id, $_name, $_email, $_phone) =$user->fetch_row()) {
                echo "
                <tr>
                    <td>$_id</td>
                    <td>$_name</td>
                    <td>$_email</td>
                    <td>$_phone</td>
                    <td><a href='table.php?deleteid=$id'>Delete</a></td>
                </tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
