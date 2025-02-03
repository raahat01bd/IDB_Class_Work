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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #FF6347, #FF9966);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            box-sizing: border-box;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        h1 {
            color: #2C3E50;
            text-align: center;
            margin-bottom: 40px;
            font-size: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #f9f9f9;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2980B9;
            color: white;
            font-weight: 600;
        }

        td {
            background-color: #f1f1f1;
            color: #333;
        }

        tr:nth-child(even) td {
            background-color: #f7f7f7;
        }

        tr:hover td {
            background-color: #f39c12;
            color: white;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }

            th, td {
                font-size: 14px;
            }

            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
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
    </div>

</body>
</html>
