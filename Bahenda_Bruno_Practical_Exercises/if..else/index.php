<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hours</title>
</head>
<body>
    <div class="main">
        <form action="" method="">
            <?php
                $date = date('H');
                if ($date > 20) {
                    echo "Have A Good Day";
                }else{
                    echo "Have A Good Night";
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
        font-family: 'Poppins';
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
        font-weight: bold;
        text-align: center;
        color: #185894;
        box-shadow: 0px 5px 18px rgba(0, 0, 0, 0.1)
    }
</style>