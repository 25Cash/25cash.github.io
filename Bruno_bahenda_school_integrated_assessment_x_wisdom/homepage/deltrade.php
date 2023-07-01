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
        <a href="logout.php" class="log">Logout</a>
    </div>
    <div class="body">
        <div class="nav-bar">
            <h4>you are logged in <?=$_SESSION['username'];?></h4>
        </div>
        <div class="bode">
            <div class="hold">
            <form method="POST">
                <h4>You're going to delete this record?</h4>
                <?php 
                    if (isset($_GET['delete'])) {
                        $tid = $_GET['delete'];
                        $getData = mysqli_query($con,"SELECT * FROM trade WHERE trade_id='$tid'");
                        $data = mysqli_fetch_assoc($getData);
                    }
                    ?>
                    <input type="number" name="tradeid" id="" value="<?=$data['trade_id'];?>" readonly>
                    <input type="text" name="tradename" id="" value="<?=$data['trade_name'];?>" readonly>
                <!-- <label>Keep changes</label>
                <label>Discard</label> -->
                <button name="delet">Delete</button>
                <a href="trade.php">Go back</a>
            </form>
                <?php 
                if (isset($_POST['delet'])) {
                        $iD = $_POST['tradeid'];
                        $tname = $_POST['tradename'];
                        $query=mysqli_query($con,"DELETE FROM trade WHERE trade_id='$iD'");
                        if ($query) {
                            echo "<script>alert('Record deleted successfully');window.location.href='trade.php'</script>";
                            // echo "Success";
                        }
                        else{
                            echo "<script>alert('Record not deleted');window.location.href='trade.php'</script>";
                        }
                }
                ?>
        </div>
        </div>
    </div>
    </div>
    
</body>
</html>