<?php 
	include ('connect.php');
	?>
	<?php

	if(isset($_POST['send'])){
		$uname = $_POST['username'];
		$pw = $_POST['password'];
		$qry = mysqli_query($con, "INSERT INTO users VALUES ('','$uname','$pw', '')");
		if($qry){
			echo '<script>
					alert("Account Created Succesfully!")
					window.location.href="login.php";
				</script>';
		} 
	}else {
			echo '<script>alert("Account Is Not Created Succesfully!")</script>';
		
	
?><?php
}?>
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
		<h1>Sign Up - kainfc</h1>
		<form method="POST" action="">
			<label>Username: </label>
			<input type="text" required placeholder="Enter Your Username" name="username">
			<br><br>
			<label>Password: </label>
			<input type="password" required placeholder="Enter Your Password" name="password">
			<br>
			<span>Have Account? <a href="login.php">Login Here</a></span>
			<br>
			<button type="submit" name="send">Sign Up</button>
		</form>
	</div>
</body>
</html>