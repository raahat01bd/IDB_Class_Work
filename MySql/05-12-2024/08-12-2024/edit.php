<?php
$db = mysqli_connect("localhost", "root", "", "idb");
// Edit Page Logic
if (isset($_GET['editid'])) {
    $id = $_GET['editid'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);

    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];

    if (isset($_POST['edit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sqlup = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";
        if (mysqli_query($db, $sqlup) == true) {
            header("Location: main.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 8px 0 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h2>Edit User</h2>
        <label for="id">ID</label>
        <input type="number" name="id" value="<?php echo $id; ?>" readonly><br>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>"><br>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br>
        <label for="phone">Phone</label>
        <input type="number" name="phone" value="<?php echo $phone; ?>"><br><br>
        <input type="submit" value="Confirm" name="edit"><br>
    </form>
</body>

</html>