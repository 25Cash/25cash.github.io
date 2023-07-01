<?php
    session_start();
    include('Connection.php');
    if(isset($_POST['send'])){
        $uname = $_POST['uname'];
        $pw = $_POST['pw'];
        $query = mysqli_query($con,"SELECT * FROM users WHERE username = '$uname' AND password ='$pw'");
        if($query){
            echo"<script>alert('Logged In')
            window.location.href='./dash/Dash.php';
            </script>";
                $_SESSION['feedpost']= $_POST['uname'];
        }else{
            echo"<script>alert('Unknown Credentials')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Feed Posts</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/icons8_smiling_face_with_sunglasses_256px.png" type="image/x-icon">
</head>
<body>
    <form method="POST">
        <h1>Login Here</h1>
        Username
        <input type="text" name="uname" required>
        Password
        <input type="Password" name="pw" required>
        <div class="cookies-idea">
            Remember Me
            <input type="checkbox" name="">
        </div>
        <button type="submit" name="send">Send</button>
        <div class="redirect">
            <p>Not A Member<a href="Register.php">&nbsp;&nbsp;&nbsp;Register Here</a></p>
        </div>
    </form>
</body>
</html>

<style>
    body{
        display: grid;
        height: 100vh;
        place-items: center;
    }
</style>