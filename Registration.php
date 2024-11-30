<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password_confirm'];

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
	      <?php

		if(isset($_SESSION['status'])) 
		{  ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong> Hey!!</strong> <?php echo $_SESSION['status']; ?>
		  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php 
  		unset($_SESSION['status']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styleregister.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	 <header>
		<h2 class="Logo">Logo</h2>
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