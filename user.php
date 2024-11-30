<?php 
session_start();
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
            <td>User_Id</td>
            <td>Username</td>
            <td>Password</td>
            <td>Actions</td>

        <?php 
        $query = $conn ->query ("SELECT * FROM users");
        while( $data = mysqli_fetch_array($query) ) {
        ?>
        <tr>
         <td> <?php echo $data['id']?></td>
         <td> <?php echo $data['username']?></td>
         <td> <?php echo $data['password_hash']?></td>
         <td> 
            <a href="Actions/edit.php?=<?php $data['id']?>"><button type="button">Edit </button>
            </a>
            <a href="Actions/delete.php"><button type="button">Delete </button>
            </a>
         </td>
        </tr>
    <?php
        }
        ?>
    </table>
</body>
</html>