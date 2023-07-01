<?php 
   session_start();

   if(!isset($_SESSION['Ems'])){
      header('location: Login.php');
   }
   $con = mysqli_connect('localhost', 'root', '', 'ems');
   $sessionId = $_SESSION['Ems'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash</title>
    <link rel="stylesheet" href="Respo.css">
    <link rel="stylesheet" href="Min.css">
    <base href="#">
</head>
<body>
    <div class="dash-main">
    <div class="main">
        <div class="nav">
            <h2>E M S</h2>
            <div class="links">
                <a href="Import.php">Import</a>
                <a href="Expenses.php">Expenses</a>
                <a href="Logout.php"><button>Log Out</button></a>
            </div>
        </div>
        <div class="sidebar">
            <h1>Dashboard</h1>
            <div class="link">
                <a href="Dash.php">Dashboard</a>
                <a href="Import.php">Import</a>
                <a href="Expenses.php">Expenses</a>
            </div>
        </div>
        <div class="statistics">
            <div class="container">
                <div class="card">
                    <h1>Income</h1>
                    <?php
                        $user_query = "SELECT * FROM income";
                        $user_query_run = mysqli_query($con, $user_query);

                        if($income_total = mysqli_num_rows($user_query_run))
                        {
                            echo'<h1>'.$income_total.'</h1>';
                        }else{
                            echo'<span> No Data </span>';
                        }
                    ?>
                </div>
                <div class="card">
                    <h1>Expenses</h1>
                    <?php
                        $user_query = "SELECT * FROM expenses";
                        $user_query_run = mysqli_query($con, $user_query);

                        if($expenses_total = mysqli_num_rows($user_query_run))
                        {
                            echo'<h1>'.$expenses_total.'</h1>';
                        }else{
                            echo'<span> No Data </span>';
                        }
                    ?>
                </div>
                <div class="card">
                    <h1>Users</h1>
                        <?php
                            $user_query = "SELECT * FROM users";
                            $user_query_run = mysqli_query($con, $user_query);

                            if($user_total = mysqli_num_rows($user_query_run))
                            {
                                echo'<h1>'.$user_total.'</h1>';
                            }else{
                                echo'<span> No Data </span>';
                            }
                        ?>
                        &#128526;
                </div>
            </div>
        </div>
    </div>
</body>
</html>