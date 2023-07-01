<?php 
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/account.css">
    <link rel="stylesheet" href="../assets/css/themify-icons/themify-icons.css">
    <title>Login-or-Signup-to-continue</title>
</head>
<body>
    <div class="main">
        <div class="go-snack">
            <h2><i class="ti-check" id="icon"></i></h2><span id="output">Registration successfull</span>
        </div>
        <div class="no-snack">
            <h2><i class="ti-close" id="icon"></i></h2><span id="output">Registration failed</span>
        </div>
        <div class="forms">
            <form method="post" class="register">
                <h3>Create an account</h3>
                <input type="text" id="user" name="user" placeholder="Enter your username" autocomplete="off">
                <p id="name">.</p>
                <input type="email" id="maili" name="Email" placeholder="Enter your email" autocomplete="off">
                <p id="mail">.</p>
                <input type="password" id="pasw" name="pwd" placeholder="Enter your password" autocomplete="off">
                <p id="pass">.</p>
                <button name="register" class="btn">Sign up</button>
            </form>
            <?php 
            if (isset($_POST['register'])) {
                $userName=$_POST['user'];
                $Email=$_POST['Email'];
                $passWord=$_POST['pwd'];
                $type="user";
                if (!empty($userName)) {
                    if (!empty($Email)) {
                        if (!empty($passWord)) {
                                $insert=mysqli_query($con,"INSERT INTO users VALUES('','$userName','$Email','$passWord','$type')");
                                    if ($insert) {
                                        echo "<script>
                                            document.querySelector('.go-snack').classList.add('active');
                                            setTimeout(()=>{
                                                document.querySelector('.go-snack').classList.remove('active');
                                                window.location.href='account.php';
                                            },3000)
                                            console.log('yes')
                                        </script>";
                                    }
                                    else{
                                        echo "<script>
                                            document.querySelector('.no-snack').classList.add('active');
                                            setTimeout(()=>{
                                                document.querySelector('.no-snack').classList.remove('active');
                                            },3000)
                                        </script>";
                                    }
                        }
                        else {
                            echo "<script>
                                document.querySelector('#pasw').style.backgroundColor='#ff63474f';
                                document.querySelector('#pass').innerHTML='Please enter a valid password!';
                                document.querySelector('#pass').style.color='tomato';
                                console.log('Enter password');
                            </script>";
                            // echo "<script>alert('nooooo')</script>";
                        }
                    }
                    else{
                        echo "<script>
                            document.querySelector('#maili').style.backgroundColor='#ff63474f';
                            document.querySelector('#mail').innerHTML='Please enter a valid E-mail please!';
                            document.querySelector('#mail').style.color='tomato';
                            console.log('Enter email');
                        </script>";
                    }
                }
                else{
                    echo "<script>
                        document.querySelector('#user').style.backgroundColor='#ff63474f';
                        document.querySelector('#name').innerHTML='Please enter a valid username please!';
                        document.querySelector('#name').style.color='tomato';
                        console.log('Enter username');
                    </script>";
                }
            }
            ?>
            <hr>
            <div class="or">
                <p>or</p>
            </div>
            <form method="post" class="login">
                <h3>Login to continue</h3>
                <input type="text" id="userr" name="username" placeholder="Enter your username" autocomplete="off">
                <p id="namee">.</p>
                <input type="password" id="pasd" name="password" placeholder="Enter your password" autocomplete="off">
                <p id="passs">.</p>
                <button name="login" class="btn">Sign in</button>
            </form>
            <?php 
            if (isset($_POST['login'])) {
                $username=$_POST['username'];
                $password=$_POST['password'];
                if (!empty($username)) {
                    if (!empty($password)) {
                        $login=mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password'");
                        if (mysqli_num_rows($login)>0) {
                            $Type=mysqli_fetch_assoc($login);
                            session_start();
                            $_SESSION['username']=$username;
                            if ($Type['type']=='admin') {
                                echo "<script>
                                    document.querySelector('.go-snack').classList.add('active');
                                    document.querySelector('#output').innerHTML='Login successfull';
                                    setTimeout(()=>{
                                        document.querySelector('.go-snack').classList.remove('active');
                                        window.location.href='../pages/admin.php';
                                    },3000)
                                    console.log('yes')
                                </script>";
                            }
                            else{
                                echo "<script>
                                    document.querySelector('.go-snack').classList.add('active');
                                    document.querySelector('#output').innerHTML='Login successfull';
                                    setTimeout(()=>{
                                        document.querySelector('.go-snack').classList.remove('active');
                                        window.location.href='../pages/homepages.php';
                                    },3000)
                                    console.log('yes')
                                </script>";
                            }
                        }
                        else{
                            echo "<script>
                                document.querySelector('.no-snack').classList.add('active');
                                document.querySelector('#output').innerHTML='Login failed';
                                setTimeout(()=>{
                                    document.querySelector('.no-snack').classList.remove('active');
                                },3000)
                            </script>";
                        }
                    }
                    else {
                        echo "<script>
                            document.querySelector('#pasd').style.backgroundColor='#ff63474f';
                            document.querySelector('#passs').innerHTML='Please enter a valid password!';
                            document.querySelector('#passs').style.color='tomato';
                            console.log('Enter password');
                        </script>";
                        // echo "<script>alert('nooooo')</script>";
                    }
                }
                else{
                    echo "<script>
                        document.querySelector('#userr').style.backgroundColor='#ff63474f';
                        document.querySelector('#namee').innerHTML='Please enter a valid username please!';
                        document.querySelector('#namee').style.color='tomato';
                        console.log('Enter username');
                        // document.querySelector('#userr').addEventListener('input',()=>{

                        // })
                    </script>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>