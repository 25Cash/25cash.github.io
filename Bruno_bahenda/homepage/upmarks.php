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
    <title>Document</title>
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
            <div class="holder">
                <?php 
                if (isset($_GET['update'])) {
                    $id=$_GET['update'];
                    $sq=mysqli_query($con,"SELECT * FROM marks WHERE mark_id='$id'");
                    $row=mysqli_fetch_assoc($sq);
                }
                ?>
            <form method="post">
                <input type="number" name="id" value="<?=$row['mark_id']?>" id="" readonly>
                <select name="tid" id="">
                    <option selected hidden><?=$row['trainee_id']?></option>
                    <?php 
                    $select_trainees = mysqli_query($con,"SELECT * FROM trainees");
                    while($getTrainees=mysqli_fetch_assoc($select_trainees)){
                    ?>
                    <option value="<?=$getTrainees['trainee_id'];?>"><?=$getTrainees['f_name'],' ',$getTrainees['l_name'];?></option>
                    <?php }?>
                </select>
                <select name="trd" id="">
                    <option selected hidden><?=$row['trade_id']?></option>
                    <?php 
                    $select_trade = mysqli_query($con,"SELECT * FROM trade");
                    while($getTrade=mysqli_fetch_assoc($select_trade)){
                    ?>
                    <option value="<?=$getTrade['trade_id'];?>"><?=$getTrade['trade_name'];?></option>
                    <?php }?>
                </select>
                <input type="text" name="module" value="<?=$row['module_name']?>" id="" placeholder="Module name">
                <input type="number" name="fa" value="<?=$row['formative_assessment']?>" id="" placeholder="Formattive assessment">
                <input type="number" name="sa" value="<?=$row['summative_assessment']?>" id="" placeholder="Summative assessment">
                <div class="btns">
                    <button name="submit">Update</button>
                    <a href="marks.php">Go back</a>
                </div>
            </form>
                <?php 
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $tid = $_POST['tid'];
                    $trade  = $_POST['trd'];
                    $mod = $_POST['module'];
                    $Fa = $_POST['fa'];
                    $Sa = $_POST['sa'];
                    if ($Fa<=50&&$Fa>=0) {
                        if ($Sa<=50&&$Sa>=0) {
                            $total = $Fa + $Sa;
                            $competence='';
                            if ($total >= 70) {
                                $competence = 'Competent';
                            }
                            else{
                                $competence  = 'Not yet competent';
                            }
                            $sqli=mysqli_query($con,"UPDATE marks SET trainee_id='$tid',trade_id='$trade',module_name='$mod',formative_assessment='$Fa',summative_assessment='$Sa',total_marks='$total',competence='$competence' WHERE mark_id='$id'");
                            if ($sqli) {
                                // header('Location: marks.php');
                            echo "<script>alert('Marks have been updated successfully');window.location.href='marks.php'</script>";
                            }
                            else{
                                echo "<script>alert('Marks have been updation failed!');window.location.href='upmarks.php'</script>";
                            }
                        }
                        else{
                            echo "<script>alert('Marks have to be less than 50 and greater than 0')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Marks have to be less than 50 and greater than 0')</script>";
                    }
                }
                ?>
        </div>
    </div>
    </div>
    
</body>
</html>