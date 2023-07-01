<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontsawesome/all.min.css">
    <link rel="stylesheet" href="fontsawesome/fontawesome.min.css">
    <title>Gender</title>
</head>
<body>
    <form method="POST">
    <select name="choose" id="">
        <option value="" selected hidden>Choose your gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Bi-gender</option>
    </select>
    <button type="submit" name="display">Display</button>
    <?php
    if (isset($_POST['display'])) {
        $gender = $_POST['choose'];
        echo '<p style="margin: 10px 0 0 20px;"><i class="fa-solid fa-person"></i> your gender is : '.$gender.'</p>';
    }
    ?>
</form>
<style>
    *{
        margin : 0;
        padding : 0;
        box-sizing : border-box;
        font-family: 'poppins';
    }
    body{
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    form{
        box-shadow: 1px 1px 5px #000;
        width : 30%;
        height: 35vh;
        padding: 5px;
    }
    select{
        width : 100%;
        padding: 5px 10px;
        outline: none;
        margin: 45px 0 0 0;
        border: 1px solid #000;
    }
    button{
        width:90%;
        height: 5vh;
        background: #fff;
        color: #000;
        border: 1px solid #000;
        margin: 50px 0 0 18px;
        cursor: pointer;
        position: relative;
        z-index: 1;
        transition: 1s;
        overflow: hidden;
    }
    button::before{
        content: '';
        background: black;
        position: absolute;
        width: 0;
        height: 100%;
        top: 0;
        left: 0;
        z-index: -1;
        transition: .7s;
    }
    button:hover{
        color: #fff;
    }
    button:hover::before{
        width: 100%;
        color: #fff;
    }
</style>
</body>
</html>