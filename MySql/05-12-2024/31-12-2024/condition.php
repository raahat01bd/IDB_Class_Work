<?php 
$connt = mysqli_connect("localhost", "root", "", "thirty_one_dec");

if (isset($_POST['btnsubmit'])) {
    $name = $_POST["mname"];
    $add = $_POST["maddress"];
    $con = $_POST["mcontact"];
    $connt->query("CALL insert_manufacturer('$name', '$add', '$con')");

    if ($price > 5000) {
        header("location:condition.php");
    }
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
    <title>Products Above 5000</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #2C3E50, #4CA1AF);
            color: #333;
            box-sizing: border-box;
        }

        .container {
            width: 90%;
            margin: 40px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        h1 {
            color: #2980B9;
            text-align: center;
            margin-bottom: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 14px;
            text-align: left;
            font-size: 16px;
        }

        table th {
            background-color: #2980B9;
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
            background-color: #e1e1e1;
        }

        .btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn input {
            background-color: #E74C3C;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn input:hover {
            background-color: #C0392B;
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

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
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
