<?php 
session_start();
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php

    if(isset($_SESSION['status'])) 
    {  ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> Bossing!!</strong> <?php echo $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php 
  unset($_SESSION['status']);
}
?>
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleuser.css">
    <title>Document</title>
</head>
<body>
    <table border="1">
            <td>User_Id</td>
            <td>Fullname</td>
            <td>email</td>
            <td>Time created</td>
            <td>Actions</td>
            <?php 
            $conn = mysqli_connect("Localhost","root"  ,"" ,   'ccit06');
            ?>

        <?php 
        $query = $conn->query("SELECT * FROM services");
        while( $data = mysqli_fetch_array($query) ) {
        ?>
        <tr>
         <td> <?php echo $data['id']?></td>
         <td> <?php echo $data['fullname']?></td>
         <td> <?php echo $data['email']?></td>
         <td> <?php echo $data['created_at']?></td>
         </td>
        </tr>
    <?php
        }
        ?>
    </table>
</body>
</html>