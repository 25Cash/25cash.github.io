<?php 
include 'conn.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontsawesome/all.min.css">
    <link rel="stylesheet" href="assets/fontsawesome/fontawesome.min.css">
    <link rel="stylesheet" href="css/register.css">
    <title>Login or sign up</title>
    <base href="#">
</head>
<body>
    <div class="main">
        <div class="output">
            <div class="text">
                <h4 id="demo"></h4>
            </div>
        </div>
        <div class="form" id="form">
            <form method="POST" class="register">
                <span>Activate account</span>
                <input type="text" name="username" placeholder="username">
                <input type="text" name="email" placeholder="E-mail address">
                <input type="password" name="password" id="password" placeholder="password">
                <div class="btn">
                    <button class="submit" name="submit">Activate account</button>
                    <label id="login-btn">Login</label>
                </div>
                <?php 
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $insert = mysqli_query($con,"INSERT INTO users VALUES('','$username','$email','$password','','')");
                    if ($insert) {
                        echo "<script>alert('Registration successfull')</script>";
                    }
                    else{
                        echo "<script>alert('Registration failed')</script>";
                    }
                }
                ?>
            </form>
        </div>
        <div class="login-form">
            <form action="#" class="login" method="POST">
                <i class="fa-solid fa-close" id="close"></i>
                <span>Login here</span>
                <input type="text" name="username" placeholder="username">
                <input type="password" name="password" id="pass" placeholder="password">
                <!-- <div class="remember">
                    <input type="checkbox" name="check">
                    <p>Remember me</p>
                </div> -->
                <a href="#">Forgot password?</a>
                <div class="btn">
                    <button class="submit" name="login">Login</button>
                </div>
                <?php 
                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $login = mysqli_query($con,"SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");
                    if (mysqli_num_rows($login) > 0) {
                        $row = mysqli_fetch_assoc($login);
                        $id = $row['id'];
                        header('location:favorites.php?id='.$row['id']);
                        $_SESSION['username'] = $_POST['username'];
                    }
                    else {
                        echo"<script>alert('Login failed')</script>";
                    }
                }
                ?>
            </form>
        </div>
        <script>
            let form = document.querySelector('.login-form');
            let log = document.querySelector('.login');
            let login = document.querySelector('#login-btn').addEventListener('click',()=>{
                form.classList.toggle('active');
                log.classList.toggle('active');
            })
            let close = document.querySelector('#close').addEventListener('click',()=>{
                form.classList.remove('active');
                log.classList.remove('active');
            })
        </script>
    </div>
</body>
</html>