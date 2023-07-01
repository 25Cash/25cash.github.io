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
            <form method="post">
                <input type="text" name="Fname" id="" placeholder="fname">
                <input type="text" name="Lname" id="" placeholder="lname">
                <select name="gender" id="">
                    <option selected hidden>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <select name="trade" id="">
                    <option selected hidden>Trade name</option>
                    <?php 
                    $sql = mysqli_query($con,"SELECT trade_id FROM trade");
                    while($getTrade=mysqli_fetch_assoc($sql)){
                    ?>
                    <option value="<?=$getTrade['trade_id'];?>"><?=$getTrade['trade_id'];?></option>
                    <?php }?>
                </select>
                <div class="btns">
                    <button name="submit">Add</button>
                    <a href="trainees.php">Go back</label>
                </div>
                <?php 
                if (isset($_POST['submit'])) {
                    $fname = $_POST['Fname'];
                    $lname = $_POST['Lname'];
                    $gender = $_POST['gender'];
                    $trade = $_POST['trade'];
                    $insert=mysqli_query($con,"INSERT INTO trainees VALUES('','$fname','$lname','$gender','$trade')");
                    if ($insert) {
                        // echo "success";
                        echo "<script>alert('Record inserted successfully');window.location.href='trainees.php'</script>";
                    }
                    else{
                        echo "<script>alert('Record not inserted');window.location.href='intrainees.php'</script>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>