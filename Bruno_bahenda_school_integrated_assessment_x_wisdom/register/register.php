<?php 
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/register.css">
    <title>login</title>
</head>
<body>
    <div class="register_success">
        <h4>Registration <span id="registered"></span></h4>
    </div>
    <form method="POST" class="register">
        <h4>create account</h4>
        <input type="text" name="username" id="" autocomplete="off">
        <input type="password" name="password" id="">
        <p>Already have account? <a href="login.php">Login here</a></p>
        <div class="btns">
        <button name="register" class="register">Register</button>
        </div>
        <?php 
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (!empty($username)) {
                if (!empty($password)) {
                    $insert = mysqli_query($con,"INSERT INTO users VALUES('','$username','$password')");
                    if ($insert) {
                        // header('location: register.php');
                        echo "<script>alert('user registered successfully');window.location.href='login.php'</script>";
                    }
                }
                else{
                    echo "<script>alert('user registration failed!');window.location.href='register.php'</script>";
                }
            }
            else {
                echo "<script>alert('Please state a username')</script>";
            }
        }
        ?>
    </form>
</div>
</body>
</html>