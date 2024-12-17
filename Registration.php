<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password_confirm'];
	$erorrs = array();
	if(empty($username) OR empty($password) OR empty($passwordConfirm)) {
		array_push($erorrs,"All feilds are required");
	}
	if(strlen($password) < 8) {
	array_push($erorrs,"Password must 8 charactes long");
	}
    if ($password !== $passwordConfirm) {
        die('Passwords do not match.');
	}

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare('INSERT INTO users (username, password_hash) VALUES (?, ?)');
    if ($stmt) {
        $stmt->bind_param('ss', $username, $passwordHash);
        if ($stmt->execute()) {
            $_SESSION['status'] = 'Register Succesfully!!';
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Statement preparation failed!";
    }
}
?>
<style>
	*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: serif;
	}
	body{
	display: flex;
	justify-content: center;
	align-content: center;
	min-height: 100vh;
	background: url(image/register.jpg) no-repeat;
	background-size: cover;
	background-position: center;
	align-items: center;
	z-index: 99;
}
header{
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	padding: 20px 100px;
	background: none;
}
.Logo{
	font-size: 2em;
	color: #fff;
	user-select: none;
}
.wrapper{
	position: relative;
	width: 400px;
	height: 440px;
	background: transparent;
	border: 2px solid rgba(255, 255, 255, .5);
	border-radius: 20px;
	backdrop-filter: blur(20px);
	box-shadow: 0 0 30px rgba(0, 0, 0, .5);
	display: flex;
	justify-content: center;
	align-items: center;
}
.wrapper .form-box{
	width: 100%;
	padding: 40px;
}
.form-box h2{
	font-size: 2em;
	color: rgb(235, 235, 238);
	text-align: center;
}
.input-box{
	position: relative;
	width: 100%;
	height: 50px;
	border-bottom: 2px solid rgb(100, 89, 89);
	margin: 30px 0;
}
.input-box label{
	position: absolute;
	top: 50%;
	left: 5px;
	transform: translateY(-50%);
	font-size: 1em;
	color: #000000;
	font-weight: 500;
	pointer-events: none;
	transition: .5s;
}
.input-box input:focus~label,
.input-box input:valid~label {
	top: -5px;
}
.input-box input{
	width: 100%;
	height: 100%;
	background: transparent;
	border: none;
	outline: none;
	font-size: 1em;
	color: #fff;
	font-weight: 600;
	padding: 0 35px 0 5px;
}	
.input-box .icon{
	position: absolute;
	right: 8px;
	font-size: 1.2em;
	color: #fff;
	line-height: 57px;
}
.remember-forgot{
	font-size: 1em;
	color: #fff;
	font-weight: 500;
	margin: -15px 0 15px;
	display: flex;
	justify-content: space-between;
}
.remember-forgot label input{
	accent-color: #2b2d2e;
	margin-right: 3px;
}
.remember-forgot a{
	color:rgb(247, 241, 241);
	text-decoration: none;
}
.remember-forgot a:hover{
	text-decoration: underline;
}
.btn{
	width: 100%;
	height: 45px;
	border: none;
	outline: none;
	background:rgb(209, 213, 215);
	border-radius: 6px;
	cursor: pointer;
	font-size: 1em;
	font-weight: 500;
	transition: transform .5s;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	 <header>
		<h2 class="Logo">
			<a href="#">
			<img src="image/logo.png" alt="Logo" height="50  px">
			</a>
		</h2>
	 </header>
	<div class="wrapper">
		<div class="form-box register">
			<h2>Register</h2>
			<form method="POST">
				<div class="input-box">
					<span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
					<input type="username" name="username" required>
					<label>Username</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
					<input type="password" name="password" required>
					<label>Password</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
					<input type="password" name="password_confirm" required>
					<label>Confirm Password</label>
				</div>
				<div class="remember-forgot">
					<label><input type="checkbox">i accept ther Terms</label>
					<a href="Login.php">Login Here</a>
				</div>
				<button type="submit" class="btn">Register</button>
			</form>
		</div>
	</div>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>