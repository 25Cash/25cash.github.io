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
    <title>Homepage</title>
</head>
<body>
    <div class="left-nav">
        <nav>
        <a href="home.php">Home</a>
        <a href="trade.php">Trade</a>
        <a href="trainee.php">Trainees</a>
        <a href="marks.php">marks</a>
        </nav>
        <button>Logout</button>
    </div>
    <div class="body">
        <div class="nav-bar">
            <h4><?=$_SESSION['username'];?></h4>
            <div class="dropdown">
                <span>Settings</span>
                <div class="deep-dropdown">
                    <a href="#">View account</a>
                    <a href="#">Edit account</a>
                </div>
            </div>
        </div>
        <div class="bode">
        <div class="holder">
            users:<p><?=$fetch_users?></p>
        </div><br>
        <div class="holder">
            trades:<p><?=$fetch_trainee?></p>
        </div><br>
        <div class="holder">
            users:<p><?=$fetch_trade?></p>
        </div>
    </div>
    </div>
</body>
</html>