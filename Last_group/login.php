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
    <title>Kaine fc</title>
    <base href="#">
    <script>
        function back() {window.history.forward();}
        setTimeout("back()",0);
        window.onunload=function(){null};
    </script>
</head>
<body>
    <form action="" method="POST">
        <h1>Login</h1>
        <input type="text" name="username" id="" placeholder="username" required autocomplete="off">
        <input type="password" name="password" id="" placeholder="password" required>
        <p style="margin-left:25px; font-weight: bold;">Don't Have Account? <a href="register.php">Register</a></p>
        <input type="submit" value="Login" name="login" id="Login">
    </form>
    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $select = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
        $runselect= mysqli_query($con,$select);
        if (mysqli_num_rows($runselect) > 0) {
            $row = mysqli_fetch_assoc($runselect);
                if ($row["type"]=="manager") {
                    echo "<script>window.location.replace('index.php')</script>";
                }
                elseif($row["type"]=="accountant"){
                    echo "<script>window.location.replace('accountant_index.php')</script>";
                }
                else{
                    echo "<script>alert('who are you')</script>";
                }
        }
        else{
            echo "<script>window.alert('Enter valid username and password')</script>";
        }
        $_SESSION['username'] = $_POST['username'];
    }
    ?>
</body>
</html>

<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 95vh;
        font-family: Arial;
    }
    form{
        width: 400px;
        padding: 20px;
        box-shadow: 0px 0px 12px -5px;
        border-radius: 5px;
    }
    h1{
       text-align: center;
    }
    input{
        padding: 10px;
        width: 80%;
        margin: 8px 25px;
        border: 1px solid #333;
        border-radius: 1px;
        outline: none;
        font-size: 12px; 
        border-radius: 2px;
    }
    input[type="submit"]{
        background: #333;
        color: #fff;
        cursor: pointer;
        width: 200px;
        margin-left: 90px;
        font-weight: bold;
        transition: .4s;
    }
    input[type="submit"]:hover{
        background: transparent;
        box-shadow: 0px 0px 4px -2px;
        color: #333;
    }
</style>