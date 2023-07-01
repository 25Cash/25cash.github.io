<?php 
session_start();
include 'conn.php';
$user = $_SESSION['username'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM register WHERE id='$id'";
    $runselect = mysqli_query($con,$select);

    if (mysqli_num_rows($runselect) > 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="code.css">
    <title>Facebook</title>
</head>
<body>
    <div class="main">
        <h3>facebook</h3>
        <div class="form">
            <form method="post" enctype="multipart/form-data">
                <div class="picture">
                    <?php 
                        while ($row = $runselect -> fetch_array()) {
                        $id = $row['id'];
                        $name = $row['username'];
                        $profile = "<img src='".$row['picture']."'>";
                        echo $profile;
                    }
                }
            }
        ?>
                </div>
                <div class="box">
                    <h1><?= $_SESSION['username'];?></h1>
                </div>
                <center><p class="please">Your profile</p></center>
                <hr>
                <div class="bottom">
                    <div class="btn">
                        <form action="#" method="post">
                        <button class="continue" name="submit">Continue</button>
                    </form>
                        <?php 
                        if (isset($_POST['submit'])) {
                            header('Location: friend_request.php?mod='.$id);
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>