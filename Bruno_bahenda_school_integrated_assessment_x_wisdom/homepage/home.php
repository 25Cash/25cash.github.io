<?php 
include '../conn.php';
session_start();
$users = mysqli_query($con,"SELECT * FROM users ORDER BY User_id");
$fetch_users=mysqli_num_rows($users);
$trainee = mysqli_query($con,"SELECT * FROM trainees ORDER BY trainee_id");
$fetch_trainee=mysqli_num_rows($trainee);
$trade = mysqli_query($con,"SELECT * FROM trade ORDER BY trade_id");
$fetch_trade=mysqli_num_rows($trade);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/home.css">
    <title>Homepage</title>
</head>
<body>
    <div class="left-nav">
        <nav>
        <a href="home.php">Home</a>
        <a href="#">News</a>
        <a href="#">Contact</a>
        <a href="#">About</a>
        <a href="trade.php">Data entry</a>
        <a href="logout.php" class="log">Logout</a>
        </nav>
    </div>
    <div class="body">
        <div class="nav-bar">
            <h4>You are logged in <?=$_SESSION['username'];?></h4>
        </div>
        <center><div class="center">
            <h2>X_WISDOM TVET SCHOOL</h2>
        </div></center>
        <div class="right">
            <p>School meeting on 6<sup>th</sup> JULY 2023 at bugesera district hall.</p>
        </div>
    </div>
    </div>
</body>
</html>