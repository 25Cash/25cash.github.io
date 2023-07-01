<?php
session_start();
include 'connection.php';
if(!$_SESSION['loggedIn']=true){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/logo.png">
    <title>Donors</title>
    <link rel="stylesheet" href="donors.css">
</head>
<body>
<div class="main">
        <div class="nav">
           <div class="left">
            <div class="logo">
            <h1><img src="image/logo.png" alt="">Kaine fc</h1>
            </div>
               <a href="index.php">Dashboard</a>
               <a href="donors.php">Donors</a>
               <a href="donations.php">Donations</a>
           </div>
        </div>
        <div class="center">
            <div class="links">
                <div class="logo">  
                    <div class="navigate">
                        <a href="donations.php">Donations</a>
                        <a href="donors.php">Donors</a>
                    </div>
                </div>
            </div>
        <div class="form">
            <h2 style="color:#fff;margin-bottom:10px;"><center>Donor registry form</center></h2>
            <form action="#" method="post">
                <label for="">Firstname</label><br>
                <input type="text" name="fname" placeholder="firstname" required><br>
                <label for="">Lastname</label><br>
                <input type="text" name="lname" placeholder="lastname" required><br>
                <label for="">Male</label>
                <input type="radio" name="gender" value="male" required>
                <label for="">Female</label>
                <input type="radio" name="gender" id="" value="female" required><br>
                <label for="">Date</label><br>
                <input type="date" name="date" placeholder="enter date" required><br>
                <label for="">E-mail</label><br>
                <input type="email" name="email" id="" required><br>
                <div class="select">
                <select name="d">
                    <option selected hidden>Select a donation name</option>
                    <?php 
                    $sel=mysqli_query($con,"SELECT * FROM donations");
                    while ($don=mysqli_fetch_assoc($sel)) {
                    ?>
                    <option value="<?=$don['ot_id'];?>"><?=$don['name'];?></option>
                <?php }?>
                </select>
                <select name="u">
                    <option selected hidden>Select a user</option>
                    <?php 
                    $sel=mysqli_query($con,"SELECT * FROM users");
                    while ($user=mysqli_fetch_assoc($sel)) {
                    ?>
                    <option value="<?=$user['user_id'];?>"><?=$user['u_name'];?></option>
                <?php }?>
                </select>
            </div>
                <div class="btn">
                    <button type="submit" name="reg">Register</button>
                    <button type="reset">Cancel</button>
                </div>
            </form>
            <?php 
            if (isset($_POST['reg'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $gender = $_POST['gender'];
                $date = $_POST['date'];
                $email = $_POST['email'];
                $donation=$_POST['d'];
                $users=$_POST['u'];
                $sql = "INSERT INTO donors VALUES('','$fname','$lname','$gender','$date','$email','$donation','$users')";
                $runsql = mysqli_query($con,$sql);
                if ($runsql) {
                    echo "<script>alert('Donor registered successfully')</script>";
                    header('location:donors.php');
                }
                else{
                    echo "<script>alert('Donor registry failed')</script>";
                }
            }
            ?>
        </div>
        </div>
</div>
</body>
</html>