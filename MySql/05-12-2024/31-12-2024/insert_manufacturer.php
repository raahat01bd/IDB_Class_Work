<?php 
$connt = mysqli_connect("localhost", "root", "", "thirty_one_dec");

if (isset($_POST['btnsubmit'])) {
    $name = $_POST["mname"];
    $add = $_POST["maddress"];
    $con = $_POST["mcontact"];
    $connt->query("CALL insert_manufacturer('$name', '$add', '$con')");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Manufacturer</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #2980B9, #6BB9F1);
            color: #333;
        }

        .container {
            width: 85%;
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2C3E50;
            text-align: center;
            margin-bottom: 40px;
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
            margin-right: 5px;
        }

        label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #2980B9;
        }

        input[type="text"] {
            width: 80%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f1f1f1;
        }

        input[type="submit"] {
            background-color: #2980B9;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1D6FA5;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            h2 {
                font-size: 24px;
            }

            input[type="text"] {
                width: 90%;
                font-size: 14px;
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
    </div>

</body>
</html>
