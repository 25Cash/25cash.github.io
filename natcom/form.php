<?php 
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Signup</title>
</head>
<body>
    <div class="main">
        <form method="post">
        <h1>Signup form</h1>
        <fieldset>
            <legend>Personal Information</legend>
            <label for="#">Firstname</label>
            <input type="text" name="fname" class="others" id="">
            <label for="#">Lastname</label>
            <input type="text" name="lname" class="others" id="">
            <label for="#">E-mail</label>
            <input type="email" name="email" class="others" id="">
            <label for="#">Password</label>
            <input type="password" name="pass" class="others" id="">
            <h5>Gender</h5>
            <label for="#">Male</label>
            <input type="radio" name="gender" id="" value="Male" required>
            <label for="#">Female</label>
            <input type="radio" name="gender" id="" value="Female" required>
            <button type="submit" name="submit">Submit</button>
            <?php 
            if (isset($_POST['submit'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $gender = $_POST['gender'];
                if (!empty($fname)) {
                    if (!empty($lname)) {
                        if (!empty($email)) {
                            if (!empty($pass)) {
                                if (!empty($gender)) {
                                    $insert = "INSERT INTO users VALUES('','$fname','$lname','$email','$pass','$gender')";
                                    $runinsert = mysqli_query($con,$insert);
                                    if ($runinsert) {
                                        header("Location:form.php");
                                    }
                                }
                                else{
                                    echo "<script>alert('What's your gender')</script>";
                                }
                            }
                            else{
                                echo "<script>alert('Enter a password please')</script>";
                            }
                        }
                        else{
                            echo "<script>alert('Enter your E-mail please')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Enter your lastname please')</script>";
                    }
                }
                else {
                    echo "<script>alert('Enter your firstname please')</script>";
                }
            }
            ?>
        </fieldset>
    </form>
    </div>
</body>
</html>