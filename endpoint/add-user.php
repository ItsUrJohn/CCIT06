<?php
include ('../db.php');

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$contactNumber = $_POST['contact_number'];
$email = $_POST['email'];


try {
    $stmt = $conn->prepare("SELECT `first_name`, `last_name` FROM `tbl_user` WHERE `first_name` = ? AND `last_name` = ?");
    $stmt->bind_param("ss", $firstName, $lastName);
    $stmt->execute();
    $nameExist = $stmt->get_result()->fetch_assoc();

    if (empty($nameExist)) {
        $conn->begin_transaction();
        $insertStmt = $conn->prepare("INSERT INTO `tbl_user` (`tbl_user_id`, `first_name`, `last_name`, `contact_number`, `email`,) VALUES (NULL, ?, ?, ?, ?, ?)");
        $insertStmt->bind_param("ssisi", $firstName, $lastName, $contactNumber, $email, $username);
        $insertStmt->execute();
    }
        } catch (Exception $e) {
    // Handle the exception


        echo "
        <script>
            alert('Registered Successfully');
            window.location.href = 'http://localhost/CCIT06/dashboard.php';
        </script>
        ";

        $conn->commit();
    }

?>