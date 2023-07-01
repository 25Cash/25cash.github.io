<?php
    session_start();

    if(isset($_SESSION['Ems'])){
        header('location: Dash.php');
    }
     $con = mysqli_connect('localhost', 'root', '', 'ems');

     if(isset($_POST['login'])){
        $name = $_POST['uname'];
        $password = $_POST['upw'];
  
        $check = mysqli_query($con, "SELECT * FROM users WHERE names = '$name' AND password = '$password'");

        if(mysqli_num_rows($check) > 0){
           $fetch = mysqli_fetch_assoc($check);
           echo"<script>
                alert('User Logged In Successfully')
                window.location.href='Dash.php';
            </script>";

           $_SESSION['Ems'] = $fetch['id'];
        }else{
           echo "<script>
           alert('User Not Found');
           </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Respo.css">
    <link rel="stylesheet" href="Min.css">
</head>
<body>
    <form method="POST" autocomplete="off" autocomplete="off">
        <h2>Login</h2>
        Enter Your Username
        <input type="text" name="uname" required>
        Enter Your Password
        <input type="password" name="upw"  required>
        <div class="agree">
            <input type="checkbox" name="" id="">
            Remember Me
        </div>
        <div class="btn">
            <button type="submit" name="login">Login</button>
            <button type="reset">Cancel</button>
        </div>
        <div class="direction">
            Don't Have An Account <a href="Sign up.php">Sign Up</a>
        </div>
    </form>
</body>
</html>

<style>
    body{
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
        background: url(./images/colorful-bg.jpg) no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>