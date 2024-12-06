<?php
session_start();
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare('SELECT id, password_hash FROM users WHERE username = ?');
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $passwordHash);
            $stmt->fetch();
            if (password_verify($password, $passwordHash)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username; // Optional: Store username for personalization
				$_SESSION['status'] = "Login Succesfully";
                header("Location: dashboard.php"); // Redirect to dashboard
                exit;
            } else {
				$_SESSION['status'] = "The Password & Username does not Match";
            }
        } else {
			$_SESSION['status'] = "User Not Found";
        }
        $stmt->close();
    } else {
		$_SESSION['status'] = "Something Went Wrong";
    }
}
?>
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
	background: url(image/sasuke-uchiha-3840x2160-11023.png) no-repeat;
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
	color: rgb(1, 2, 21);
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
	font-size: 1em;
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
	color: #000000;
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
	background: #2b2d2e;
	border-radius: 6px;
	cursor: pointer;
	font-size: 1em;
	color: #fff;
	font-weight: 500;
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
		<h2 class="Logo">Logo</h2>
	 </header>
	<div class="wrapper">
		<div class="form-box login">
			<h2>Login</h2>
			<form method="POST">
				<div class="input-box">
					<span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
					<input type="text" name="username" required>
					<label>Username</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
					<input type="password" name="password" required>
					<label>Password</label>
				</div>
				<div class="remember-forgot">
					<label method="POST"><input type="checkbox">Remember Me</label>
					<a href="Registration.php">Register Here</a>
				</div>
				<button type="submit" class="btn">Login</button>
			</form>
		</div>
	</div>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
