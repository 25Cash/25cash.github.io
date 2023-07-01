<?php 
session_start();
include '../conn.php';
if (!empty($_SESSION['logged'])) {
}else {
    // echo"<script>alert('Please login first').window.location.href='../sign/login.php'</script>";
    header('location:../sign/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div class="left-nav">
        <nav>
            <a href="index.php">Home</a>
            <a href="#">News</a>
            <a href="#">Contact</a>
            <a href="#">About</a>
            <a href="product.php">Data-Entry</a>
            <a href="../sign/logout.php">Logout</a>
        </nav>
    </div>
    <div class="body">
        <div class="nav">
            <h3>You are logged in <?=$_SESSION['username'];?></h3>
        </div>
    </div>
</body>
</html>