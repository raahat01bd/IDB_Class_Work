<?php
$db = mysqli_connect("localhost", "root", "", "exam");
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $add = $_POST['add'];
    $cn= $_POST['cn'];
    $db->query("call manufacture_insert('$name','$add','$cn')");
    
}
if (isset($_POST["submit2"])) {
    $name2 = $_POST['name2'];
    $price = $_POST['price'];
    $mid = $_POST['mid'];
    $db->query("call productt('$name2','$price','$mid')");
    header("location:$_SERVER[PHP_SELF]");
}
if (isset($_POST["delete"])) {
    $del = $_POST['mid2'];
    $db->query("delete from manufacture where id=$del");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #444;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        form input[type="text"],
        form input[type="number"],
        form select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
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
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        td {
            background-color: #ffffff;
        }

        .btn {
            background-color: #28a745;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Product Management</h1>

        <!-- Manufacture Form -->
        <form action="" method="post">
            <label for="name">Manufacture Name: <i class="fas fa-industry"></i></label><br>
            <input type="text" name="name" id="name" placeholder="Enter manufacture name" required><br>
            <label for="add">Manufacture Address: <i class="fas fa-map-marker-alt"></i></label><br>
            <input type="text" name="add" id="add" placeholder="Enter address" required><br>
            <label for="cn">Contact_no: <i class="fas fa-map-marker-alt"></i></label><br>
            <input type="text" name="cn" id="cn" placeholder="Enter address" required><br>
            <input type="submit" value="Add Manufacture" name="submit">
        </form>

        <!-- Product Form -->
        <form action="" method="post">
            <label for="name2">Product Name: <i class="fas fa-box"></i></label><br>
            <input type="text" name="name2" id="name2" placeholder="Enter product name" required><br>
            <label for="price">Price: <i class="fas fa-dollar-sign"></i></label><br>
            <input type="number" name="price" id="price" placeholder="Enter price" required><br>
            <label for="mid">Manufacture Name: <i class="fas fa-industry"></i></label><br>
            <select name="mid" id="mid" required>
                <?php
                $r = $db->query("select * from manufacture");
                while (list($id, $name) = $r->fetch_row()) {
                    echo "<option value='$id'>$name</option>";
                }
                ?>
            </select><br>
            <input type="submit" value="Add Product" name="submit2">
        </form>

        <!-- Delete Manufacture Form -->
        <form action="" method="post">
            <label for="mid2">Select Manufacture to Delete: <i class="fas fa-trash-alt"></i></label><br>
            <select name="mid2" id="mid2" required>
                <?php
                $r = $db->query("select * from manufacture");
                while (list($id, $name) = $r->fetch_row()) {
                    echo "<option value='$id'>$name</option>";
                }
                ?>
            </select><br>
            <input type="submit" value="Delete Manufacture" name="delete" class="btn btn-danger">
        </form>

        <!-- Display Product Details -->
        <?php
        $rr = $db->query("select * from product_details");
        echo "  <table>
            <tr>
                <th>Brand Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Address</th>
            </tr>";
        while (list($name, $add, $name2, $price) = $rr->fetch_row()) {
            echo " <tr>
                <td>$name</td>
                <td>$name2</td>
                <td>$price</td>
                <td>$add</td>
            </tr>";
        }
        echo " </table>";
        ?>

                <!-- Display Product Details -->
                <?php
        $rr = $db->query("select * from product_details");
        echo "  <table>
            <tr>
                <th>Brand Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Address</th>
            </tr>";
        while (list($name, $add, $name2, $price) = $rr->fetch_row()) {
            echo " <tr>
                <td>$name</td>
                <td>$name2</td>
                <td>$price</td>
                <td>$add</td>
            </tr>";
        }
        echo " </table>";
        ?>
    </div>

</body>

</html>
