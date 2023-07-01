<?php 
session_start();
include 'conn.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM register WHERE id='$id'";
    $runselect = mysqli_query($con,$select);

    if ($runselect -> num_rows > 0) {
        while ($row = $runselect -> fetch_assoc()) {
            $id = $row['id'];
            $name = $row['username'];
        }
    }
}


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
            <form action="#" method="post" enctype="multipart/form-data">
                <h4>Upload your first profile picture</h4>
                <hr>
                <p class="please">Choose any profile picture from your device.</p>
                <div class="box">
                    <input type="file" name="picture" id="" required>
                </div>
                <hr>
                <div class="bottom">
                    <div class="btn">
                        <button class="cancel">Skip</button>
                        <button class="continue" name="submit">Continue</button>
                        <?php
                        if (isset($_POST['submit'])) {
                            $target_dir = "profiles/";
                            $target_file = $target_dir . basename($_FILES["picture"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            // Check if image file is a actual image or fake image
                                $check = getimagesize($_FILES["picture"]["tmp_name"]);
                                if($check !== false) {
                                    $insert = mysqli_query($con,"UPDATE register SET picture='$target_file' WHERE username='$name' AND id='$id'");
                                    $uploadOk = 1;
                                    if ($insert==true) {
                                        header('Location: profile.php?id='.$id);
                                        move_uploaded_file($_FILES["picture"]["tmp_name"],"$target_file");
                                    }
                                    else{
                                        header('Location: username.php');
                                    }
                                } else {
                                    echo "File is not an image.";
                                    $uploadOk = 0;
                                }
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>