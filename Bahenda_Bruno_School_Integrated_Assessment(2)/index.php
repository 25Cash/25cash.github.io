<?php 
session_start();
include 'connection.php';
if(!$_SESSION['loggedIn']=true){
    header('location:login.php');
}
?>
<?php 
$use = "SELECT user_id FROM users ORDER BY user_id";
$result = mysqli_query($con,$use);
$row = mysqli_num_rows($result);
?>
<?php 
$donation = "SELECT ot_id FROM donations ORDER BY ot_id";
$result = mysqli_query($con,$donation);
$raw = mysqli_num_rows($result);
?>
<?php 
$donor = "SELECT d_id FROM donors ORDER BY d_id";
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
    <script>
        function back() {window.history.forward();}
        setTimeout("back()",0);
        window.onunload=function(){null};
    </script>
</head>
<body>
    <div class="main">
        <div class="nav">
           <div class="left">
             <div class="logo">
               <h1><img src="image/logo.png" alt="">Kaine fc</h1>
             </div>
             <div class="links">
                <a href="index.php">Dashboard</a>
                <a href="donors.php">Donors</a>
                <a href="donations.php">Donations</a>
            </div>
                <button class="submit" onclick="window.location.replace('logout.php');">Logout</button>
           </div>
        </div>
        <div class="center">
            <div class="links">
                <div class="logos">  
                    <div class="navigate">
                    </div>
                        <div class="well">
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
                    <span>Total Users&nbsp;<p>(<?php echo $row?>)</p></span>
                </div>
                <div class="card">
                    <span>Donors&nbsp;<p>(<?php echo $ruw?>)</p></span>
                </div>
                <div class="card">
                    <span>Donations&nbsp;<p>(<?php echo $raw?>)</p></span>
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