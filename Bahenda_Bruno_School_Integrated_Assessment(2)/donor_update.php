<?php 
session_start();
include 'connection.php';
if(!$_SESSION['loggedIn']=true){
    header('location:login.php');
}
?>

<?php 
if (isset($_GET['mod'])) {
    $view = $_GET['mod'];
    $select = "SELECT * FROM donors WHERE d_id='$view'";
    $runselect = mysqli_query($con,$select);

    if ($runselect -> num_rows > 0) {
        while ($row = $runselect -> fetch_assoc()) {
            $id = $row['d_id'];
            $fname = $row['f_name'];
            $lname = $row['l_name'];
            $sex = $row['sex'];
            $date = $row['date'];
            $email = $row['email'];
            $don_id = $row['ot_id'];
            $users_id = $row['user_id'];
        }
        $don=mysqli_query($con,"SELECT * FROM donations WHERE ot_id='$don_id'");
        $fetchDon=mysqli_fetch_assoc($don);

        $use=mysqli_query($con,"SELECT * FROM users WHERE user_id='$users_id'");
        $fetchUser=mysqli_fetch_assoc($use);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="don.css">
    <title>Kaine fc</title>
</head>
<body>
<div class="main">
        <div class="nav">
           <div class="left">
             <div class="logo">
               <h1><img src="image/logo.png" alt="">Kaine fc</h1>
             </div>
                <a href="index.php">Dashboard</a>
                <a href="donors.php">donors</a>
                <a href="donations.php">Donations</a>
           </div>
        </div>
        <div class="center">
            <div class="links">
                <div class="logo">  
                    <div class="navigate">
                        <a href="donations.php">Donations</a>
                        <a href="donors">Donors</a>
                    </div>
                </div>
            </div>
        <div class="bottom">
            <h2 style="color:#fff;margin-bottom:10px;"><center>Modify donor</center></h2>
                <form action="#" method="post">
                <label for="">ID</label><br>
                <input type="number" name="id" placeholder="Enter ID" value="<?php echo $id;?>" readonly><br>
                <label for="">FirstName</label><br>
                <input type="text" name="fname" placeholder="Enter first name" value="<?php echo $fname;?>"><br>
                <label for="">LastName</label><br>
                <input type="text" name="lname" placeholder="Enter last name" value="<?php echo $lname;?>"><br>
                <label for="">Date</label><br>
                <input type="date" name="date" placeholder="Enter date of birth" value="<?php echo $date;?>"><br>
                <label for="">Email</label><br>
                <input type="email" name="email" placeholder="Enter your email" value="<?php echo $email;?>"><br>
                <div class="select">
                <select name="sex">
                    <?php 
                    $slt=mysqli_query($con,"SELECT * FROM donors");
                    $gender=mysqli_fetch_assoc($slt);
                    ?>
                    <option value="<?=$gender['sex']?>" selected hidden><?=$gender['sex'];?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <select name="d">
                    <option selected hidden value="<?=$fetchDon['ot_id'];?>"><?=$fetchDon['name'];?></option>
                    <?php 
                    $sel=mysqli_query($con,"SELECT * FROM donations");
                    while ($don=mysqli_fetch_assoc($sel)) {
                    ?>
                    <option value="<?=$don['ot_id'];?>"><?=$don['name'];?></option>
                <?php }?>
                </select>
                <select name="u">
                    <option selected hidden value="<?=$fetchUser['user_id'];?>"><?=$fetchUser['u_name'];?></option>
                    <?php 
                    $sel=mysqli_query($con,"SELECT * FROM users");
                    while ($user=mysqli_fetch_assoc($sel)) {
                    ?>
                    <option value="<?=$user['user_id'];?>"><?=$user['u_name'];?></option>
                <?php }?>
                </select>
            </div>
                <div class="btn">
                    <button type="submit" name="update">Modify</button>
                    <button type="reset" onclick="window.location.replace('donors.php')">Cancel</button>
                </div>
            </form>
            <?php 
            if (isset($_POST['update'])) {
                $_id = $_POST['id'];
                $_fname = $_POST['fname'];
                $_lname = $_POST['lname'];
                $_date = $_POST['date'];
                $_email = $_POST['email'];
                $sex=$_POST['sex'];
                $_don = $_POST['d'];
                $_user = $_POST['u'];
                $runupdate = mysqli_query($con,"UPDATE donors SET f_name= '$_fname',l_name= '$_lname',sex='$sex',date='$_date',email= '$_email',ot_id= '$_don',user_id= '$_user' WHERE d_id = '$_id'");
                if ($runupdate) {
                    // echo "<script>window.location.replace('donors.php')</script>";
                    header('location:donors.php');
                }
                else{
                    echo "<script>alert('Failed to update donor')</script>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>

<style></style>