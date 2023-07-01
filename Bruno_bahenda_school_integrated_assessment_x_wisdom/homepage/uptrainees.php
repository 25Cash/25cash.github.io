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
        </div>
            <div class="hold">
            <form method="POST">
                <h4>Modify trades</h4>
                <?php 
                if (isset($_GET['update'])) {
                    $id = $_GET['update'];
                    $sqli=mysqli_query($con,"SELECT * FROM trainees WHERE trainee_id='$id'");
                    if (mysqli_num_rows($sqli) > 0) {
                        $getTrainees=mysqli_fetch_assoc($sqli);
                    }
                }
                ?>
                <input type="number" name="trainee_id" value="<?=$getTrainees['trainee_id'];?>" id="" placeholder="id" readonly>
                <input type="text" name="Fname" id="" value="<?=$getTrainees['f_name'];?>"  placeholder="fname">
                <input type="text" name="Lname" id="" value="<?=$getTrainees['l_name'];?>"  placeholder="lname">
                <input type="text" name="gender" id="" value="<?=$getTrainees['gender'];?>"  placeholder="gender" readonly>
                <input type="text" name="tradeName" id="" value="<?=$getTrainees['trade_id'];?>"  placeholder="tradename">
                <!-- <label id="keep" name="keep">Keep changes</label>
                <label id="discard">Discard</label> -->
                <button name="update">Update</button>
                <a href="trainees.php">Go back</a>
                <?php 
                if (isset($_POST['update'])) {
                    $tid=$_POST['trainee_id'];
                    $fname = $_POST['Fname'];
                    $lname = $_POST['Lname'];
                    $tName = $_POST['tradeName'];
                    $upd = mysqli_query($con,"UPDATE trainees SET f_name='$fname',l_name='$lname',trade_id='$tName' WHERE trainee_id='$tid'");
                    if ($upd) {
                        echo "<script>alert('Record updated successfully');window.location.href='trainees.php'</script>";
                    }
                    else{
                        echo "<script>alert('Record not updated');window.location.href='uptrainees.php'</script>";
                    }
                }
                ?>
            </form>
            </div>
    </div>
</body>
</html>