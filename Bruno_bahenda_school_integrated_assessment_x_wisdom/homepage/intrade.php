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
        <center>
            <div class="hold">
            <form method="post">
                <h3>Insert a trade name</h3>
                <input type="text" name="tname" id="" placeholder="Enter a trade name">
                <div class="btns">
                    <button name="submit">Add</button>
                    <a href="trade.php">Cancel</a>
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
        </center>
        </div>
    </div>
</body>
</html>