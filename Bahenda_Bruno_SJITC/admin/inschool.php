<?php 
include '../conn.php';
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
        <form method="post">
            <h3>Register a school</h3>
            <input type="text" name="sname" id="" placeholder="Enter school name...." required>
            <div class="address">
                <input type="text" name="district" id="" placeholder="Enter school district...." required>
                <input type="text" name="sector" id="" placeholder="Enter school sector...." required>
            </div>
            <input type="number" name="phone" minlength="10" min="0" id="" placeholder="Enter Phone number...." required>
            <input type="email" name="email" id="" placeholder="Enter school E-mail...." required>
            <input type="text" name="uname" id="" placeholder="Enter school username...." required>
            <input type="password" name="pass" id="" placeholder="Enter password...." required>
            <button name="register">Register</button>
        </form>
        <?php 
        if (isset($_POST['register'])) {
            $scname=$_POST['sname'];
            $dist=$_POST['district'];
            $sector=$_POST['sector'];
            $num=$_POST['phone'];
            $mail=$_POST['email'];
            $uname=$_POST['uname'];
            $pass=$_POST['pass'];
            $status="Disable";
            $sel=mysqli_query($con,"SELECT * FROM schools WHERE school_name='$scname' AND username='$uname'");
            if (mysqli_num_rows($sel)>0) {
                echo "<script>alert('This School is already registered')</script>";
            }else{
                $insert=mysqli_query($con,"INSERT INTO schools VALUES('','$scname','$dist','$sector','$num','$mail','$uname','$pass','$status')");
                if ($insert) {
                    echo"<script>alert('School registered successfully');window.location.href='school.php'</script>";
                }else{
                    echo"<script>alert('School registration failed')</script>";
                }
            }
        }
        ?>
    </div>
</body>
</html>