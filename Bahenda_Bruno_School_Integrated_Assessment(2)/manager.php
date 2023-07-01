<?php 
session_start(); 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="manager.css">
    <title>Kaine fc</title>
</head>
<body>
<div class="main">
        <div class="nav">
           <div class="left">
             <div class="logo">
               <h1><img src="image/logo.png" alt="">Kaine fc</h1>
             </div>
                <a href="index.php">Dashboard</a>
                <a href="donors_view.php">donors</a>
                <a href="donation_view.php">Donations</a>
           </div>
        </div>
        <div class="center">
            <div class="links">
                <div class="logo">  
                    <div class="navigate">
                        <a href="">Donations</a>
                        <a href="">Donors</a>
                        <button class="submit" onclick="window.location.replace('logout.php');">Logout</button>
                    </div>
                </div>
            </div>
            
        </div>
</div>
</body>
</html>