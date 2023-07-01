<?php 
session_start();
include 'connection.php';
?>
<?php 
$sql = "SELECT * FROM donations";
$runsql = mysqli_query($con,$sql);
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
                <a href="accountant_index.php">Dashboard</a>
                <a href="donors_accountant_view.php">Donors</a>
                <a href="donations_accountant_view.php">Donations</a>
           </div>
        </div>
        <div class="center">
            <div class="links">
                <div class="logo">  
                    <div class="navigate">
                        <a href="donations_accountant_view.php">Donations</a>
                        <a href="donors_accountant_view.php">Donors</a>
                    </div>
                </div>
            </div>
        <div class="form">
            <h2 style="color:#fff;margin-bottom:10px;"><center>Donation registry form</center></h2>
            <form action="#" method="post">
                <label for="">Name</label><br>
                <input type="text" name="name" placeholder="Name of donation" required><br>
                <label for="">Date</label><br>
                <input type="date" name="date" placeholder="date of donation" required><br>
                <label for="">Type</label><br>
                <input type="text" name="type" placeholder="type of donation" id="" required><br>
                <label for="">Amount</label><br>
                <input type="number" name="amount" placeholder="amount of donation" id="" required><br>
                <div class="btn">
                    <button type="submit" name="reg">Register</button>
                    <button type="reset">Cancel</button>
                </div>
            </form>
            <?php 
            if (isset($_POST['reg'])) {
                $name = $_POST['name'];
                $date = $_POST['date'];
                $type = $_POST['type'];
                $amount = $_POST['amount'];
                $sql = "INSERT INTO donations VALUES('','$name','$date','$type','$amount')";
                $runsql = mysqli_query($con,$sql);
                if ($runsql) {
                    echo "<script>window.location.replace('donations.php')</script>";
                }   
                else{
                    echo "<script>alert('Donation registry failed')</script>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>