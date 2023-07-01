<?php 
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/register.css">
    <title>login</title>
</head>
<body>
    <form method="POST" class="login">
        <h4>Login here</h4>
        <input type="text" name="username" id="" autocomplete="off">
        <input type="password" name="password" id="">
        <p>Don't have account? <a href="register.php">Register here</a></p>
        <div class="btns">
        <button name="login">Login</button>
    </div>
        <?php 
        if (isset($_POST['login'])) {
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
                        echo"<script>alert('Logged successfull');window.location.href='../homepage/home.php';</script>";
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
    </form>
</body>
</html>