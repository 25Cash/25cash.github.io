<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin : 0;
            padding : 0;
            box-sizing : border-box;
            font-family : 'poppins';
            font-size : 20px;
        }
        .main{
            display: block;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
    <div class="main">
    <?php 
    function loop(){
        for ($i=1; $i < 100; $i++) { 
            if ($i%2 == 0) {
                echo $i;
            }
        }
    }
    return loop();
    ?>
    </div>
</body>
</html>