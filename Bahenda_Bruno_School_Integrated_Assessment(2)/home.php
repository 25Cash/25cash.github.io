<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/logo.png">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <base href="#">
</head>
<body>
    <div class="home">
        <div class="nav">
                <img src="image/logo.png" alt=""><h1>Kaine fc.</h1>
                <div class="links">
                <a href="home.php">Home</a>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
                </div>
                    <button onclick="window.location.replace('register.php')">Sign up</button>
                    <button onclick="window.location.replace('login.php')">Sign in</button>

        </div>
            <div class="left">
                <a href="">FERWAFA</a>
                <a href="">FIFA</a>
                <a href="">MINISANTE</a>
            </div>
            <div class="center">
                <p><span>President:</span> Jeff MUHINYUZA</p>
                <p><span>Manager:</span> Derek GATO</p>
                <p><span>Secretary:</span> Jeanne KAYITERA</p>
                <p><span>Captain:</span> Rico PIE</p>
                <p><span>Accountant:</span> Monday CHRITO</p>
            </div>
            <div class="right">
                <img src="image/ball.png" alt="">
                <h1>Announcement</h1>
                <p>Club fans meeting on 6<sup>th</sup>July 2023. at Mariot Hotel</p>
            </div>
    </div>
</body>
</html>

<style>
    body{
        overflow: hidden;
    }
</style>