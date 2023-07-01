<?php 
include '../conn.php';
session_start();
$sel_school=mysqli_query($con,"SELECT * FROM schools");
$school=mysqli_num_rows($sel_school);
$sel_project=mysqli_query($con,"SELECT * FROM projects");
$project=mysqli_num_rows($sel_project);
$date=date('l d/m/y h:m:s a');
$user=$_SESSION['username'];
$sel=mysqli_query($con,"SELECT * FROM schools WHERE username='$user'");
$go=mysqli_fetch_assoc($sel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexex.css">
    <title>Welcome to school dashboard</title>
</head>
<body>
    <div class="left">
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="project.php">Manage projects</a>
            <a href="settings.php?set=<?=$go['school_id'];?>">Settings</a>
            <a href="../logout.php">Logout</a>
        </nav>
    </div>
    <div class="right">
        <h3>Welcome to swiss contact school dashboard <?=$_SESSION['username'];?> manager</h3>
        <div class="numbers">
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