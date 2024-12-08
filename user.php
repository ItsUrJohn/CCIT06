<?php 
session_start();
require 'db.php';
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    .main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: rgb(6, 6, 6);
        height: 100vh;
    }

    .login,
    .registration {
        border: 2px solid;
        border-radius: 20px;
        margin: 10px;
        padding: 50px;
        width: 500px;
        max-width: 500px;
        background-color: rgb(123, 118, 118);
    }

    .login-form,
    .registration-form {
        margin-top: 30px;
    }

    .registrationForm {
        font-size: 13px;
        margin-top: -15px;
        color: blue;
        text-decoration: underline;
        text-align: center;
        cursor: pointer;
    }

    .content {
        border: 2px solid;
        border-radius: 10px;
        background-color: rgb(240, 240, 240);
        padding: 20px;
        width: 95%px;
        height: 500px;
        margin-top: -50px;
    }

    #editBtn,
    #deleteBtn {
        font-size: 20px;
        width: 30px;
    }
</style>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-5" href="dashboard.php">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px; margin-left: 80%;">
                <li class="nav-item dropdown" <?php echo $_SESSION["user_id"]; ?>>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        My Account
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="dashboard.php">Home</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                </li>

            </ul>

        </div>
</nav>
      
<!----->
<div class="container">
    <table border="5">
            <td>User_Id</td>
            <td>Username</td>
            <td>Password</td>
            <td>Actions</td>
            <?php 
            $conn = mysqli_connect("Localhost","root"  ,"" ,   'ccit06');
            ?>

        <?php 
        $query = $conn->query("SELECT * FROM users");
        while( $data = mysqli_fetch_array($query) ) {
        ?>
        <tr>
         <td> <?php echo $data['id']?></td>
         <td> <?php echo $data['username']?></td>
         <td> <?php echo $data['password_hash']?></td>
         <td> 
            <a href="Actions/edit.php?id=<?php echo $data['id']?>"><button type="button">Edit </button>
            </a>
            <a href="Actions/delete.php?id=<?php echo $data['id']?>"><button type="button">Delete </button>
            </a>
         </td>
        </tr>
    <?php
        }
        ?>
    </table>
</div>
<!-- Bootstrap Js -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>