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
	<link rel="stylesheet" href="stylelogin.css">
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
					<label><input type="checkbox">Remember Me</label>
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
