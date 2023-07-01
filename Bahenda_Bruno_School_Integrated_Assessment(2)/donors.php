<?php
session_start();
include 'connection.php';
if(!$_SESSION['loggedIn']=true){
    header('location:login.php');
}
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
               <a href="index.php">Dashboard</a>
               <a href="donors.php">Donors</a>
               <a href="donations.php">Donations</a>
           </div>
        </div>
        <div class="center">
            <div class="links">
                <div class="logo">  
                    <div class="navigate">
                        <h2>Donors view page</h2>
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
                        <td>Modify</td>
                        <td>Delete</td>
                        </tr>
                    </th>
            <div class="add">
                <button onclick="window.location.replace('donors_insert.php')">Add Donor</button>
            </div>
                <?php 
                $sel=mysqli_query($con,"SELECT * FROM donors");
                while($row = mysqli_fetch_array($sel)){
                ?>
                <tr>
                    <td><?php echo $row['d_id'];?></td>
                    <td><?php echo $row['f_name'];?></td>
                    <td><?php echo $row['l_name'];?></td>
                    <td><?php echo $row['sex'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['ot_id'];?></td>
                    <td><?php echo $row['user_id'];?></td>
                    <td><a href="donor_update.php?mod=<?php echo $row['d_id']?>" class="upd">Update</a></td>
                    <td><a href="donors.php?mod=<?php echo $row['d_id']?>" class="del">Delete</a></td>
                </tr>
                <?php 
                }
                ?>
            </table>
        <?php
        ?><?php 
        if (isset($_GET['mod'])) {
            $view = $_GET['mod'];
            $delete = "DELETE FROM donors WHERE d_id='$view'";
            $rundelete = mysqli_query($con,$delete);
            if ($rundelete) {
                // echo "<script>('donors.php')</script>";
                header('location:donors.php');
            }
            else{
                echo "Failure in deleting donor";
            }
        }
        ?>
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