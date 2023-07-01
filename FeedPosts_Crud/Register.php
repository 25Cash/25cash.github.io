<?php
    include('Connection.php');
    if(isset($_POST['send'])){
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pw = $_POST['pw'];

        $check = mysqli_query($con,"SELECT * FROM users WHERE username = '$uname'");
        $numrow = mysqli_num_rows($check);
        if($numrow > 0){
            echo"<script>alert('User Already Exists')</script>";
        }else{
            mysqli_query($con,"INSERT INTO users VALUES('','$uname','$email','$pw')");
            echo"<script>alert('Account Created Successfully')
            window.location.href='Login.php';
            </script>";
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
        <h1>Register Here</h1>
        Username
        <input type="text" name="uname" required>
        E-Mail
        <input type="email" name="email" required>
        Password
        <input type="Password" name="pw" required>
        <button type="submit" name="send">Send</button>
        <div class="redirect">
            <p>Already A Member<a href="Login.php">&nbsp;&nbsp;&nbsp;Login Here</a></p>
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