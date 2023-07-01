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
    <title>Marks</title>
</head>
<body>
    <div class="left-nav">
        <nav>
        <a href="home.php">Home</a>
        <a href="trade.php">Trade</a>
        <a href="trainees.php">Trainees</a>
        <a href="marks.php">marks</a>
        </nav>
        <a>Logout</a>
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
            <?php 
            if (isset($_POST['search'])) {
                $word=$_POST['input'];
                // $name=$gettT['trade_name'];
                $sql=mysqli_query($con,"SELECT * FROM marks WHERE module_name LIKE '%$word%'");
            }
            else{
                $sql=mysqli_query($con,"SELECT * FROM marks");
            }
            ?>
            <a href="inmarks.php">Add Marks</a>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>N0</td>
                    <td>Trainee Name</td>
                    <td>Trade Name</td>
                    <td>Module</td>
                    <td>Formattive assessment /50</td>
                    <td>Summative assessment /50</td>
                    <td>Total marks /100</td>
                    <td>Competence</td>
                    <td>Actions</td>
                </tr>
                <?php 
                $num=0;
                while($gett=mysqli_fetch_assoc($sql)){
                    $num++;
                    $tname=$gett['trainee_id'];
                    $sel=mysqli_query($con,"SELECT * FROM trainees WHERE trainee_id=$tname");
                    $getT=mysqli_fetch_assoc($sel);
                    $trname=$gett['trade_id'];
                    $sell=mysqli_query($con,"SELECT * FROM trade WHERE trade_id=$trname");
                    $gettT=mysqli_fetch_assoc($sell);
                ?>
                <tr>
                    <td><?=$num;?></td>
                    <td><?=$getT['f_name'],' ',$getT['l_name'];?></td>
                    <td><?=$gettT['trade_name'];?></td>
                    <td><?=$gett['module_name'];?></td>
                    <td><?=$gett['formative_assessment'];?></td>
                    <td><?=$gett['summative_assessment'];?></td>
                    <td><?=$gett['total_marks'];?></td>
                    <td><?=$gett['competence'];?></td>
                    <td><a href="upmarks.php?update=<?=$gett['mark_id'];?>">update</a><a href="delmarks.php?delete=<?=$gett['mark_id'];?>">delete</a></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
    </div>
    
</body>
</html>