<?php 
include '../conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <title>Welcome to Admin login</title>
</head>
<body>
    <div class="form">
        <form method="post" class="register">
            <h3>Register here</h3>
            <input type="text" name="name" placeholder="Enter your full name" required>
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="text" name="uname" id="" placeholder="Enter your username" required>
            <input type="password" name="upass" id="" placeholder="Enter your password" required>
            <button name="register">Register</button>
            <?php 
            if (isset($_POST['register'])) {
                $name=$_POST['name'];
                $mail=$_POST['email'];
                $nname=$_POST['uname'];
                $pass=$_POST['upass'];
                $slt=mysqli_query($con,"SELECT * FROM users WHERE username='$nname' AND password='$pass'");
                if (mysqli_num_rows($slt) > 0) {
                    echo"<script>alert('username already taken')</script>";
                }else{
                    $insert=mysqli_query($con,"INSERT INTO users VALUES('','$name','$mail','$nname','$pass')");
                    if ($insert) {
                        echo"<script>alert('user registered');window.location.href='admin.php'</script>";
                    }else{
                        echo"<script>alert('user registration failed')</script>";
                    }
                }
            }
            ?>
        </form>
        <form method="post" class="login">
            <h3>Login here</h3>
            <input type="text" name="username" id="" placeholder="Enter your username" required>
            <input type="password" name="password" id="" placeholder="Enter your password" required>
            <button name="login">Login</button>
            <?php 
            if (isset($_POST['login'])) {
                $uname=$_POST['username'];
                $pasw=$_POST['password'];
                $sql=mysqli_query($con,"SELECT * FROM users WHERE username='$uname' AND password='$pasw'");
                if (mysqli_num_rows($sql) > 0) {
                    echo"<script>alert('Login successfull');window.location.href='../admin/index.php'</script>";
                    $_SESSION['username']=$_POST['username'];
                    $_SESSION['logged']=true;
                }else{
                    echo"<script>alert('Invalid login information')</script>";
                }
            }
            ?>
        </form>
    </div>
</body>
</html>