<?php 
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <base href="#">
    <link rel="stylesheet" href="scss/style.css">
</head>
<body>
    <div class="register">
        <form action="#" method="POST" enctype="multipart/form-data">
            Enter Your Fullname
            <input type="text" name="fname" required title="Can't Send Empty Field">
            Enter Your E-Mail
            <input type="email" name="email" required title="Can't Send Empty Field">
            Enter Your Username
            <input type="text" name="username" required title="Can't Send Empty Field">
            Select an image
            <input type="file" name="picture" id="">
            Enter Password
            <input type="password" name="password" required title="Can't Send Empty Field">
            <div class="btn">
                <button name="submit">Register</button>
            </div>
            <p>Already Have Account <a href="Login.php">Login</a></p>
        </form>
        <?php
        if (!isset($_POST['submit'])) {
            echo "No";
        } 
        else{
            $fname=$_POST['fname'];
            $email=$_POST['email'];
            $user=$_POST['username'];
            $psw=$_POST['password'];
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["picture"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["picture"]["tmp_name"]);
                if($check !== false) {
                    $insert=mysqli_query($con,"INSERT INTO user VALUES ('','$fname','$user','$email','$target_file','$psw')");
                    $uploadOk = 1;
                    if ($insert==true) {
                        header('location:login.php');
                        move_uploaded_file($_FILES["picture"]["tmp_name"],"$target_file");
                    }
                    else{
                        header('location.register.php');
                        echo "No";
                    }
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
        }
        ?>
    </div>
</body>
</html>

<style>
    body{
        display: grid;
        height: 100vh;
        place-items: center;
     }
</style>