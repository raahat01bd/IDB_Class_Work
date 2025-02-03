<?php
    // Establish database connection
    $db = new mysqli("localhost", "root", "", "first_project");
    
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Insert data into database
    if (isset($_POST['btnSubmit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];

        // Validate input
        if (!empty($id) && !empty($name) && !empty($contact)) {
            // Prepare the insert statement to prevent SQL injection
            $stmt = $db->prepare("INSERT INTO brand (id, name, contact) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $id, $name, $contact);
            if ($stmt->execute()) {
                header("Location: brand.php");
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "All fields are required.";
        }
    }

    // Delete Data
    if (isset($_GET["deleteid"])) {
        $id = $_GET["deleteid"];
        $stmt = $db->prepare("DELETE FROM brand WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            header("Location: brand.php");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 5px 10px;
            border-radius: 3px;
            margin-right: 10px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .delete {
            background-color: #f44336;
        }

        .delete:hover {
            background-color: #e31e1e;
        }
    </style>
</head>
<body>
    <h1>Brand Management</h1>
    <form action="#" method="post">
        <label for="product_id">ID:</label>
        <input type="number" name="id"><br><br>
        <label for="product_name">Name:</label>
        <input type="text" name="name"><br><br>
        <label for="contact">Contact:</label>
        <input type="number" name="contact"><br><br>
        <input type="submit" value="Add Brand" name="btnSubmit">
    </form>

    <!-- Display User Data in Table -->
    <?php
    $product = $db->query("SELECT * FROM brand");
    if ($product->num_rows > 0) {
        $count = 1;
        echo "<table><tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>";

        while ($row = $product->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['contact']}</td>
                    <td>
                        <a href='product.php?editid={$row['id']}'>Edit</a>
                        <a href='brand.php?deleteid={$row['id']}' class='delete'>Delete</a>
                    </td>
                </tr>";
            $count++;
        }
        echo "</table>";
    } else {
        echo "<p>No brands available.</p>";
    }
    ?>
</body>
</html>
