<?php
    session_start();
    include('Coneect.php');

    if(isset($_POST['notify'])){
        $uname = $_POST['uname'];
        $pw = $_POST['pw'];

        $notify = mysqli_query($con,"SELECT * FROM users WHERE username = '$uname' AND password = '$pw'");
        $numrow = mysqli_num_rows($notify);
        if($numrow){
            echo"<script>alert('Redirecting.....')
            window.location.href = 'Dash.php';
            </script>";
        }else{
            echo"<script>alert('Failed To Redirect Notification.')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Notify</title>
</head>
<body>
    <form action="">
        <h1>Notify Me</h1>
        <label>Your Username</label>
        <input type="text" name="uname" required>
        <label>Your Password</label>
        <input type="password" name="pw" required>
        <button type="submit" name="notify">Notify Me</button>
    </form>
</body>
</html>