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
    <title>Add a school</title>
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
        if (isset($_GET['update'])) {
            $id=$_GET['update'];
            $sql=mysqli_query($con,"SELECT*FROM schools WHERE school_id='$id'");
            $data=mysqli_fetch_assoc($sql);
        }
        ?>
        <form method="post">
            <h3>Modify school</h3>
            <input type="number" name="id" id="" value="<?=$data['school_id']?>" readonly>
            <input type="text" name="sname" id="" value="<?=$data['school_name']?>" placeholder="Enter school name...." required>
            <div class="address">
                <input type="text" name="district" id="" value="<?=$data['district']?>" placeholder="Enter school district...." required>
                <input type="text" name="sector" id="" value="<?=$data['sector']?>" placeholder="Enter school sector...." required>
            </div>
            <input type="number" name="phone" value="<?=$data['phone']?>" minlength="10" min="0" id="" placeholder="Enter Phone number...." required>
            <input type="email" name="email" id="" value="<?=$data['email']?>" placeholder="Enter school E-mail...." required>
            <input type="text" name="uname" id="" value="<?=$data['username']?>" placeholder="Enter school username...." required>
            <input type="password" name="pass" id="" value="<?=$data['password']?>" placeholder="Enter password...." required>
            <button name="update">Modify</button>
        </form>
        <?php 
        if (isset($_POST['update'])) {
            $sid=$_POST['id'];
            $scname=$_POST['sname'];
            $dist=$_POST['district'];
            $sector=$_POST['sector'];
            $num=$_POST['phone'];
            $mail=$_POST['email'];
            $uname=$_POST['uname'];
            $pass=$_POST['pass'];
            $stat=$_POST['status'];
            $upd=mysqli_query($con,"UPDATE schools SET school_name='$scname',
            district='$dist',
            sector='$sector',
            phone='$num',
            email='$mail',
            username='$uname',
            password='$pass' WHERE school_id='$sid'");
            if ($upd) {
                echo"<script>alert('Record updated successfully');window.location.href='school.php'</script>";
            }else{
                echo"<script>alert('Record update failed')</script>";
            }
        }
        ?>
    </div>
</body>
</html>