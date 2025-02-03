<?php 
$connt=mysqli_connect("localhost","root","","twenty_dec");
if(isset($_POST['btn'])){
    $name=$_POST["name"];
    $add=$_POST["add"];
    $con=$_POST["con"];
    $connt->query("manufacturer('$name','$add','$con')");
}
if(isset($_POST['btnsub'])){
    $pname=$_POST["pname"];
    $price=$_POST["price"];
    $cont=$_POST["brand"];
    $connt->query("product('$pname','$price','$cont')");
        if($price>5000){
            header("location:main.php");
        }
}
if(isset($_POST['delBtn'])) {
    $id = $_POST['brand'];
    $connt->query("delete from n_student where id=$id");
    //   header("location: display.php");
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class_xm</title>
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
        <h1>Class Information Form</h1>

        <!-- First Form: Personal Information -->
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="add">Address:</label>
            <input type="text" name="add" id="add" required>

            <label for="con">Contact:</label>
            <input type="number" name="con" id="con" required>

            <div class="sumbmit">
                <input type="submit" name="btn" value="Submit">
            </div>
        </form>

        <!-- Second Form: Product Information -->
        <form action="" method="post">
            <label for="pname">Product Name:</label>
            <input type="text" name="pname" id="pname" required>

            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required>

            <label for="brand">Brand:</label>
            <select name="brand" id="brand">
                <?php
                    $connt=mysqli_connect("localhost", "root", "", "twenty_dec");
                    $menuf=$connt->query("SELECT * FROM manufacturer");
                    while(list($id, $name) = $menuf->fetch_row()){
                        echo "<option value='$id'>$name</option>";
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
                <label for="brandName">Brand Name:</label>
                <select name="brand" id="brandName" required>
                    <?php
                        $connt=mysqli_connect("localhost", "root", "", "twenty_dec");
                        $manuFac = $connt->query('SELECT * FROM manufacturer');
                        while (list($id, $name) = $manuFac->fetch_row()) {
                            echo "<option value='$id'>$name</option>";
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
                <th>Brand</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Product Name</th>
                <th>Product Price</th>
            </tr>
            <?php
                $connt = mysqli_connect("localhost", "root", "", "twenty_dec");
                $dis = $connt->query("SELECT * FROM display_info");
                while (list($name, $address, $contact, $pname, $price) = $dis->fetch_row()) {
                   
                         echo "
                    <tr>
                        <td>$name</td>
                        <td>$address</td>
                        <td>$contact</td>
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All_Uper</title>
</head>
<style>
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
<body>
     <h1>Product Display</h1>
        <table>
            <tr>
                <th>Brand</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Product Name</th>
                <th>Product Price</th>
            </tr>
            <?php
                $connt = mysqli_connect("localhost", "root", "", "student_info");
                $dis = $connt->query("SELECT * FROM product_v");
                while (list($name, $address, $contact, $pname, $price) = $dis->fetch_row()) {
                   
                         echo "
                    <tr>
                        <td>$name</td>
                        <td>$address</td>
                        <td>$contact</td>
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