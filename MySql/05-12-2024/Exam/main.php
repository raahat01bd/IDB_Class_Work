<?php 
$connt = mysqli_connect("localhost", "root", "", "thirty_one_dec");
if (isset($_POST['btnsubmit'])) {
    $name = $_POST["mname"];
    $add = $_POST["maddress"];
    $con = $_POST["mcontact"];
    $connt->query("CALL insert_manufacturer('$name', '$add', '$con')");
}

if (isset($_POST['btnsub'])) {
    $pname = $_POST["pname"];
    $price = $_POST["price"];
    $cont = $_POST["manuname"];
    $connt->query("CALL insert_product('$pname', '$price', '$cont')");
    if ($price > 5000) {
        header("location:main.php");
    }
}

if (isset($_POST['delBtn'])) {
    $id = $_POST['manuname'];
    $connt->query("DELETE FROM manufacturer WHERE id=$id");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #00bcd4, #2196f3);
            color: #333;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #eee;
        }

        h1, h2 {
            color: #2196f3;
            font-weight: 700;
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
        }

        /* Form Styles */
        form {
            margin: 20px 0;
            padding: 30px;
            background-color: #f1f1f1;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        form label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            color: #007BFF;
        }

        form input, form select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        form input[type="submit"], .btn input {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            padding: 14px 20px;
            font-size: 16px;
            border-radius: 8px;
            text-align: center;
        }

        form input[type="submit"]:hover, .btn input:hover {
            background-color: #0056b3;
        }

        .btn, .submit-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 14px;
            text-align: left;
            font-size: 16px;
        }

        table th {
            background-color: #007BFF;
            color: white;
            font-weight: 600;
        }

        table td {
            border-bottom: 1px solid #ddd;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .btn input {
            background-color: #dc3545;
            padding: 12px 24px;
            font-size: 16px;
            text-align: center;
        }

        .btn input:hover {
            background-color: #c82333;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            table th, table td {
                font-size: 14px;
                padding: 10px;
            }

            form input, form select {
                font-size: 14px;
                padding: 10px;
            }

            form input[type="submit"], .btn input {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Product Management System</h1>

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

        <h2>Add Product</h2>
        <form action="" method="post">
            <label for="pname">Product Name:</label>
            <input type="text" name="pname" id="pname" required>

            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required>

            <label for="manuname">Manufacturer Name:</label>
            <select name="manuname" id="manuname">
                <?php
                    $menuf = $connt->query("SELECT * FROM manufacturer");
                    while(list($id, $name) = $menuf->fetch_row()){
                        echo "<option value='$id'>$name</option>";
                    }
                ?>
            </select>

            <div class="submit-btn">
                <input type="submit" name="btnsub" value="Submit Product">
            </div>
        </form>

        <h2>Delete Manufacturer</h2>
        <form action="" method="post">
            <label for="manuname">Manufacturer Name:</label>
            <select name="manuname" id="manuname">
                <?php
                    $menuf = $connt->query("SELECT * FROM manufacturer");
                    while(list($id, $name) = $menuf->fetch_row()){
                        echo "<option value='$id'>$name</option>";
                    }
                ?>
            </select>

            <div class="btn">
                <input type="submit" value="Delete Manufacturer" name="delBtn">
            </div>
        </form>

        <h1>Product Details</h1>
        <table>
            <tr>
                <th>Manufacturer Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Address</th>
            </tr>
            <?php
                $menuf = $connt->query("SELECT * FROM product_details");
                while(list($name, $pname, $price, $add) = $menuf->fetch_row()){
                    echo "<tr>
                        <td>$name</td>
                        <td>$pname</td>
                        <td>$price</td>
                        <td>$add</td>
                    </tr>";
                }
           ?>
        </table>

        <h1>Products Above 5000</h1>
        <table>
            <tr>
                <th>Manufacturer ID</th>
                <th>Product Name</th>
                <th>Price</th>
            </tr>
            <?php
                $dis = $connt->query("SELECT * FROM productsAvobe5000");
                while (list($name, $pname, $price) = $dis->fetch_row()) {
                    echo "
                    <tr>
                        <td>$name</td>
                        <td>$pname</td>
                        <td>$price</td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div>

</body>
</html>
