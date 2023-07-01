<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>marks</title>
</head>
<body>
<div class="body">
    <form action="">
        <center><h1>marks</h1></center>
        <div class="inputs">
        <input type="text" placeholder="Enter traneeid"><br>
        <input type="text" placeholder="Enter trade id"><br>
        <input type="text" placeholder="Enter module name"><br>
        <input type="submit" name="send"><input type="reset" name="cancel">
        </div>
        
    </form>
</div>
</body>
</html>
<style>
    *{
        padding:0;
        margin:0;
    }
    .body{
        width:100%;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    form{
        width:30%;
        height:400px;
        box-shadow:0 0 19px grey;
    }
    input[type=text],[type=password]{
        width:80%;
        height:40px;
        margin:30px 10px 10px 30px;
        border:none;
        border-bottom:2px solid rgb(0,0,36);
    }
    .inputs{
        width:100%;
        height:87%;
        /* border:1px solid grey; */
    }
    input[type=submit],[type=reset]{
        width:35%;
        height:50px;
        background:rgb(0,0,36);
        border:none;
        color:white;
        font-weight:bold;
        margin:20px 10px 10px 35px;
    }
</style>
</body>
</html>