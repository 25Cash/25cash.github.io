<?php 
session_start();
session_destroy();
echo"<script>alert('you are logged out');window.location.href='index.php'</script>";
?>