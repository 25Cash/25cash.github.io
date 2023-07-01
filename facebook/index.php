<?php 
session_start();
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontsawesome/all.min.css">
    <link rel="stylesheet" href="fontsawesome/fontawesome.min.css">
    <link rel="shortcut icon" href="img/faceboo.png">
    <title>Facebook - log in or sign up</title>
</head>
<body>
    <div class="main">
        <div class="title">
            <h1>facebook</h1>
            <p>Facebook helps you connect and share with the people in your life.</p>
        </div>
        <div class="form">
            <form action="#" method="post">
                <input type="text" name="emailorphone" id="" placeholder="Email address or Phone number">
                <input type="password" name="pass" id="" placeholder="Password">
                <button type="submit" name="login" class="log">Log in</button>
                <p class="forgotten"><a href="#">Forgotten password?</a></p>
                <hr>
                <label for="check"><button type="button" class="create">Create new account</button></label>
                <?php 
                if (isset($_POST['login'])) {
                    $email = $_POST['emailorphone'];
                    $password = $_POST['pass'];
                    $login = mysqli_query($con,"SELECT * FROM register WHERE address='".$email."' AND password='".$password."'");
                    if (mysqli_num_rows($login) > 0 ) {
                        $row = mysqli_fetch_assoc($login);
                        $_SESSION['username']=$row['username'];
                        $pic = $row['picture'];
                        $id = $row['id'];
                        if (!empty($pic)) {
                            header('Location: home.php');
                        }
                        else{
                            header('Location: username.php?id='.$row['id']);
                        }
                    }
                    else{
                        echo "<script>alert('Invalid login info')</script>";
                    }
                }
                ?>
            </form>
            <p class="page"><a href="#">Create a page</a>&nbsp;for a celebrity, brand or business.</p>
        </div>
        
    </div>
    <div class="register">
        <form action="#" method="post">
            <h1>Sign up</h1>
            <p class="tile">It's quick and easy</p>
            <i class="fa fa-multiply" id="close"></i>
            <hr>
            <input type="text" class="first" name="fname" id="" placeholder="First name" required>
            <input type="text" class="second" name="lname" id="" placeholder="Last name" required>
            <input type="text" class="third" name="username" id="" placeholder="Username" required>
            <input type="text" class="third" name="address" id="" placeholder="Mobile number or email address" required>
            <input type="text" class="third" name="address" id="" placeholder="Confirm Mobile number or email address" required>
            <input type="text" class="four" name="password" id="" placeholder="New password" required>
            <h5>Date of birth</h5>
            <select name="day" id="" class="day">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <select name="month" id="" class="month">
                <option value="january">Jan</option>
                <option value="february">Feb</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="november">November</option>
                <option value="december">December</option>
            </select>
            <select name="year" id="" class="year">
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
            </select>
            <h5>Gender</h5>
            <div class="gender">
                <div class="sex">
                    Female
                    <input type="radio" name="gender" id="" value="FEMALE">
                </div>
                <div class="sex">
                    Male
                    <input type="radio" name="gender" id="" value="MALE">
                </div>
                <div class="sex">
                    Custom
                    <input type="radio" name="gender" id="" value="CUSTOM">
                </div>
            </div>
            <p class="people">People who use our service may have uploaded your contact information to Facebook. <a href="#">Learn more.</a></p>
            <p class="click">By clicking Sign Up, you agree to our <a href="#">Terms, Privacy Policy.</a>and <a href="#">Cookies Policy.</a> You may receive SMS notifications from us and can opt out at any time.</p>
            <button type="submit" name="register" class="signup">Sign Up</button>
        </form>
        <?php 
        if (isset($_POST['register'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_POST['username'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year = $_POST['year'];
            $gender = $_POST['gender'];
            $age = 2023 - $year;
            if (!empty($fname)) {
                if (!empty($lname)) {
                    if (!empty($address)) {
                        if (!empty($password)) { 
                            if ($age>17) {
                                $slt = mysqli_query($con,"SELECT * FROM register WHERE username='".$username."' AND address='".$address."'");
                                if (mysqli_num_rows($slt) > 0) {
                                    echo "<script>alert('records already exist')</script>";
                                }
                                else{            
                                    $insert = "INSERT INTO register VALUES('','$fname','$lname','$username','$address','$password','$day','$month','$year','$gender','')";
                                    $runinsert = mysqli_query($con,$insert);
                                    if ($runinsert) {
                                        header('Location: index.php');
                                    }  
                                    else{
                                        echo "Registration Failed!!!";
                                    }
                                }
                            }
                            else{
                                header("Location:index.php");
                            }
                        }
                    }
                }
            }
        }
        ?>
    </div>
    <script>
        document.querySelector('.create').addEventListener('click', () => {
            document.querySelector('.register').classList.toggle('active');
        })
        document.querySelector('#close').addEventListener('click', () => {
            document.querySelector('.register').classList.toggle('active');
        })
    </script>
</body>
</html>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'arial';
    }

    :root{
        --main-fb-color: #1586f7;
        --second-hand: #3ec53e;
    }
    .main{
        width: 100%;
        height: 100vh;
        background-color: rgb(240, 240, 253);
        padding: 10px;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        z-index: -10;
    }
    button{
        cursor: pointer;
    }
    .title{
        font-size: 26px;
        width: 36%;
        padding: 10px;
        margin-bottom: 100px;
    }
    .title h1{
        color: var(--main-fb-color);
        margin-bottom: 20px;
    }
    .form{
        width: 29%;
    }
    form{
        box-shadow: 0px 0px 10px #ccc;
        border-radius: 10px;
        border: 1px solid #ccc;
        padding: 10px;
        background: #fff;
        width: 100%;
    }
    .form input{
        width: 100%;
        padding: 10px;
        outline-color: var(--main-fb-color);
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 18px;
        margin-bottom: 10px;
    }
    .log{
        background-color: var(--main-fb-color);
        border: none;
        color: #fff;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        font-size: 18px;
        font-weight: bold;
        margin: 0 0 20px 0;
    }
    .forgotten{
        text-align: center;
    }
    .forgotten a{
        color: #1586f7;
        text-decoration: none;
    }
    hr{
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .create{
        background-color: var(--second-hand);
        color: #fff;
        font-size: 18px;
        border: 1px solid var(--second-hand);
        padding: 10px 10px;
        border-radius: 5px;
        margin-left: 100px;
        margin-bottom: 20px;
    }
    .page{
        display: flex;
        justify-content: center;
        padding-top: 20px;
    }

    .page a{
        text-decoration: none;
        color: #000;
        font-weight: bold;
    }
    .register{
        display: flex;
    }
    .register{
        width: 100%;
        /* display: none; */
        opacity: 0;
        pointer-events: none;
        background: rgba(0, 0, 0, 0.26);
        backdrop-filter: blur(5px);
        height: 100%;
        transition: .5s;
        justify-content: center;
        align-items: center;
        padding: 35px 0;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1;
    }
    .register.active{
        opacity: 1;
        pointer-events: all;
    }
    .register.active form{
        top: 0;
    }
    .register form{
        width: 30%;
        position: relative;
        top: 50px;
        transition: .5s;
    }
    .register h1{
        font-weight: bold;
    }
    .register .tile{
        color: #696868;
    }
    .register form{
        box-shadow: 0px 0px 5px #ccc;
        border: none;
    }
    .register input{
        background: #eeeff8d7;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        outline-color: #1586f7;
        font-size: 14px;
    }
    .third{
        width: 100%;
    }
    .four{
        width: 100%;
    }

    h5{
        color: #636060;
        font-size: medium;
        margin: 10px 0;
    }
    select{
        width: 30%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;outline: none;
    }
    .gender{
        width: 100%;
        column-count: 3;
        margin-bottom: 10px;
    }
    .sex{
        padding: 0px 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .sex input{
        margin-top: 10px;
    }
    .people{
        color: #606161;
        font-size: small;
        margin-bottom: 3px;
    }
    .people a{
        text-decoration: none;
        color: #1586f7;
    }
    .click{
        font-size: small;
        color: #606161;
        margin-bottom: 6px;
    }
    .click a{
        text-decoration: none;
        color: #1586f7;
    }
    .signup{
        background: #00a400;
        color: #fff;
        padding: 5px 30px;
        font-size: 20px;
        font-weight: bolder;
        border: none;
        width: 40%;
        margin-left: 120px;
        margin-top: 20px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
    hr{
        width: 100%;
    }
    i{
        float: right;
        font-size: 24px;
        position: relative;
        bottom: 50px;
        right: 10px;
        cursor: pointer;
    }
</style>