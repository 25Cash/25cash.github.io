<?php 
include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/account.css">
	<title>Login or sign up</title>
</head>
<body>
<div class="main">
		<div class="holder">
		<div class="login">
			<span>Sign in here</span>
			<form method="POST">
				<input type="text" name="username" placeholder="Enter username">
				<input type="password" name="password" placeholder="Enter password">
				<p>Don't have account? <a href="account.php">Register</a></p>
				<button name="login">Sign in</button>
			</form>
			<?php 
			if (isset($_POST['login'])) {
				$username=$_POST['username'];
				$password=$_POST['password'];
				if (!empty($username)) {
					if (!empty($password)) {
						$login=mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password'");
						if (mysqli_num_rows($login) > 0) {
							header('location: index.php');
							session_start();
							$_SESSION['username']=$username;
						}
						else{
							echo "failure";
						}
					}
					else{
						echo "<script>alert('Enter password please')</script>";
					}
				}
					else{
						echo "<script>alert('Enter username please')</script>";
					}
			}
			?>
		</div>
	</div>
</div>
</body>
</html>