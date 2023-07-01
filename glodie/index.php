<?php
session_start();
include"connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <p>LOGIN</p>
      <label for="">username</label>  <input type="text" name="name" placeholder="Enter your Username">
      <label for="">password</label>  <input type="text" name="pass" placeholder="Enter your password">
      <input type="submit" name="login" value="Login" class="submit">
       <a href="insert_user.php">sign in</a>
        
    </form>
    <?php
    if (isset($_POST['login'])) {
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $_SESSION['username']=$name;
        $sel=mysqli_query($con,"SELECT * FROM users WHERE U_name='$name' AND u_password='$pass'");
        $run= mysqli_num_rows($sel);
        if($run > 0){
            echo"<script>alert('Login successfuly');window.location.href='dash.php'</script>";
        }
        else{
            echo"<script>alert('Login failed please create account');window.location.href='insert_user.php'</script>";

        }

        # code...
    }
    ?>
</body>
</html>