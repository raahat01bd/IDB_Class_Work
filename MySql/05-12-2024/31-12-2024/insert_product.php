<?php 
$connt = mysqli_connect("localhost", "root", "", "thirty_one_dec");

if (isset($_POST['btnsub'])) {
    $pname = $_POST["pname"];
    $price = $_POST["price"];
    $cont = $_POST["manuname"];
    $connt->query("CALL insert_product('$pname', '$price', '$cont')");
    if ($price > 5000) {
        header("location:main.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
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
            width: 100%;
            max-width: 800px;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        h2 {
            color: #2C3E50;
            text-align: center;
            margin-bottom: 40px;
            font-size: 24px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        label {
            font-weight: 500;
            margin-bottom: 10px;
            color: #2980B9;
            font-size: 16px;
            text-align: left;
            width: 100%;
        }

        input[type="text"], select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f1f1f1;
        }

        input[type="submit"] {
            background-color: #FF6347;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #FF4500;
        }

        .submit-btn {
            width: 100%;
            text-align: center;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }

            input[type="text"], select {
                font-size: 14px;
                padding: 10px;
            }

            input[type="submit"] {
                font-size: 14px;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
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
    </div>

</body>
</html>
