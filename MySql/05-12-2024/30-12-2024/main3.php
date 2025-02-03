<?php 
$connt = mysqli_connect("localhost", "root", "", "thirty_one_dec");

// Add Manufacturer
if (isset($_POST['btnsubmit'])) {
    $name = $_POST["mname"];
    $add = $_POST["maddress"];
    $con = $_POST["mcontact"];
    $connt->query("CALL insert_manufacturer('$name', '$add', '$con')");
}

// Add Product
if (isset($_POST['btnsub'])) {
    $pname = $_POST["pname"];
    $price = $_POST["price"];
    $cont = $_POST["manuname"];
    $connt->query("CALL insert_product('$pname', '$price', '$cont')");  // Assuming you have a procedure for this
    if ($price > 5000) {
        header("location: main2.php");
    }
}

// Delete Manufacturer
if (isset($_POST['delBtn'])) {
    $id = $_POST['manuname'];
    $connt->query("DELETE FROM manufacturer WHERE id = $id");
}

// Close the connection (optional in case you have multiple places)
$connt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        form {
            margin: 20px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        form input, form select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form .sumbmit input {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        form .sumbmit input:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .inputBox {
            margin-bottom: 20px;
        }
        
        .btn input {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            text-align: center;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn input:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

    <div class="container">
    <h2>Add Manufacturer</h2>
    <form action="" method="post">
        <label for="mname">Manufacturer Name:</label>
        <input type="text" id="mname" name="mname" required>
        <label for="maddress">Manufacturer Address:</label>
        <input type="text" id="maddress" name="maddress" required>
        <label for="mcontact">Contact No:</label>
        <input type="text" id="mcontact" name="mcontact" required>
        <input type="submit" value="Add Manufacturer" name="btnsubmit">
    </form>

        <!-- Second Form: Product Information -->
        <form action="" method="post">
            <label for="pname">Product Name:</label>
            <input type="text" name="pname" id="pname" required>

            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required>

            <label for="manuname">Manufacturer Name:</label>
            <select name="manuname" id="manuname">
                <?php
                    $menuf = $connt->query("SELECT id, name FROM manufacturer");
                    while ($row = $menuf->fetch_row()) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                    }
                ?>
            </select>

            <div class="sumbmit">
             <input type="submit" name="btnsub" value="Submit">
           </div>
        </form>

        <!-- Third Form: Delete Information -->
        <form action="" method="post">
            <div class="inputBox">
                <label for="manunam">Manufacturer Name:</label>
                <label for="manuname">Manufacturer Name:</label>
            <select name="manuname" id="manuname">
                <?php
                    $menuf = $connt->query("SELECT id, name FROM manufacturer");
                    while ($row = $menuf->fetch_row()) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                    }
                ?>
            </select>
            </div>

            <div class="btn">
                <input  type="submit" value="Delete" name="delBtn">
            </div>
        </form>

        <!-- Product Display Table -->
        <h1>Product Display</h1>
        <table>
            <tr>
                <th>Manufacturer Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Address</th>
                <th>Contact</th>
            </tr>
            <?php
                $dis = $connt->query("SELECT m.name AS manufacturer_name, p.product_name, p.price, m.address, m.contact FROM products p JOIN manufacturer m ON p.manufacturer_id = m.id WHERE p.price > 5000");
                while ($row = $dis->fetch_row()) {
                    echo "
                    <tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div>

</body>
</html>
