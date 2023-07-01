<?php 
include '../conn.php';
session_start();
$user=$_SESSION['username'];
$sel=mysqli_query($con,"SELECT*FROM users WHERE username='$user'");
$go=mysqli_fetch_assoc($sel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update your profile</title>
</head>
<body>
    <div class="left">
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="school.php">Manage schools</a>
            <a href="project.php">Manage projects</a>
            <a href="settings.php?set=<?=$go['id'];?>">Settings</a>
            <a href="../logout.php">Logout</a>
        </nav>
    </div>
    <div class="right">
        <?php
        if (isset($_GET['set'])) {
            $Id=$_GET['set'];
            $sell=mysqli_query($con,"SELECT*FROM users WHERE id='$Id'");
            $data=mysqli_fetch_assoc($sell);
        }
        ?>
        <form method="post">
            <h3>Change profile</h3>
            <input type="number" name="idd" id="" value="<?=$data['id']?>" readonly>
            <input type="text" name="uname" id="" value="<?=$data['names']?>" placeholder="Names....">
            <input type="email" name="umail" value="<?=$data['email']?>" id="" placeholder="E-mail...." >
            <input type="text" name="user" id="" value="<?=$data['username']?>" placeholder="Username...."  >
            <input type="password" name="pass" id="" value="<?=$data['password']?>" placeholder="password...."  >
            <button name="update">Modify</button>
        </form>
        <?php 
        if (isset($_POST['update'])) {
            $id=$_POST['idd'];
            $names=$_POST['uname'];
            $mail=$_POST['umail'];
            $users=$_POST['user'];
            $pass=$_POST['pass'];
            $upd=mysqli_query($con,"UPDATE users SET names='$names',
            email='$mail',
            username='$users',
            password='$pass' WHERE id='$id'");
            if ($upd) {
                echo"<script>alert('Profile updated successfully');window.location.href='index.php'</script>";
            }else{
                echo"<script>alert('Profile update failed')</script>";
            }
        }
        ?>
    </div>
</body>
</html>