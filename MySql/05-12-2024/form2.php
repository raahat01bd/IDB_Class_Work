<?php 
    $db = mysqli_connect("localhost", "root", "", "new_database");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            width: 80%;
            max-width: 900px;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        td {
            border-bottom: 1px solid #ddd;
        }

        caption {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            color: #333;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }
        }

    </style>
</head>
<body>

    <table>
        <caption>Users Data</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = $db->query("SELECT * FROM users");
            while(list($_id, $_name, $_email, $_phone) = $users->fetch_row()) {
                echo "<tr>
                    <td>$_id</td>
                    <td>$_name</td>
                    <td>$_email</td>
                    <td>$_phone</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
