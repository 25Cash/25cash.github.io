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
    <link rel="stylesheet" href="don.css">
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
                <a href="create.php">Add record</a>
                <a href="donors_view.php">donors records</a>
                <a href="donation_view.php">Donations records</a>
                <a href="report.php">Report</a>
           </div>
        </div>
        <div class="center">
            <div class="links">
                <div class="logo">  
                    <div class="navigate">
                        <a href="">Report</a>
                        <a href="">Donations</a>
                        <a href="">Donors</a>
                        <button class="submit" onclick="window.location.replace('logout.php');">Logout</button>
                    </div>
                </div>
            </div>
        <div class="bottom">
            <h2 style="color:#fff;margin-bottom:10px;"><center>Donor registry form</center></h2>
            <form action="donors.php" method="post">
                <label for="">Firstname</label><br>
                <input type="text" name="fname" placeholder="Enter first name"><br>
                <label for="">Lastname</label><br>
                <input type="text" name="lname" placeholder="Enter last name"><br>
                <label for="">Email</label><br>
                <input type="email" name="email" placeholder="Enter your email"><br>
                <label for="">Date</label><br>
                <input type="date" name="date" id=""><br>
                <input type="radio" name="gender" id="" value="female"><span>Female</span>
                <input type="radio" name="gender" id="" value="male"><span>Male</span>
                <div class="btn">
                    <button type="submit" name="reg">Register</button>
                    <button type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>