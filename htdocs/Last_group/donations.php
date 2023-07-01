<?php
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
    <title>Donors</title>
    <link rel="stylesheet" href="donations.css">
</head>
<body>
<div class="main">
        <div class="nav">
           <div class="left">
            <div class="logo">
            <h1><img src="image/logo.png" alt="">Kaine fc</h1>
            </div>
               <a href="index.php">Dashboard</a>
               <a href="donors.php">Donors</a>
               <a href="donations.php">Donations</a>
           </div>
        </div>
        <div class="center">
            <div class="links">
                <div class="logo">  
                    <div class="navigate">
                        <a href="donations.php">Donations</a>
                        <a href="donors.php">Donors</a>
                    </div>
                </div>
            </div>
        <div class="bottom">
        <div class="btn">
                <a href="">Print Report</a>
                <button onclick="print()">Print</button>
            </div>
            <div class="add">
                <button onclick="window.location.replace('donation_insert.php')">Add Donation</button>
            </div>
            <table border="0" cellpadding="10" cellspacing="0">
                    <th>
                        <tr>  
                        <td>Donation ID</td>
                        <td>Donation Name</td>
                        <td>Date of Donation</td>
                        <td>Donation Type</td>
                        <td>Donation Amount</td>
                        <td>Modify</td>
                        <td>Delete</td>
                        </tr>
                    </th>
                <?php 
                while($row = mysqli_fetch_array($runsql)){
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['type'];?></td>
                    <td><?php echo $row['amount'];?></td>
                    <td><a href="donation_update.php?mod=<?php echo $row['id']?>" class="upd">Update</a></td>
                    <td><a href="donations.php?mod=<?php echo $row['id']?>" class="del">Delete</a></td>
                </tr>
                <?php 
                }
                ?>
            </table>
            <div class="btns">
                <span>Are you sure you want to delete this record?</span>
                <div class="buttons">
                    <a href="donations.php?mod=<?= $row['id'];?>">Delete</a>
                    <a href="donations.php">Discard</a>
                </div>
            </div>
        <?php
        ?><?php 
        if (isset($_GET['mod'])) {
            $view = $_GET['mod'];
            $delete = "DELETE FROM donations WHERE id='$view'";
            $rundelete = mysqli_query($con,$delete);
            if ($rundelete) {
                echo "<script>('donations.php')</script>";
            }
        }
        ?>
        </div>
        </div>
</div>
</body>
</html>

<style>
    body{
        -webkit-print-color-adjust: exact;
    }
    @media print{
    .btn{
        display: none;
    }
    .add{
        display: none;
    }
    .nav{
        display: none;
    }
    .main .nav{
        display: none;
    }
    .main .navigate{
        display: none;
    }
    .main .links .logo{
        display: none;
    }
    .main table{
        width: 100%;
        padding: 10px;
    }
    .main table td:last-child{
        display: none;
    }
}
</style>