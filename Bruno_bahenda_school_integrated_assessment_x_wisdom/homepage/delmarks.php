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
        <a href="logout.php" class="log">Logout</a>
    </div>
    <div class="body">
        <div class="nav-bar">
            <h4>you are logged in <?=$_SESSION['username'];?></h4>
        </div>
            <div class="hold">
                <?php 
                if (isset($_GET['delete'])) {
                    $id=$_GET['delete'];
                    $sq=mysqli_query($con,"SELECT * FROM marks WHERE mark_id='$id'");
                    $row=mysqli_fetch_assoc($sq);
                }
                ?>
            <form method="post">
                <h3>You are going to delete this record</h3>
                <input type="number" name="id" value="<?=$row['mark_id']?>" id="" readonly>
                <select name="tid" id="">
                    <option selected hidden><?=$row['trainee_id']?></option>
                </select>
                <select name="trd" id="">
                    <option selected hidden><?=$row['trade_id']?></option>
                </select>
                <input type="text" name="module" value="<?=$row['module_name']?>" id="" placeholder="Module name" readonly>
                <input type="number" name="fa" value="<?=$row['formative_assessment']?>" id="" placeholder="Formattive assessment" readonly>
                <input type="number" name="sa" value="<?=$row['summative_assessment']?>" id="" placeholder="Summative assessment" readonly>
                <input type="number" name="tot" value="<?=$row['total_marks']?>" id="" readonly>
                <input type="text" name="comp" value="<?=$row['competence']?>" id="" readonly>
                <div class="btns">
                    <button name="submit">Delete</button>
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
                    $to=$_POST['tot'];
                    $co=$_POST['comp'];
                    $sqli=mysqli_query($con,"DELETE FROM marks WHERE mark_id='$id'");
                    if ($sqli) {
                        echo "<script>alert('Record deleted successfully');window.location.href='marks.php'</script>";
                    }else {
                        echo "<script>alert('Record not deleted');window.location.href='delmarks.php'</script>";
                    }
                }
                ?>
        </div>
    </div>
    </div>
    
</body>
</html>