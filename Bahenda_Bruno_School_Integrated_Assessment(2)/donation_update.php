<?php 
session_start();
include 'connection.php';
if(!$_SESSION['loggedIn']=true){
    header('location:login.php');
}
?>

<?php 
if (isset($_GET['mod'])) {
    $view = $_GET['mod'];
    $select = "SELECT * FROM donations WHERE ot_id='$view'";
    $runselect = mysqli_query($con,$select);

    if ($runselect -> num_rows > 0) {
        while ($row = $runselect -> fetch_assoc()) {
            $id = $row['ot_id'];
            $name = $row['name'];
            $date = $row['date'];
            $type = $row['type'];
            $amount = $row['amount'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="don.css">
    <title>Kaine fc</title>
</head>
<body>
<div class="main">
        <div class="nav">
           <div class="left">
             <div class="logo">
               <h1><img src="image/logo.png" alt="">Kaine fc</h1>
             </div>
                <a href="index.php">Dashboard</a>
                <a href="donors.php">donors</a>
                <a href="donations.php">Donations</a>
           </div>
</div>
        <div class="center">
            <div class="links">
                <div class="logo">  
                    <div class="navigate">
                        <a href="donations.php">Donations</a>
                        <a href="donors">Donors</a>
                    </div>
                </div>
            </div>
        <div class="bottom">
            <h2 style="color:#fff;margin-bottom:10px;"><center>Modify donor</center></h2>
                <form action="#" method="post">
                <label for="">ID</label><br>
                <input type="text" name="id" placeholder="Enter first name" value="<?php echo $id;?>"><br>
                <label for="">Name</label><br>
                <input type="text" name="name" placeholder="Enter first name" value="<?php echo $name;?>"><br>
                <label for="">Date</label><br>
                <input type="date" name="date" placeholder="Enter last name" value="<?php echo $date;?>"><br>
                <label for="">Type</label><br>
                <input type="text" name="type" placeholder="Enter your type" value="<?php echo $type;?>"><br>
                <label for="">Amount</label><br>
                <input type="number" name="amount" id="" value="<?php echo $amount;?>"><br>
                <div class="btn">
                    <button type="submit" name="update">Modify</button>
                    <button type="reset" onclick="window.location.replace('donations.php')">Cancel</button>
                </div>
            </form>
            <?php 
            if (isset($_POST['update'])) {
                $_id = $_POST['id'];
                $_name = $_POST['name'];
                $_date = $_POST['date'];
                $_type = $_POST['type'];
                $_amount = $_POST['amount'];
                $update = "UPDATE donations SET name= '$_name',date='$_date',type='$_type',amount='$_amount' WHERE ot_id = '$_id'";
                $runupdate = mysqli_query($con,$update);
                if ($update) {
                    // echo "<script>window.location.replace('donations.php')</script>";
                    header('location:donations.php');
                }
                else{
                    echo "<script>alert('Failure in updating donation')</script>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>

<style></style>