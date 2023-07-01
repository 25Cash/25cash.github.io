<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camps</title>
</head>
<body>
    <div class="container">
        <form method="POST">
            <h1>Camp Registration</h1>
        <select name="gender" id="" required>
            <option selected hidden>Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <select name="class" required>
            <option selected hidden>Degree</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
        Your Age
        <input type="number" name="age">
        <div class="btn">
            <button type="submit" name="send">Send</button>
        </div>
        <?php 
            if (isset($_POST['send'])) {
                $gender = $_POST['gender'];
                $age = $_POST['age'];
                $degree = $_POST['class'];
                if ($gender == 'Female') {
                    if ($degree == 1) {
                        if ($age >= 18) {
                        echo 'Welcome';
                        }
                    }
                    else{
                        echo 'Your request has been declined';
                    }
                }
                else{
                    echo 'Males are not allowed';
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
        font-family: 'Poppins';
    }
    body{  
        background: #2073c00a;
    }
    .container{
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container form{
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
    form h1{
        text-align: center;
        font-size: 20px;
    }
    form input{
        padding: 5px;
        border: 1px solid #185894;
        border-radius: 4px;
    }
    form input[type="number"]::-webkit-inner-spin-button{
        display: none;
    }
    form select{
        outline: none;
        padding: 4px;
        width: 100%;
        border: 1px solid #185894;
        cursor: pointer;
        border-radius: 4px;
        box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.1);
        color: #185894;
        text-align: center;
        font-weight: bold;
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