<?php
session_start();
include 'connection.php';
?>

<?php 
$sql = "SELECT * FROM donors";
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
    <link rel="stylesheet" href="donor.css">
</head>
<body>
<div class="main">
        <div class="nav">
           <div class="left">
            <div class="logo">
            <h1><img src="image/logo.png" alt="">Kaine fc</h1>
            </div>
               <a href="zccountant_index.php">Dashboard</a>
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
        <div class="btn">
                <a href="#">Print Report</a>
                <button onclick="print()">Print</button>
            </div>
            <table border="0" cellpadding="10" cellspacing="0">
                    <th>
                        <tr>  
                        <td>ID</td>
                        <td>FirstName</td>
                        <td>LastName</td>
                        <td>Gender</td>
                        <td>Date</td>
                        <td>Email</td>
                        <td>Donation ID</td>
                        <td>User ID</td>
                        </tr>
                    </th>
            <div class="add">
                <button onclick="window.location.replace('donors_accountant.php')">Add Donor</button>
            </div>
                <?php 
                while($row = mysqli_fetch_array($runsql)){
                ?>
                <tr>
                    <td><?php echo $row['d_id'];?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['sex'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['ot_id'];?></td>
                    <td><?php echo $row['user_id'];?></td>
                </tr>
                <?php 
                }
                ?>
            </table>
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
    .main table td{
        padding: 5px;
    }
}
</style>