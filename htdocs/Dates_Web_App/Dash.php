<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header('location:Login.php');
}
require 'connect.php';
$date=date('l d/m/y');
$result=mysqli_query($con,"SELECT * FROM user ORDER BY id");
$row=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dating</title>
    <base href="#">
    <link rel="stylesheet" href="scss/style.css">
    <script>
    </script>
</head>
<body>
    <div class="dash">
        <div class="sidebar">
            <h1>Dating App</h1>
            <div class="links">
                <a href="">Total Users</a>
                <a href="">Add a user</a>
                <a href="">Settings</a>
                <a href="">Report</a>
            </div>
            <div class="log">
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <div class="left-dash">
            <div class="nav">
                <div class="session">
                    <h3>Welcome,<img src="" alt=""> <?= $_SESSION['username'];?></h3>
                </div>
                <div class="dating">
                    <p>Date Me!</p>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48"><path fill="#455a64" d="M9,44v-5H4l2-2h5c0,0,0,3.3,0,5L9,44z M9,34l-2,2h5v5l2-2v-5H9z"/><path fill="#78909c" d="M35,13l7-7"/><path fill="#b0bec5" d="M35,14c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l7-7c0.4-0.4,1-0.4,1.4,0s0.4,1,0,1.4l-7,7 C35.5,13.9,35.3,14,35,14z"/><path fill="#ff3d00" d="M37.9,24.2c1.3-1.5,2.1-3.4,2.1-5.6c0-4.8-4-8.7-8.9-8.7c-3.6,0-6.7,2-8.1,5c-1.4-3-4.5-5-8.1-5 C10,10,6,13.9,6,18.7c0,2.2,0.9,4.3,2.3,5.8l0,0l0.1,0.1C15.8,33,23,38,23,38S30.5,33,37.9,24.2L37.9,24.2z"/><path fill="#bf360c" d="M27,24c0,1.7-1.3,3-3,3s-3-1.3-3-3s1.3-3,3-3S27,22.3,27,24z"/><path fill="#b0bec5" d="M25,24c0,0.6-0.4,1-1,1s-1-0.4-1-1s0.4-1,1-1S25,23.4,25,24z"/><path fill="#455a64" d="M44,4l-6,2v3l1,1h3L44,4z"/><g><path fill="#78909c" d="M5.5,42.5L24,24"/><path fill="#b0bec5" d="M1.7 32.3H27.9V34.3H1.7z" transform="rotate(-45.001 14.75 33.25)"/></g></svg>
                </div>
            </div>
        </div>
        <div class="users">
            <div class="total">
                <h3><?= $row?></h3>
                <span>Total users</span>
            </div>
            <div class="total">
                <h3><?= $row?></h3>
                <span>Total users</span>
            </div>
            <div class="time">
                <div class="label">
                <h3>Date</h3>
            </div>
            <div class="real_time">
                <span><?=$date;?></span>
            </div>
            </div>
        </div>
    </div>
</body>
</html>