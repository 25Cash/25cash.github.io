<?php 
session_start();
include '../conn.php';
if (!empty($_SESSION['logged'])) {
    $slt=mysqli_query($con,"SELECT*FROM shopkeeper");
    $user=mysqli_num_rows($slt);
    
    $sltt=mysqli_query($con,"SELECT*FROM product");
    $prod=mysqli_num_rows($sltt);
    
    $sllt=mysqli_query($con,"SELECT*FROM productin");
    $prodin=mysqli_num_rows($sllt);
    
    $sslt=mysqli_query($con,"SELECT*FROM productout");
    $prodout=mysqli_num_rows($sslt);
}else {
    // echo"<script>alert('Please login first').window.location.href='../sign/login.php'</script>";
    header('location:../sign/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div class="left-nav">
        <nav>
            <a href="index.php">Home</a>
            <a href="#">News</a>
            <a href="#">Contact</a>
            <a href="#">About</a>
            <a href="product.php">Data-Entry</a>
            <a href="../sign/logout.php">Logout</a>
        </nav>
    </div>
    <div class="body">
        <h1>WELCOME TO BERWA SHOP ADMIN DASHBOARD <?=$_SESSION['username'];?></h1>
        <div class="numbers">
            <div class="num">
                <h3>USERS ( <?=$user;?> )</h3>
            </div>
            <div class="num">
                <h3>PRODUCTS ( <?=$prod;?> )</h3>
            </div>
            <div class="num">
                <h3>PRODUCT IN ( <?=$prodin;?> )</h3>
            </div>
            <div class="num">
                <h3>PRODUCT OUT ( <?=$prodout;?> )</h3>
            </div>
        </div>
    </div>
</body>
</html>