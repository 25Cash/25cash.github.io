<?php 
session_start();
include 'connection.php';
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
?>
<?php 
$use = "SELECT id FROM users ORDER BY id";
$result = mysqli_query($con,$use);
$row = mysqli_num_rows($result);
?>
<?php 
$donation = "SELECT id FROM donations ORDER BY id";
$result = mysqli_query($con,$donation);
$raw = mysqli_num_rows($result);
?>
<?php 
$donor = "SELECT id FROM donors ORDER BY id";
$result = mysqli_query($con,$donor);
$ruw = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome/all.min.css">
    <link rel="stylesheet" href="fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="inde.css">
    <link rel="shortcut icon" href="image/logo.png">
    <title>Kaine fc</title>
    <base href="#">
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
                <div class="logos">  
                    <div class="navigate">
                        <a href="">Report</a>
                        <a href="donations.php">Donations</a>
                        <a href="donors.php">Donors</a>
                    </div>
                        <div class="well">
                           <button class="submit" onclick="window.location.replace('logout.php');">Logout</button>
                           <div class="sess">
                               <span>You're Welcome &nbsp;</span>
                               <h4><?php echo $_SESSION['username'];?></h4>
                           </div>
                           <div class="dropdown">
                              <div class="drop" id="dropclick">
                                  Options
                                <span id=""></span>
                              </div>
                              <div class="dropdown-cont">
                                  <a href="">View Profile</a>
                                  <a href="">Change password</a>
                                  <a href="logout.php">Logout</a>
                              </div>
                           </div>
                        </div>
                </div>
            </div>
            <div class="st-t">
                <h1>Welcome to Manager Dashboard </h1>
            </div>
            <div class="content">
                <div class="card">
                    <h1>Total Users</h1>
                    <p><?php echo $row?></p>
                </div>
                <div class="card">
                    <h1>Donors</h1>
                    <p><?php echo $ruw?></p>
                </div>
                <div class="card">
                    <h1>Donations</h1>
                    <p><?php echo $raw?></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('#dropclick').addEventListener('click', function() {
            this.parentElement.classList.toggle('active');
        })
    </script>
</body>
</html>