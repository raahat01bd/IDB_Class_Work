<?php
$db = new mysqli("localhost", "root", "", "idb");

// Insert Data
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sqlinsert = "INSERT INTO users(id,name,email,phone) VALUES($id,'$name','$email','$phone')";
    if (mysqli_query($db, $sqlinsert) == TRUE) {
        header("Location: main.php");
    }
}

// Delete Data
if (isset($_GET["deleteid"])) {
    $id = $_GET["deleteid"];
    $sql = "DELETE FROM users WHERE id=$id";
    if (mysqli_query($db, $sql) == TRUE) {
        header("Location: main.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <style>
        /* General Page Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        /* Form Styles */
        form {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 8px 0 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Table Styles */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            color: #fff;
            background-color: #007BFF;
            border-radius: 4px;
            margin-right: 10px;
        }

        a:hover {
            background-color: #0056b3;
        }

        a.delete {
            background-color: #e74c3c;
        }

        a.delete:hover {
            background-color: #c0392b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            form {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <!-- Form to Insert Data -->
    <form action="" method="post">
        <h2>Add New User</h2>
        <label for="id">ID</label>
        <input type="text" id="id" name="id" required><br>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" required><br>
        <input type="submit" value="Submit" name="submit">
    </form>

    <!-- Display User Data in Table -->
    <?php
    $user = $db->query("SELECT * FROM users");
    echo "<table><tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>";

    while (list($id, $name, $email, $phone) = $user->fetch_row()) {
        echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$email</td>
                <td>$phone</td>
                <td>
                    <a href='edit.php?editid=$id'>Edit</a>
                    <a href='main.php?deleteid=$id' class='delete'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
    ?>
</body>

</html>