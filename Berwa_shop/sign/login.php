<?php 
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or signup</title>
</head>
<body>
    <form method="post">
        <h3>Sign in form.</h3>
        <input type="text" name="user" id="" placeholder="Enter a username">
        <input type="password" name="pass" id="" placeholder="Enter a password">
        <p>Don't have account?<a href="register.php">Register</a></p>
        <button name="reg">Login</button>
    </form>
    <?php 
    if (isset($_POST['reg'])) {
        if (!empty($_POST['user'])) {
            if (!empty($_POST['pass'])) {
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $check=mysqli_query($con,"SELECT * FROM shopkeeper WHERE username='$user' AND password='$pass'");
                if (mysqli_num_rows($check)>0) {
                    echo"<script>alert('Login successfull');window.location.href='../pages/index.php'</script>";
                    session_start();
                    $_SESSION['username']=$user;
                    $_SESSION['logged']=true;
                }
                else{
                    echo"<script>alert('Login Failed you have provided invalid info.')</script>";
                }
            }else{
                echo"<script>alert('Please insert a password')</script>";
            }
        }else{
            echo"<script>alert('Please insert a username')</script>";
        }
    }
    ?>
</body>
</html>