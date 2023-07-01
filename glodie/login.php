<?php 
	session_start();
	
	include ('connect.php');


	
	if(isset($_POST['send'])){
		$uname = $_POST['username'];
		$pw = $_POST['password'];

		$qry = mysqli_query($con, "SELECT * FROM users WHERE u_name = '$uname' AND u_password = '$pw'");

		if(mysqli_num_rows($qry) > 0){
			$_SESSION['logged'] = $uname;
			echo '<script>
					alert("Login Succesfull!")
					window.location. href="retrDonation.php"
				</script>';
		} else {

			echo '<script>
					alert("User not found!");
				</script>';
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>kainefc</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body class="form">
	<div class="form">
		<h1>Login - kainefc</h1>
		<form method="POST" action="login.php">
			<label>Username: </label>
			<input type="text" required placeholder="Enter Your Username" name="username">
			<br><br>
			<label>Password: </label>
			<input type="password" required placeholder="Enter Your Password" name="password">
			<br>
			<span>Don't Have Account? <a href="index.php">Signup Here</a></span>
			<br>
			<button type="submit" name="send">Log In</button>
		</form>
	</div>
</body>
</html>