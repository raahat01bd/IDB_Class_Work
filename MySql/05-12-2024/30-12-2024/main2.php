<?php 
$connt=mysqli_connect("localhost","root","","thirty_one_dec");
if(isset($_POST['btnsubmit'])){
    $name=$_POST["mname"];
    $add=$_POST["maddress"];
    $con=$_POST["mcontact"];
    $connt->query("CALL insert_manufacturer('$name','$add','$con')");
}
if(isset($_POST['btnsub'])){
    $pname=$_POST["pname"];
    $price=$_POST["price"];
    $cont=$_POST["manuname"];
    $connt->query("CALL insert_product('$pname','$price','$cont')");
        if($price>5000){
            header("location:main2.php");
        }
}
if(isset($_POST['delBtn'])) {
    $id = $_POST['manuname'];
    $connt->query("delete from manufacturer where id=$id");
    //   header("location: display.php");
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
    <h2>Add Manufacturer</h2>
    <form action="" method="post">
        <label for="mname">Manufacturer Name:</label>
        <input type="text" id="mname" name="mname" required>
        <label for="maddress">Manufacturer Address:</label>
        <input type="text" id="maddress" name="maddress" required>
        <label for="mcontact">Contat_No:</label>
        <input type="text" id="mcontact" name="mcontact" required>
        <input type="submit" value="Add Manufacturer" name="btnsubmit">
    </form>

        <!-- Second Form: Product Information -->
        <form action="" method="post">
            <label for="pname">Product Name:</label>
            <input type="text" name="pname" id="pname" required>

            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required>

            <label for="manuname">Manufacturer Name:</label>
            <select name="manuname" id="manuname">
                <?php
                    $connt=mysqli_connect("localhost", "root", "", "thirty_one_dec");
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
                <label for="brandName">Manufacturer Name:</label>
                <select name="manuname" id="manuname">
                <?php
                    $connt=mysqli_connect("localhost", "root", "", "thirty_one_dec");
                    $menuf=$connt->query("SELECT * FROM manufacturer");
                    while(list($id, $name) = $menuf->fetch_row()){
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
                <th>Manufacturer Name</th>
                <th>Product Name</th>
                <th>Price</th>
              
            </tr>
            <?php
                $connt = mysqli_connect("localhost", "root", "", "thirty_one_dec");
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