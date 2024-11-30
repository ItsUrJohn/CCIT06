<?php
$servername = "localhost";
$username = "root"; // Change if different
$password = ""; // Change if you set a password
$database = "ccit06";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
?>