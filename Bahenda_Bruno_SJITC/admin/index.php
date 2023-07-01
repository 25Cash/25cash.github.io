<?php 
include '../conn.php';
session_start();
$sel_school=mysqli_query($con,"SELECT * FROM schools");
$school=mysqli_num_rows($sel_school);
$sel_project=mysqli_query($con,"SELECT * FROM projects");
$project=mysqli_num_rows($sel_project);
$date=date('l d/m/y');
$user=$_SESSION['username'];
if(!isset($_SESSION['username'])){
    header("location:../auth/admin.php");
}
$sel=mysqli_query($con,"SELECT*FROM users WHERE username='$user'");
$go=mysqli_fetch_assoc($sel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexex.css">
    <title>Welcome to admin dashboard</title>
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
        <h3>Welcome to swiss contact admin dashboard <?=$_SESSION['username'];?></h3>
        <div class="numbers">
            <div class="num">
                <span>Total schools (<?=$school;?>)</span>
            </div>
            <div class="num">
                <span>Total projects (<?=$project;?>)</span>
            </div>
            <div class="num">
                <span>Current Date</span>
                <p><?=$date;?></p>
            </div>
        </div>
    </div>
</body>
</html>