<?php
include"connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="body">
    <form action="">
        <center><h1>Login</h1></center>
        <div class="inputs">
        <input type="text" placeholder="Enter your names"><br>
        <input type="password" placeholder="Enter your password"><br>
        <input type="submit" name="send"><input type="reset" name="cancel">
        </div>
        
    </form><?php 
        if (isset($_POST['send'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (!empty($username)) {
                if (!empty($password)) {
                    $insert = mysqli_query($con,"SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");
                    if (mysqli_num_rows($insert) > 0) {
                        session_start();
                        $_SESSION['username']=$_POST['username'];
                        // echo "Success";
                        // header('Location: ../homepage/home.php');
                        echo"<script>alert('Logged successfull');window.location.href='dashboard.php';</script>";
                    }else{
                        echo"<script>alert('Login failure');window.location.href='login.php';</script>";
                    }
                }
                else{
                    echo "<script>alert('Fill a password please')</script>";
                }
            }
            else {
                echo "<script>alert('Fill a username please')</script>";
            }
        }
        ?>
</div>
</body>
</html>
<style>
    *{
        padding:0;
        margin:0;
    }
    .body{
        width:100%;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    form{
        width:30%;
        height:300px;
        box-shadow:0 0 19px grey;
    }
    input[type=text],[type=password]{
        width:80%;
        height:40px;
        margin:30px 10px 10px 30px;
        border:none;
        border-bottom:2px solid rgb(0,0,36);
    }
    .inputs{
        width:100%;
        height:87%;
        /* border:1px solid grey; */
    }
    input[type=submit],[type=reset]{
        width:35%;
        height:50px;
        background:rgb(0,0,36);
        border:none;
        color:white;
        font-weight:bold;
        margin:20px 10px 10px 35px;
    }
</style>
</body>
</html>
   