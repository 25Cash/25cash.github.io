<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/logo.png">
    <title>kaine fc</title>
    <base href="#">
</head>
<body>
    <form action="" method="POST">
        <h1>Register</h1>
        <input type="text" name="username" id="" class="input" placeholder="USERNAME" required autocomplete="off">
        <input type="password" name="password" id="" class="input" placeholder="PASSWORD" required><br>
        <input type="radio" name="type" value="accountant" required><span>Accountant</span>
        <input type="radio" name="type" value="manager" required><span>Manager</span>
        <p style="margin-left:40px;margin-top:40px; font-weight:bold;">Already Have An Account? <a class="undl"href="login.php">Login</a></p>
        <button type="submit" name="create">Register</button>
    </form>
    <?php 
    if(isset($_POST['create'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['type'];
        $user = "SELECT username FROM users WHERE username='".$username."'";
        $runuser = mysqli_query($con,$user);
        if (mysqli_num_rows($runuser) > 0) {
            echo "<script>window.alert('username taken! try another.')</script>";
        }

        else{
        $insert = "INSERT INTO users VALUES('','$username','$password','$name')";
        $runinsert = mysqli_query($con,$insert);
        if ($runinsert) {
            echo "<script>window.location.replace('login.php')</script>";
        }
        else {
            echo "<script>window.alert('Registration failed')</script>";
        }
        }
        
    }
    ?>
</body>
</html>

<style>
    body{
        justify-content: center;
        display: flex;
        align-items: center;
        height: 100%;
        font-family: arial;
    }
    form{
        width: 35%;
        height: 55vh;
        position: relative;
        top: 150px;
        border-radius: 5px;
        box-shadow: 0px 0px 12px -5px #333;
    }
    h1{
        text-align: center;
    }
    .input{
        padding: 8px 8px;
        width: 79%;
        margin: 12px;
        border: 1px solid #333;
        border-radius: 3px;
        outline: none;
        position: relative;
        left: 20px;
        padding: 10px;
        font-size: 12px;
        caret-color: #5c2aac;
    }
    span{
        position: relative;
        left: 35px;
        top: 20px;
        margin-right: 20px;
    }
    input[type=radio]{
        position: relative;
        left: 30px;
        top: 20px;
        accent-color: #5c2aac;
    }
    button{
        background: #222;
        color: #fff;
        border: none;
        width: 50%;
        border-radius: 2px;
        padding: 10px;
        position: relative;
        top: 10px;
        font-weight: bold;
        left: 100px;
        cursor: pointer;
        transition: .4s;
    }
    button:hover{
        background: transparent;
        border: 1px solid #333;
        color: #333;
    }
</style>