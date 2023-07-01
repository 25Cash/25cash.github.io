<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades</title>
</head>
<body>
    <div class="main">
        <form method="POST">
            Enter Your Marks
            <input type="number" name="num">
            <div class="btn">
                <button type="submit" name="sub">View Marks</button>
            </div>
    <?php
      if(isset($_POST['sub'])){
        $marks = $_POST['num'];
        if(!empty($marks)){
        switch ($marks){
            case $marks <= 100 && $marks >=80:
                echo "A";
                break;
            case $marks <= 79 && $marks >=70:
                echo "B";
                break;
            case $marks <= 69 && $marks >=60:
                echo "C";
                break;
            case $marks <= 59 && $marks >=50:
                echo "D";
                break;
            case $marks <= 49 && $marks >=0:
                echo "F";
                break;

            default:
                echo "You Have No Grades";
                break;
         }
        }
        else{
            echo "Enter Valid Marks";
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
        text-align: center;
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
    input[type="number"]::-webkit-inner-spin-button{
        display: none;
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
        color: #fff;
    }
</style>