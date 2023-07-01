<?php
    $con=mysqli_connect('localhost','root','','ems');

    if(isset($_POST['sign'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pw=$_POST['pw'];

        $check=mysqli_query($con, "SELECT * FROM users WHERE names = '$name'");

        $numrow=mysqli_num_rows($check);

        if($numrow > 0){
            echo"<script>alert('User $name Already Exists')</script>";
        }else{
            mysqli_query($con, "INSERT INTO users VALUES('', '$name', '$email', '$pw')");
            echo"<script>alert('User $name Created Succesfully.')
            window.location.href='Login.php';
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="Respo.css">
    <link rel="stylesheet" href="Min.css">
</head>
<body>
    <form action="" method="POST" autocomplete="off">
        <h2>Sign Up</h2>
        Enter Your Username
        <input type="text" name="name" required>
        Enter Your E-Mail
        <input type="email" name="email" required>
        Enter Your Password
        <input type="password" name="pw" required>
        <div class="agree">
            <input type="checkbox" name="" id="">
            I Agree To The Terms And Conditions
        </div>
        <button name="sign">Sign Up</button>
        <div class="direction">
            Already Have An Account <a href="Login.php">Login</a>
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
