<?php 
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <title>School registration</title>
</head>
<body>
    <div class="forms">
    <form method="post" class="login">
            <h3>Login here</h3>
            <input type="text" name="uname" id="" placeholder="Enter school username...." required>
            <input type="password" name="pass" id="" placeholder="Enter password...." required>
            <button name="login">Login</button>
        <?php 
        if (isset($_POST['login'])) {
            $uname=$_POST['uname'];
            $pass=$_POST['pass'];
            $sel=mysqli_query($con,"SELECT * FROM schools WHERE username='$uname' AND password='$pass'");
            $row=mysqli_fetch_assoc($sel);
            if (mysqli_num_rows($sel)>0) {
                if ($row['schhol_status']==="Enable") {
                    echo "<script>alert('Login successfull');window.location.href='../school/index.php'</script>";
                    session_start();
                    $_SESSION['username']=$_POST['uname'];
                    $_SESSION['logged']=true;
                }else{
                    echo "<script>alert('you are currently disabled')</script>";
                }
            }else{
                echo"<script>alert('Invalid login information')</script>";
            }
        }
        ?>
    </form>
</div>
</body>
</html>