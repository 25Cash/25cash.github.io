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
        </div>
            <div class="insert">
            <form method="post">
                <input type="text" name="tname" id="">
                <div class="btns">
                    <button name="submit">Add</button>
                    <a hre="trade.php">Cancel</a>
                </div>
                <?php 
                if (isset($_POST['submit'])) {
                    if (!empty($_POST['tname'])) {
                        $tname = $_POST['tname'];
                        $sql = mysqli_query($con,"INSERT INTO trade VALUES('','$tname')");
                        if ($sql) {
                            // echo "success";
                            // header('Location:trade.php');
                            echo "<script>alert('Record inserted successfully');window.location.href='trade.php'</script>";
                        }
                        else{
                            echo "<script>alert('Record not inserted');window.location.href='trade.php'</script>";
                        }
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>