<?php
$db = mysqli_connect("localhost", "root", "", "fourteen_dec");

// Insert Brand Data into the brand table
if (isset($_POST["btnSubmit"])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    
    // Ensure the stored procedure is called correctly.
    $db->query("CALL brand('$name', '$contact')");
}

// Insert Product Data into product table
if (isset($_POST["btnProduct"])) {
    $bname = $_POST['bname'];
    $bprice = $_POST['bprice'];
    $manufac = $_POST['manufac'];
    
    // Insert product data into the product table
    $db->query("INSERT INTO product (name, price, brand_id) VALUES ('$bname', '$bprice', '$manufac')");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form label {
            font-weight: bold;
            margin-right: 10px;
        }

        form input, form select {
            padding: 8px;
            margin: 8px 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
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
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #333;
        }

        /* Add a small margin to sections */
        section {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <!-- Insert Brand Form -->
    <section>
        <h1>Insert Brand</h1>
        <form action="" method="post">
            <label for="name">Brand Name :</label>
            <input type="text" name="name" required><br>

            <label for="contact">Contact :</label>
            <input type="text" name="contact" required><br>

            <button type="submit" name="btnSubmit">Submit</button>
        </form>
    </section>

    <br><br><br>

    <!-- Insert Product Form -->
    <section>
        <h1>Product Table</h1>
        <form action="" method="post">
            <label for="bname">Product Name :</label>
            <input type="text" name="bname" required><br>

            <label for="bprice">Price :</label>
            <input type="number" name="bprice" required><br>

            <label for="manufac">Brand:</label>
            <select name="manufac" required>
                <?php 
                $manufac = $db->query("SELECT * FROM brand");
                while (list($_bid, $_bname) = $manufac->fetch_row()) {
                    echo "<option value='$_bid'>$_bname</option>";
                }
                ?>
            </select><br>

            <button type="submit" name="btnProduct">Submit</button>
        </form>
    </section>

    <br><br><br>
    
    <!-- View Product Details -->
    <h3>Product Details</h3>
    <table>
        <tr>
            <th>S/N</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Brand Name</th>
            <th>Contact</th>
        </tr>

        <?php 
        // Fetch product details by joining with brand information
        $products = $db->query("SELECT p.name, p.price, b.name as brand_name, b.contact FROM product p JOIN brand b ON p.brand_id = b.id");
        $serial = 1;
        
        while ($row = $products->fetch_assoc()) {
            echo "<tr>
                    <td>" . $serial++ . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['price'] . "</td>
                    <td>" . $row['brand_name'] . "</td>
                    <td>" . $row['contact'] . "</td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
