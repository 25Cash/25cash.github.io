<?php
    include('Coneect.php');

    if(isset($_POST['notify'])){
        $names = $_POST['names'];
        $uname = $_POST['uname'];
        $pw = $_POST['pw'];

        $check = mysqli_query($con,"SELECT * FROM users WHERE names = '$names' AND username = '$uname'");
        $numrow = mysqli_num_rows($check);

        if($numrow > 0){
            echo"<script>alert('You're Already Notified.')</script>";
        }else{
            $notify = mysqli_query($con,"INSERT INTO users VALUES('','$names','$unames','$pw')");
            if($notify){
                echo"<script>alert('You're Notified Now.')
                window.location.href = 'Log.php';  
                </script>";
            }else{
                echo"<script>alert('Failed To Be Notified.')</script>";
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
    <title>| Notify</title>
</head>
<body>
    <form action="">
        <h1>Notify Me</h1>
        <label>Your Names</label>
        <input type="text" name="names" required>
        <label>Your Username</label>
        <input type="text" name="uname" required>
        <label>Your Password</label>
        <input type="password" name="pw" required>
        <button type="submit" name="notify">Notify Me</button>
    </form>
</body>
</html>