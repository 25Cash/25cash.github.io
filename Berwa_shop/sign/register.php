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
        <h3>Sign up form.</h3>
        <input type="text" name="user" id="" placeholder="Enter a username">
        <input type="password" name="pass" id="" placeholder="Enter a password">
        <p>Already have account?<a href="login.php">Login</a></p>
        <button name="reg">Register</button>
    </form>
    <?php 
    if (isset($_POST['reg'])) {
        if (!empty($_POST['user'])) {
            if (!empty($_POST['pass'])) {
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $check=mysqli_query($con,"SELECT * FROM shopkeeper WHERE username='$user'");
                if (mysqli_num_rows($check)>0) {
                    echo"<script>alert('user already exist please choose another username.')</script>";
                }else{
                    $ins=mysqli_query($con,"INSERT INTO shopkeeper VALUES('','$user','$pass')");
                    if ($ins) {
                        echo"<script>alert('Registration successfull');window.location.href='login.php'</script>";
                    }else{
                        echo"<script>alert('Registration Failed')</script>";
                    }
                }
            }else{
                echo"<script>alert('Please create a password')</script>";
            }
        }else{
            echo"<script>alert('Please create a username')</script>";
        }
    }
    ?>
</body>
</html>