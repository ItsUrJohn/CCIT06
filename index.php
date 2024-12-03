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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>LoginPage</title>
</head>
<body>
<h2>Sign in/up Form</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="username" name='username' placeholder="Username" required />
			<input type="password" name='password' placeholder="Password" required />
			<input type="password" name='password_confirm' placeholder="Confirm Password" required />
			<button>Sign Up</button>
		</form>
	</div>
   <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
	<div class="form-container sign-in-container">
		<form method="POST">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type='text' name='username' placeholder="Username" required />
			<input type='password' name='password' placeholder="Password"required />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
		- Read how I created this and how you can join the challenge
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
	</p>
</footer>
<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</body>
</html>