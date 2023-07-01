<?php 
session_start();
include 'connection.php';
if ($_SESSION['logged']==true) {
	header('location:index.php');
}
else{
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Homepage</title>
</head>
<body>
<div class="main">
	<div class="navbar">
		<nav>
			<a href="#">Home</a>
			<a href="login.php">Login</a>
			<a href="register.php">Register</a>
		</nav>
		<button>Logout</button>
	</div>
	<div class="body">
		<h2>Welcome to our page <?php echo $_SESSION['a'];?></h2>
	</div>
</div>
</body>
</html>