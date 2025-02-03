<?php 

    $db =  mysqli_connect("localhost", "root", "", "student_info");
    if (isset($_GET['deleteid']))
    {
        $delete_id = $_GET['deleteid'];

        $sql = "DELETE FROM user WHERE id = $delete_id";
        if(mysqli_query($db, $sql) == True)
        {
            header("Location:form.php");
        }
    }

?>

<table border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>

    </tr>
    <?php 
     $user = $db -> query("select * from user");
     while(list($_id, $_name, $_email) = $user -> fetch_row())
     {
        echo "
        <tr>
        <td>$_id</td>
        <td>$_name</td>
        <td>$_email</td>
        <td><a href='form.php?deleteid=$_id'>Delete</a></td>

        

    </tr>";
     }
    
    ?>
</table>
