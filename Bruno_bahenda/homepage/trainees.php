<?php 
include '../conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainee</title>
</head>
<body>
    <div class="left-nav">
        <nav>
        <a href="home.php">Home</a>
        <a href="trade.php">Trade</a>
        <a href="trainees.php">Trainees</a>
        <a href="marks.php">marks</a>
        </nav>
        <button>Logout</button>
    </div>
    <div class="body">
        <div class="nav-bar">
            <h4><?=$_SESSION['username'];?></h4>
            <div class="dropdown">
                <span>Settings</span>
                <div class="deep-dropdown">
                    <a href="#">View account</a>
                    <a href="#">Edit account</a>
                </div>
            </div>
        </div>
        <div class="bode">
            <form method="POST" class="search">
                <input type="text" name="input">
                <button name="search">Search</button>
            </form>
            <div class="print"><a href="intrainees.php">Add trade</a><button onclick="print()">Report</button></div>
        <?php 
        if (isset($_POST['search'])) {
            $word=$_POST['input'];
            $sql=mysqli_query($con,"SELECT * FROM trainees WHERE f_name LIKE '%$word%'");
        }
        else{
            $sql=mysqli_query($con,"SELECT * FROM trainees");
        }
        ?>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>N0</td>
                    <td>FirstName</td>
                    <td>LastName</td>
                    <td>Gender</td>
                    <td>Trade Name</td>
                    <td>Actions</td>
                </tr>
                <?php
                $num=0;
                while ($getTrainee=mysqli_fetch_assoc($sql)) {
                    $num++;
                ?>
                <tr>
                    <td><?=$num;?></td>
                    <td><?=$getTrainee['f_name']?></td>
                    <td><?=$getTrainee['l_name']?></td>
                    <td><?=$getTrainee['gender']?></td>
                    <td><?=$getTrainee['trade_id']?></td>
                    <td><a href="uptrainees.php?update=<?=$getTrainee['trainee_id'];?>">Update</a> <a href="deltrainees.php?delete=<?=$getTrainee['trainee_id'];?>">Delete</a></td>
                </tr>
                <?php }?>
            </table>
        </div>
</body>
</html>