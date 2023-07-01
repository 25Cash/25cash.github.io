<?php

    include('Connekt.php');
    session_start();

    if(isset($_SESSION['Log'])){
        header('location: Dash.php');
    }

     if(isset($_POST['login'])){
        $name = $_POST['names'];
        $password = $_POST['pw'];
  
        $check = mysqli_query($con, "SELECT * FROM users WHERE username = '$name' AND password = '$password'");

        if(mysqli_num_rows($check) > 0){
           $fetch = mysqli_fetch_assoc($check);
           echo"<script>
                alert('User Logged In Successfully')
                window.location.href='Dash.php';
            </script>";

            $_SESSION['Log'] = $fetch['user_id'];
        }else{
           echo "<script>
           alert('User Or Password Not Found');
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
    <title>Login-Date-App</title>
    <link rel="stylesheet" href="scss/style.css">
</head>
<body>
    <div class="main">
        <form action="" method="POST">
            <h1>Login</h1>
            Enter Your Username
            <input type="text" name="names"required>
            Enter Your Password
            <input type="password" name="pw" required>
            <button type="submit" name="login">Send</button>
            <div class="confirm-frm">
                <p>Don't Have Account <a href="Register.php">Register Here</a></p>
            </div>
        </form>
    </div>
</body>
</html>
<style>
    body{
        display: grid;
        height: 100vh;
        place-items: center;
        background: #444;
    }
</style>