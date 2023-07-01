<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            display: block;
            margin: 10px 0 5px 0;
        }
    </style>
</head>
<body>
    <fieldset>
    <form action="#" method="post">
    <input type="number" name="num1" id="" placeholder="Number 1">
    <input type="number" name="num2" id="" placeholder="Number 2">
    <input type="submit" name="gen" id="" value="generate">
    </form>
    <?php
    if (isset($_POST['gen'])) {
        $x = $_POST['num1'];
        $y = $_POST['num2'];
        $sum =$x+$y;
        echo "<script>alert('$sum')</script>";
    }
    ?>
</fieldset>
</body>
</html>