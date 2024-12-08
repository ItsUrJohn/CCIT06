<?php
include ('../db.php');
?>


<?php 
 if(isset($_POST['id']))
 {
    $stmt = $conn->prepare("UPDATE `first_name`, `last_name`, `contact_number`, `email` FROM `tbl_user` WHERE `first_name` = ? AND `last_name` = ? AND `contact_number` = ? AND `email` = ? WHERE id = '$id' ");
    $stmt->bind_param("ss", $firstName, $lastName);
    $stmt->execute();
    $nameExist = $stmt->get_result()->fetch_assoc();{

    $UserID = $_POST['tbl_user_id'];
    $FirstName = $_POST['first_name'];
    $LastName = $_POST['last_name'];
    $ContactNumber = $_POST['contact_number'];
    $Email = $_POST['email'];
    }
        header("Location: reviews.php");
}			
    ob_end_flush();

?>

