<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Redirect to login page
$_SESSION['status'] = "Logout Succesfully";
header("Location: Login.php");
exit;
?>