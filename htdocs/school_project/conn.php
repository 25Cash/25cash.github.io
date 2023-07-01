<?php 
// session_start();
$con = mysqli_connect('localhost','root','','e_learning');
if (isset($_SESSION['username'])) {
    $sess_id = $_SESSION['username'];
    $sql = mysqli_query($con,"SELECT * FROM users WHERE id='$sess_id'");
    $fetch = mysqli_fetch_assoc($sql);
    $name = $fetch['username'];
}
?>