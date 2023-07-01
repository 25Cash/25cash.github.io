<?php
    include('Connekt.php');

    if(isset($_POST['send'])){
    $names = $_POST['names'];
    $email = $_POST['email'];
    $password = $_POST['pw'];

    $check = mysqli_query($con, "SELECT * FROM users WHERE username = '$names'");
    if(mysqli_num_rows($check) > 0){
      echo 'Username already Taken, Try Another';
    }else{
        mysqli_query($con, "INSERT INTO users VALUES('', '$names', '$email', '$password')");
        echo"<script>alert('User $names Created Succesfully.')
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
    <title>Register-Date-App</title>
    <link rel="stylesheet" href="scss/style.css">
</head>
<body>
    <div class="main">
        <form action="" method="POST">
            <h1>Register</h1>
            Enter Your Names
            <input type="text" name="names" required>
            Enter Your Email
            <input type="email" name="email" required>
            Enter Your Password
            <input type="password" name="pw" required>
            <button type="submit" name="send">Send</button>
            <div class="confirm-frm">
                <p>Already Have Account <a href="Login.php">Login Here</a></p>
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