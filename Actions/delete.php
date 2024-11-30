<?php 
session_start();
     $id = $_GET['id'];

    $conn = mysqli_connect("Localhost","root"  ,"" ,   'ccit06');

    $query = $conn->query("DELETE FROM users WHERE id = '$id'");

    $_SESSION['status'] = "Succesfully deleted";
    header("location: ../user.php")
?>

