<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form action="" method="POST">
        <h1>Login</h1>
        <input type="text" name="username" id="" placeholder="username" required autocomplete="off">
        <input type="password" name="password" id="" placeholder="password" required>
        <p style="margin-left:25px; font-weight: bold;">Don't Have Account? <a href="register.php">Register</a></p>
        <div class="b">
        <button name="login">Login</button>
        <a href="home.php" class="home">Go home</a>
        </div>
    </form>
    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $select = "SELECT * FROM users WHERE u_name='".$username."' AND u_password='".$password."'";
        $runselect= mysqli_query($con,$select);
        if (mysqli_num_rows($runselect) > 0) {
            $row = mysqli_fetch_assoc($runselect);
                if ($row["type"]=="manager") {
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['loggedIn']=true;
                    // echo "<script>window.location.replace('index.php')</script>";
                    header('location:index.php');
                }
                elseif($row["type"]=="accountant"){
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['loggedIn']=true;
                    // echo "<script>window.location.replace('accountant_index.php')</script>";
                    header('location:accountant_index.php');
                }
                else{
                    // echo "<script>alert('who are you')</script>";
                }
        }
        else{
            echo "<script>window.alert('Enter valid username and password')</script>";
        }
    }
    ?>
</body>
</html>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'poppins';
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
    }
    form{
        padding: 20px;
        box-shadow: 0px 0px 12px -5px;
        border-radius: 5px;
/*        border: 1px solid red;*/
    }
    h1{
       text-align: center;
    }
    input{
        padding: 10px;
        width: 90%;
        margin: 8px 25px;
        border: 1px solid #333;
        border-radius: 1px;
        outline: none;
        font-size: 12px; 
        border-radius: 2px;
    }
    .b{
/*        border: 1px solid red;*/
        display: flex;
        justify-content: space-between;
        padding: 10px 30px;
        width: 100%;
    }
    button{
        background: #333;
        color: #fff;
        cursor: pointer;
        width: 45%;
        font-weight: bold;
        transition: .4s;
        border: none;
        padding: 10px;
        border: 1px solid #333;
    }
    button:hover{
        background: transparent;
        border: 1px solid #000;
        color: #333;
    }
    .home{
        background: #333;
        color: #fff;
        cursor: pointer;
        width: 45%;
        font-weight: bold;
        transition: .4s;
        border: none;
        padding: 10px;
        text-decoration: none;
        border: 1px solid #333;
        border-radius: 3px;
        text-align: center;
    }
    .home:hover{
        background: transparent;
        border: 1px solid #000;
        color: #333;
    }
</style>