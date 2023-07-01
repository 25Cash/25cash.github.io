<?php 
include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login or Sign up</title>
	<link rel="stylesheet" type="text/css" href="css/account.css">
    <script>
        function back() {window.history.forward();}
        setTimeout("back()",0);
        window.onunload=function(){null};
    </script>
</head>
<body>
	<div class="main">
		<div class="register">
			<span>Sign up here</span>
			<form method="POST">
				<input type="text" name="username" placeholder="Enter username">
				<input type="password" name="password" placeholder="Enter password">
				<p>Already have account? <a href="login.php">Login</a></p>
				<button name="register">Sign up</button>
			</form>
			<?php 
			if (isset($_POST['register'])) {
				$username=$_POST['username'];
				$password=$_POST['password'];
				if (!empty($username)) {
					if (!empty($password)) {
						$insert=mysqli_query($con,"INSERT INTO users VALUES('','$username','$password')");
						if ($insert) {
							header('location: login.php');
						}
						else{
							header('location: account.php');
							echo "Failure";
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
		</div><br><br><br>
	</div>
</body>
</html>