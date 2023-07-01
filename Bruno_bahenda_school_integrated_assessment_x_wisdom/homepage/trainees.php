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
    <link rel="stylesheet" href="../assets/css/home.css">
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
        <a href="logout.php" class="log">Logout</a>
    </div>
    <div class="body">
        <div class="nav-bar">
            <h4>you are logged in <?=$_SESSION['username'];?></h4>
        </div>
        <div class="bode">
            <form method="POST" class="search">
                <input type="text" name="input">
                <button name="search">Search</button>
            </form>
            <div class="print"><a href="intrainees.php" class="add">Add trainee</a><button onclick="print()" class="riri">Report</button></div>
        <?php 
        if (isset($_POST['search'])) {
            $word=$_POST['input'];
            $sql=mysqli_query($con,"SELECT * FROM trainees WHERE f_name LIKE '%$word%'");
        }
        else{
            $sql=mysqli_query($con,"SELECT * FROM trainees");
        }
        ?>
            <table border="0" cellpadding="10" cellspacing="0">
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
                    <td><a href="uptrainees.php?update=<?=$getTrainee['trainee_id'];?>" class="up">Update</a> <a href="deltrainees.php?delete=<?=$getTrainee['trainee_id'];?>" class="del">Delete</a></td>
                </tr>
                <?php }?>
            </table>
        </div>
</body>
</html>