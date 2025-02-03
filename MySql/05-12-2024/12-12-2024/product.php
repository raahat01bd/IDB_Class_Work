<?php
    $db = new mysqli("localhost", "root", "", "first_project");
    // Insert data into database

    if (isset($_POST['btnSubmit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $p_id = $_POST['p_id'];
        $p_price = $_POST['p_price'];
    
        $sqlinsert = "INSERT INTO product(id,name,contact) VALUES($id,'$name','$p_id','$p_price')";
        if (mysqli_query($db, $sqlinsert) == TRUE) {
            header("Location: product.php");
        }
    }
     // Delete Data
     if (isset($_GET["deleteid"])) {
        $id = $_GET["deleteid"];
        $sql = "DELETE FROM product WHERE id=$id";
        if (mysqli_query($db, $sql) == TRUE) {
            header("Location: product.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
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
            max-width: 500px;
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Product Management</h1>
        <form action="#" method="post">
            <label for="brand_id">Brand ID:</label>
            <input type="number" name="b_id" required><br><br>
            <label for="Brand_name">Brand Name:</label>
            <input type="text" name="b_name" required><br><br>
            <label for="product_id">Product ID:</label>
            <input type="number" name="p_id" required><br><br>
            <label for="product_price">Product Price:</label>
            <input type="number" name="p_price" required><br><br>
            <input type="submit" value="Add Product" name="btnSubmit">
        </form>

        <!-- Display Product Data in Table -->
        <?php
        $product = $db->query("SELECT * FROM product");
        $count = 1;
        echo "<table><tr>
                    <th>Brand ID</th>
                    <th>Brand Name</th>
                    <th>Product ID</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>";

        while (list($id, $name, $p_id, $p_price) = $product->fetch_row()) {
            echo "<tr>
                    <td>$count</td>
                    <td>$name</td>
                    <td>$p_id</td>
                    <td>$p_price</td>
                    <td>
                        <a href='product.php?editid=$id'>Edit</a>
                        <a href='product.php?deleteid=$id' class='delete'>Delete</a>
                    </td>
                </tr>";
                $count++;
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>
