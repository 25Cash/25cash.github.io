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
    <title>Trades</title>
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
            <div class="btns">
            <a href="intrade.php">Add trade</a>
            <button onclick="print()">Report</button>
            </div>
        </div>
            <form method="post">
            <div class="search">
                <input type="text" name="input">
                <button name="search">Search</button>
            </div>
            </form>
            <?php 
            if (isset($_POST['search'])) {
                $word=$_POST['input'];
                $sqli=mysqli_query($con,"SELECT * FROM trade WHERE trade_name LIKE '%$word%'");
            }
            else{
                $sqli=mysqli_query($con,"SELECT * FROM trade");
            }
            ?>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>#</td>
                    <td>Trade_Name</td>
                    <td>Action</td>
                </tr>
                <?php
                $num=0;
                while($fetch = mysqli_fetch_assoc($sqli)){
                    $num++
                ?>
                <tr>
                    <td><?=$num;?></td>
                    <td><?=$fetch['trade_name'];?></td>
                    <td><a href="uptrade.php?update=<?=$fetch['trade_id']?>">Update</a> <a href="deltrade.php?delete=<?=$fetch['trade_id']?>">Delete</a></td>
                </tr>
                <?php }?>
            </table>
    </div>
</body>
</html>