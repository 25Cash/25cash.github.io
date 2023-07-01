<?php
    include('Connekt.php');
    session_start();
 
    if(!isset($_SESSION['Log'])){
         header('location: Login.php');
    }

    if(isset($_GET['user_id'])){
        $id = $_GET['User_id'];

        $check = "DELETE From users WHERE user_id='$id'";
        if(mysqli_query($con ,$check)){
            echo"<script>alert("You Deleted It Mf..")</script>";
        }else{
            echo"Failed Mf...Hahaahha".mysqli_erroe($con);
        }
    }
?>