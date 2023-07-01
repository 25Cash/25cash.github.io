<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Login first please');window.location.href='../auth/account.php'</script>";
}
include '../conn.php';
$sltusers=mysqli_query($con,"SELECT * FROM users");
$users=mysqli_num_rows($sltusers);
$sltposts=mysqli_query($con,"SELECT * FROM posts");
$posts=mysqli_num_rows($sltposts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="icons/fontawesome/all.min.css">
    <link rel="stylesheet" href="icons/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin dashboard</title>
</head>
<body>
    <div class="main">
        <div class="left">
            <h3>Admin panel</h3>
            <nav>
                <a href="admin.php"><i class="ti-home"></i> Home</a>
                <a href="usermanagement.php"><i class="ti-user"></i> Manage users</a>
                <a href="postmanagement.php"><i class="ti-image"></i> Manage posts</a>
                <a href="#"><i class="ti-settings"></i> Settings</a>
            </nav>
            <a href="#" title="click to logout"><i class="ti-shift-right-alt"></i> Logout</a>
        </div>
        <div class="right">
            <div class="nav">
                <h3>You are logged in <?=$_SESSION['username'];?></h3>
            </div>
            <div class="body">
                <h1>WELCOME TO ADMIN DASHBOARD <?=$_SESSION['username'];?></h1>
                <div class="numbers">
                    <div class="holder">
                        <span><i class="ti-user"></i> Total users</span>
                        <h2>(<?=$users;?>)</h2>
                    </div>
                    <div class="holder">
                        <span><i class="ti-user"></i> Total posts</span>
                        <h2>(<?=$posts;?>)</h2>
                    </div>
                    <div class="holder">
                        <span><i class="ti-user"></i> Total active</span>
                        <h2>(<?='0';?>)</h2>
                    </div>
                    <div class="holder">
                        <span><i class="ti-user"></i> Total inactive</span>
                        <h2>(<?='0';?>)</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>