<?php 
session_start();
require_once 'db.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

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
<body class="bg-dark">
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-5" href="dashboard.php">
                <img src="image/img.jpg" alt="Logo" height="50  px">
        </a>
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
    <div class="row mt-5">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header">
                    <h2 class="display-6 text-center">Admin Account</h2>   
                </div>
                <div class="card-body">
                    <table class="table table-border text-center">
                        <tr class="bg-dark text-white">
                            <td>UserId</td>
                            <td>Username</td>
                            <td>Password</td>
                            <td>Edit</td>
                            <td>Delete</td>

                        </tr>
                        <tr>
                            <?php 
                            while($row = mysqli_fetch_assoc($result)) {

                                ?>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['password_hash'];?></td>
                                <td><a href="Actions/edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a></td>
                                <td><a href="Actions/delete.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Delete</a></td>
                            </tr> 
                                <?php

                            } 
                            ?>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Js -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>