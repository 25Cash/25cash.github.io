<?php

    include('Connekt.php');
    session_start();

    if(!isset($_SESSION['Log'])){
        header('location: Login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Dating</title>
    <base href="#">
    <link rel="stylesheet" href="scss/style.css">
</head>
<body>
    <div class="dash">
        <div class="sidebar">
            <h1>Dashboard Dating</h1>
            <div class="links">
                <a href="List_Users.php">List Of Users</a>
                <a href="Settings.php">Settings</a>
                <a href="Logout.php">Logout</a>
            </div>
        </div>
        <div class="dash-left">
            <div class="nav">
                <div class="sess">
                    <h1>Hello,<?php echo $_SESSION['Log'] ?></h1>
                </div>
                <div class="luv">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48"><radialGradient id="DcsSxham0XVhduFVFVx7Ja" cx="16.806" cy="16.701" r="23.479" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#73e544"/><stop offset=".642" stop-color="#4eb915"/><stop offset="1" stop-color="#3da500"/></radialGradient><path fill="url(#DcsSxham0XVhduFVFVx7Ja)" d="M32.589,8.533c-5.113,0-8.589,3.436-8.589,3.436s-3.457-3.436-8.589-3.436c-5.692,0-10.307,4.615-10.307,10.307C5.104,29.147,24,39.454,24,39.454S42.896,29.147,42.896,18.84C42.896,13.147,38.282,8.533,32.589,8.533z"/><linearGradient id="DcsSxham0XVhduFVFVx7Jb" x1="24.224" x2="23.474" y1="10.495" y2="38.413" gradientUnits="userSpaceOnUse"><stop offset=".147" stop-color="#54c01c" stop-opacity="0"/><stop offset=".845" stop-color="#3d8100"/></linearGradient><path fill="url(#DcsSxham0XVhduFVFVx7Jb)" d="M32.589,8.533c-5.113,0-8.589,3.436-8.589,3.436s-3.457-3.436-8.589-3.436c-5.692,0-10.307,4.615-10.307,10.307C5.104,29.147,24,39.454,24,39.454S42.896,29.147,42.896,18.84C42.896,13.147,38.282,8.533,32.589,8.533z"/><radialGradient id="DcsSxham0XVhduFVFVx7Jc" cx="5.032" cy="60.991" r="7.589" gradientTransform="matrix(.8237 -.567 .3817 .5545 -12.267 -15.547)" gradientUnits="userSpaceOnUse"><stop offset=".129" stop-color="#acf97a"/><stop offset=".834" stop-color="#acf97a" stop-opacity="0"/></radialGradient><path fill="url(#DcsSxham0XVhduFVFVx7Jc)" d="M21.164,11.949c1.267,2.195-0.395,5.528-3.714,7.444s-7.036,1.69-8.303-0.506s0.395-5.528,3.714-7.444S19.897,9.753,21.164,11.949z" opacity=".69"/></svg>
                    <p><span>D</span>ate <span>M</span>e</p>
                </div>
            </div>
            <div class="status">
                <div class="card">
                    Users
                    <span>
                        <?php
                            $user_query = "SELECT * FROM users";
                            $user_query_run = mysqli_query($con, $user_query);

                            if($income_total = mysqli_num_rows($user_query_run))
                            {
                                echo'<span>'.$income_total.'</span>';
                            }else{
                                echo'<span> No Data </span>';
                            }
                        ?>
                    </span>
                </div>
                <div class="card">
                    Date
                    <span><?php echo date("l M Y") ?></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>