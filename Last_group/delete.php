<?php 
include 'connection.php';
?>
            <?php 
            if (isset($_GET['mod'])) {
                $view = $_GET['mod'];
                $delete = "DELETE * FROM donation WHERE ot_id='$view'";
                $rundelete = mysqli_query($con,$delete);
                if ($rundelete) {
                    header('location : donors.php');
                }
            }
            ?>