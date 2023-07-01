<?php 
session_start();
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <base href="#">
    <link rel="stylesheet" href="scss/style.css">
</head>
<body>
    <div class="login">
        <form action="#" method="POST">
            Enter Your Username
            <input type="text" name="username" required title="Can't Send Empty Field">
            Enter Password
            <input type="password" name="password" required title="Can't Send Empty Field">
            <div class="btn">
                <button name="submit">Login</button>
            </div>
            <p>Don't Have Account <a href="Register.php">Register</a></p>
        </form>
        <?php 
        if (!isset($_POST['submit'])) {
            echo "Fill all fields";
        }
        else{
            $username = $_POST['username'];
            $password = $_POST['password'];
            $select = mysqli_query($con,"SELECT * FROM user WHERE username='".$username."' AND password='".$password."'");
            if (mysqli_num_rows($select) > 0) {
                header('location:Dash.php');
                $_SESSION['username']=$_POST['username'];
            }
            else {
                header('location.Login.php');
            }
        }
        ?>
    </div>
</body>
</html>

<style>
    body{
        display: grid;
        height: 100vh;
        place-items: center;
    }
    
</style>