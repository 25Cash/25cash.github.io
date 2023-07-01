<?php 
session_start();
include 'conn.php';
if (isset($_GET['mod'])) {
    $id = $_GET['mod'];
    $select = "SELECT * FROM register WHERE id='$id'";
    $runselect = mysqli_query($con,$select);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome/all.min.css">
    <link rel="stylesheet" href="fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="css/friend_request.css">
    <title>Friend request</title>
</head>
<body>
    <div class="main">
        <div class="top">
            <h2>Facebook</h2>
        </div>
        <div class="list">
            <h4>Friends suggestion</h4>
            <?php 
            $records = mysqli_query($con,"SELECT * FROM register");
            if ($records) {
                while($data = mysqli_fetch_array($records)){
            ?>
            <div class="friend-info">
                <div class="profile">
                    <img src="<?= $data['picture'];?>" alt="">
                </div>
                <div class="data">
                    <span><?= $data['username'];?></span>
                        <form action="#" method="post">
                        <button class="request" name="request" id="request">Frien request</button>
                        <button class="remove" name="remove">Remove</button>
                    </form>
                    <?php 
                    if (isset($_POST['request'])) {
                        $id = $data['id'];
                        $user = $data['username'];
                        $_id = $_GET['mod'];
                        $slt = mysqli_query($con,"SELECT * FROM register WHERE id='".$id."' AND username='".$user."'");
                        if (mysqli_num_rows($slt) > 0) {
                            $request = mysqli_query($con,"INSERT INTO friends VALUES('','$_id','$id')");
                            if ($request) {
                                echo "<script>
                                var req = document.getElementById('request').innerHTML = 'Cancel request';
                                </script>";
                            }
                            else{
                                echo "<script>alert('No')</script>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <?php 
            }
            }
            ?>
        </div>
    </div>
</body>
</html>