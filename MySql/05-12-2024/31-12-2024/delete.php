<?php 
$connt = mysqli_connect("localhost", "root", "", "thirty_one_dec");

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
    <title>Delete Manufacturer</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #4CAF50, #1D8348);
            color: #333;
        }

        .container {
            width: 85%;
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2C3E50;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #2980B9;
        }

        select {
            width: 80%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f1f1f1;
        }

        .btn {
            display: flex;
            justify-content: center;
            width: 100%;
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

            h2 {
                font-size: 24px;
            }

            select {
                width: 90%;
                font-size: 14px;
            }

            .btn input {
                font-size: 14px;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Delete Manufacturer</h2>
        <form action="" method="post">
            <label for="manuname">Select Manufacturer to Delete:</label>
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
    </div>

</body>
</html>
