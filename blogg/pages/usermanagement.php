<?php
session_start(); 
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Manage users</title>
    <script type="text/javascript" src="script/manager.js" defer></script>
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
            <div class="table">
                <form method="post" class="search">
                    <input type="text" name="keyword" placeholder="Enter username to search a user....">
                    <button name="search"><i class="ti-search"></i></button>
                </form>
                <div class="btns">
                    <label id="add">ADD USER <i class="ti-plus"></i></label>
                </div>
                <table border="0" cellspacing="0" cellpadding="10px">
                    <tr>
                        <td>#</td>
                        <td>USERNAME</td>
                        <td>E-MAIL</td>
                        <td>PASSWORD</td>
                        <td>POSITION</td>
                        <td>ACTIONS</td>
                    </tr>
                    <?php 
                    if (isset($_POST['search'])) {
                        $keyWord=$_POST['keyword'];
                        $slt=mysqli_query($con,"SELECT * FROM users WHERE username LIKE '%$keyWord%'");
                    }
                    else{
                        $slt=mysqli_query($con,"SELECT * FROM users");
                    }
                    $num=0;
                    while ($fetch=mysqli_fetch_assoc($slt)) {
                        $num++;
                    ?>
                    <tr>
                    <td><?=$num;?></td>
                    <td><?=$fetch['username'];?></td>
                    <td><?=$fetch['email'];?></td>
                    <td><?=$fetch['password'];?></td>
                    <td><?=$fetch['type'];?></td>
                    <td><label id="update"><i class="ti-pencil"></i> MODIFY</label><label id="delet"><i class="ti-trash"></i> DELETE</label></td>
                    </tr>
                    <?php }?>
                </table>
                <div class="update-form">
                    <form method="POST">
                        <div class="close"><h3>UPDATING FORM</h3> <i class="ti-close" id="closeUP"></i></div>
                        <input type="number" value="" readonly>
                        <input type="text" placeholder="Enter username" name="username" value="">
                        <input type="email" placeholder="Enter email" name="email" value="">
                        <input type="password" placeholder="Enter password" name="pswd" value="">
                        <button><i class="ti-pencil"></i> UPDATE</button>
                    </form>
                </div>
                <div class="add-form">
                    <form method="POST">
                        <div class="close"><h3>REGISTRATION FORM</h3> <i class="ti-close" id="closeADD"></i></div>
                        <input type="text" placeholder="Enter username" name="username" value="">
                        <input type="email" placeholder="Enter email" name="email" value="">
                        <input type="password" placeholder="Enter password" name="pswd" value="">
                        <button><i class="ti-plus"></i> Register</button>
                    </form>
                    <?php 
                    if (isset($_POST['reg'])) {

                    }
                    ?>
                </div>
                <div class="delete-form">
                    <form method="POST">
                        <h3>Are you sure you want to delete this record?</h3>
                        <button><i class="ti-trash"></i> Delete</button>
                        <button id="cancel"><i class="ti-close"></i> Discard</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>