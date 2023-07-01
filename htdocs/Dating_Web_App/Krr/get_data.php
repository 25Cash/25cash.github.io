<?php
  include 'conn.php';

  $qry = mysqli_query($con, "SELECT * FROM users");
  $get = mysqli_fetch_all($qry, MYSQLI_ASSOC);

  echo json_encode($get);
?>