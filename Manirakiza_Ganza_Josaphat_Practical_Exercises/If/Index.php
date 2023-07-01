

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gender-Checker</title>
</head>
<body>
    <div class="container">
        <form method="POST">
            <select name="sex" id="" required>
                <option value="" selected hidden>Choose Your Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Homophobic</option>
            </select>
            <div class="btn">
                <button type="submit" name="submit">Display</button> 
            </div>

            <?php
                if(isset($_POST['submit'])){
                    $gender = $_POST['sex'];
                    echo "Your Gender Is&nbsp;: &nbsp;" .$gender;
                }
            ?>
        </form>
    </div>
</body>
</html>

<style>
    *{
        margin: 0;
        box-sizing: border-box;
        font-family: Poppins;
        padding: 0;
    }
    body{  
        background: #2073c00a;
    }
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container form{
        width: 400px;
        padding: 20px;
        height: 150px;
        background: #fff;
        text-align: center;
        color: #185894;
        border-radius: 5px;
        box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.1); 
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
        padding: 20px;
    }
    form button{
        border: 1px solid #185894;
        background: transparent;
        padding: 4px 10px;
        cursor: pointer;
        font-weight: bold;
        width: 50%;
        box-shadow: inset 0px 1px 15px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        transition: .4s;
        overflow: hidden;
        position: relative;
        color: #185894;
    }
    form button::before{
        content: '';
        position: absolute;
        width: 0;
        height: 30px;
        transition: .6s;
        left: 0;
        top: 0;
        background: #2a609288;
        z-index: 1;
    }
    form button:hover::before{
        right: 0;
        width: 100%;
    }
</style>