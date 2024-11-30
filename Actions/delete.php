<?php 
     $id = $_GET['id'];

    $conn = mysqli_connect("Localhost","root"  ,"" ,   'ccit06');

    $query = $conn->query("DELETE FROM users WHERE id = '$id'");

    header("location: ../user.php")
?>

