<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Days Of A Week</title>
</head>
<body>
    <div class="main">
        <form method="POST">
            Enter The Day
            <input type="text" name="days">
            <div class="btn">
                <button type="submit" name="sub">Display</button>
            </div>
            <?php
            if (isset($_POST['sub'])) {
            $day = $_POST['days'];
            if (!empty($day)) {
                if ($day == 1) {
                    echo "Monday";
                }
                else if ($day == 2) {
                    echo "Tuesday";
                }
                else if ($day == 3) {
                    echo "Wednesday";
                }
                else if ($day == 4) {
                    echo "Thursday";
                }
                else if ($day == 5) {
                    echo "Friday";
                }
                else if ($day == 6) {
                    echo "Saturday";
                }
                else if ($day ==7){
                    echo "Sunday";
                }
                else {
                    echo "Enter Valid Day Of A Week";
                }
            }
            else {
                echo "Please Enter A Day";
            }
        }
        ?>
        </form>
    </div>
</body>
</html>

<style>
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Poppins;
    }
    body{  
        background: #2073c00a;
    }
    .main{
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .main form{
        padding: 20px;
        width: 400px;
        border-radius: 5px;
        flex-direction: column;
        display: flex;
        font-weight: bold;
        row-gap: 10px;
        color: #185894;
        box-shadow: 0px 5px 18px rgba(0, 0, 0, 0.1)
    }
    form input{
        padding: 5px 8px;
        outline: none;
        border: 1px solid #185894;
        border-radius: 4px;
    }
    .btn{
        display: flex;
        justify-content: center;
        margin: 5px 0;
    }
    .btn button{
        padding: 6px 15px;
        width: 50%;
        cursor: pointer;
        border: 1px solid #185894;
        border-radius: 25px;
        background: #185894;
        position: relative;
        overflow: hidden;
        color: #fff;
    }
</style>