<!DOCTYPE html>
<?php
include 'connection.php';



?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
<div class="reg"><form method="POST" action="">
		<h4>login</h4>
	<input type="text" name="username" placeholder="username"><br><br>
	<input type="password" name="password" placeholder="password"><br><br>
    <button type="submit" class="btn" name="submit">Login</button>
</form>
</div>

</body>
</html>
<?php 
if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];

    $dog=mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password' ");
    if (mysqli_num_rows($dog)>0) {
    	session_start();
    	$_SESSION['a']=$username;
    	$_SESSION['logged']=true;
    	header('location: index.php');
    }
    else
    {
    echo "failed to login";
    }
}
?>
