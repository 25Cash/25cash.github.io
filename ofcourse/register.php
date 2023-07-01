<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>login form</title>
</head>
<body>
	<div class="reg">
		<form method="POST" action="">
		<h4>Register</h4>
	<input type="text" name="username" placeholder="username">
	<input type="password" name="password" placeholder="password">
	<!-- <input type="submit" name="submit"><br> -->
	<button name="submit" class="btn">Register</button>
</form>

</div>

</body>
</html>
<?php 
if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];

    $ins=mysqli_query($con,"INSERT INTO users VALUES('','$username','$password')");
    if($ins){

    echo "user inserted";

    }
    else{
    	echo "failed to insert";
    }


}
?>