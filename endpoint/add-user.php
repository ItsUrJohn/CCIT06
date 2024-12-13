<?php
include ('../db.php');

if (isset($_POST['add'])) {
    $firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
    $lasttName = mysqli_real_escape_string($conn,$_POST['lastName']);
    $contactNumber = mysqli_real_escape_string($conn,$_POST['contactNumber']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $sql = "INSERT INTO tbl_user (first_name, last_name, contact_number, email) VALUES ('$firstName', '$lasttName', '$contactNumber', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "Succesfully added";
 }else{
    echo "Something went wrong";
 }
}
?>