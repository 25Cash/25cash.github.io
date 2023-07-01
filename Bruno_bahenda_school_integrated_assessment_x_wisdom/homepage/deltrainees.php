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
            <div class="hold">
            <form method="POST">
                <h4>Are you sure you want to delete this record?</h4>
                <?php 
                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $sqli=mysqli_query($con,"SELECT * FROM trainees WHERE trainee_id='$id'");
                    if (mysqli_num_rows($sqli) > 0) {
                        $getTrainees=mysqli_fetch_assoc($sqli);
                    }
                }
                ?>
                <input type="number" name="trainee_id" value="<?=$getTrainees['trainee_id'];?>" id="" placeholder="id" readonly>
                <input type="text" name="Fname" id="" value="<?=$getTrainees['f_name'];?>"  placeholder="fname" readonly>
                <input type="text" name="Lname" id="" value="<?=$getTrainees['l_name'];?>"  placeholder="lname" readonly>
                <input type="text" name="gender" id="" value="<?=$getTrainees['gender'];?>"  placeholder="gender" readonly>
                <input type="text" name="tradeName" id="" value="<?=$getTrainees['trade_id'];?>"  placeholder="tradename" readonly>
                <button name="delete">delete</button>
                <a href="trainees.php">Go back</a>
                <?php 
                if (isset($_POST['delete'])) {
                    $tid=$_POST['trainee_id'];
                    $fname = $_POST['Fname'];
                    $lname = $_POST['Lname'];
                    $tName = $_POST['tradeName'];
                    $upd = mysqli_query($con,"DELETE FROM trainees WHERE trainee_id='$tid'");
                    if ($upd) {
                        // header('Location: trainees.php');
                        echo "<script>alert('Record deleted successfully');window.location.href='trainees.php'</script>";
                    }
                    else{
                        echo "<script>alert('Record not deleted');window.location.href='deltrainees.php'</script>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
    
</body>
</html>