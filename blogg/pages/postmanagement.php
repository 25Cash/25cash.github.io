<?php
session_start(); 
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Manage users</title>
    <script type="text/javascript" src="script/manager.js" defer></script>
</head>
<body>
    <div class="main">
        <div class="left">
            <h3>Admin panel</h3>
            <nav>
                <a href="admin.php"><i class="ti-home"></i> Home</a>
                <a href="usermanagement.php"><i class="ti-user"></i> Manage users</a>
                <a href="postmanagement.php"><i class="ti-image"></i> Manage posts</a>
                <a href="#"><i class="ti-settings"></i> Settings</a>
            </nav>
            <a href="#" title="click to logout"><i class="ti-shift-right-alt"></i> Logout</a>
        </div>
        <div class="right">
            <div class="nav">
                <h3>You are logged in <?=$_SESSION['username'];?></h3>
            </div>
            <div class="table">
                <form method="post" class="search">
                    <input type="text" name="search" placeholder="Enter postname to search a post....">
                    <button name="search"><i class="ti-search"></i></button>
                </form>
                <div class="btns">
                    <label id="add">ADD POST <i class="ti-plus"></i></label>
                </div>
                <table border="0" cellspacing="0" cellpadding="10px">
                    <tr>
                        <td>#</td>
                        <td>POST NAME</td>
                        <td>POST DESCRIPTION</td>
                        <td>POST</td>
                        <td>ACTIONS</td>
                    </tr>
                    <?php 
                    $num=0;
                    $slt=mysqli_query($con,"SELECT * FROM posts");
                    while ($fetch=mysqli_fetch_assoc($slt)) {
                        $num++;
                    ?>
                    <tr>
                    <td><?=$num;?></td>
                    <td><?=$fetch['post_name'];?></td>
                    <td><?=$fetch['post_description'];?></td>
                    <td><?=$fetch['post'];?></td>
                    <td><a href="?upd=<?=$fetch['post_id'];?>" onclick="pop()"><i class="ti-pencil"></i> MODIFY</a><label onclick="
                    if(confirm('are you sure you want to delete this record')){
                        window.location.href='?del=<?=$fetch['post_id']?>';
                    }
                    "><i class="ti-trash"></i> DELETE</label></td>
                    </tr>
                    <?php }?>
                </table>
                <div class="update-form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="close"><h3>UPDATING FORM</h3><i class="ti-close" id="closeUP"></i></div>
                    <?php 
                    if (isset($_GET['upd'])) {
                        $id=$_GET['upd'];
                        $sel=mysqli_query($con,"SELECT * FROM posts WHERE post_id='$id'");
                        $getData=mysqli_fetch_assoc($sel);
                        echo "<script>
                        document.querySelector('.update-form').classList.toggle('active');
                        document.querySelector('#closeUP').addEventListener('click',()=>{
                            // console.log('clicked');
                            document.querySelector('.update-form').classList.remove('active');
                        });
                        </script>";
                    }
                    ?>
                    <center><div class="img"><label for="file" class="label"><i class="ti-camera"></i></label><img src="profiles/<?=$getData['post'];?>" alt=""></div></center>
                    <input type="file" name="" id="file">
                        <input type="number" name="id" value="<?=$getData['post_id'];?>" readonly>
                        <input type="text" placeholder="Enter post name" name="poname" value="<?=$getData['post_name'];?>">
                        <textarea name="descr" placeholder="State a description for this post" id="" cols="30" rows="10"><?=$getData['post_description'];?></textarea>
                        <button name="update"><i class="ti-pencil"></i> UPDATE</button>
                    </form>
                    <?php 
                    if (isset($_POST['update'])) {
                        $pid=$_POST['id'];
                        $pname=$_POST['poname'];
                        $desc=$_POST['descr'];
                        $query=mysqli_query($con,"UPDATE posts SET post_name='$pname',post_description='$desc' WHERE post_id='$pid'");
                        if ($query) {
                            // header('location:postmanagement.php');
                            echo "<script>
                            alert('row updated')
                            window.location.href='postmanagement.php'
                            </script>";
                            // echo "<script>
                            // if(confirm)
                            // </script>";
                        }else{
                            echo "<script>
                            alert('Update failure')
                            window.location.href='postmanagement.php'
                            </script>";
                        }
                    }
                    ?>
                </div>
                <div class="add-form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="close"><h3>REGISTRATION FORM</h3> <i class="ti-close" id="closeADD"></i></div>
                        <input type="text" placeholder="Enter post name" name="postname" value="">
                        <textarea name="desc" id="" cols="30" rows="10" placeholder="write a description"></textarea>
                        <input type="file" placeholder="Choose an image" name="profile" value="" accept="image">
                        <button name="reg"><i class="ti-plus"></i> Register</button>
                    </form>
                    <?php 
                    if (isset($_POST['reg'])) {
                        $pname=$_POST['postname'];
                        $desc=$_POST['desc'];
                        $filename=$_FILES['profile']['name'];
                        $tempname=$_FILES['profile']['tmp_name'];
                        $dir='./profiles/'.$filename;
                        move_uploaded_file($tempname,$dir);
                        $insert=mysqli_query($con,"INSERT INTO posts VALUES('','$pname','$filename','$desc')");
                        if ($insert) {
                            // echo"<script>alert('posted')</script>";
                            echo "<script>
                            alert('Posted')
                            window.location.href='postmanagement.php'
                            </script>";
                        }
                        else {
                            // echo"<script>alert('not posted')</script>";
                            echo "<script>
                            alert('Not posted')
                            window.location.href='postmanagement.php'
                            </script>";
                        }
                    }
                    ?>
                </div>
                <div class="delete-form">
                    <form method="POST">
                        <h3><i class="icon" id="icon"></i> Record <p id="demo"></p></h3>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if (isset($_GET['del'])) {
        $id=$_GET['del'];
        $sq=mysqli_query($con,"DELETE FROM posts WHERE post_id='$id'");
        if ($sq) {
            echo "<script>
            document.querySelector('.delete-form').classList.add('show');
            document.querySelector('#icon').classList.add('ti-check');
            document.querySelector('#demo').innerHTML='Has been deleted successfully';
            setTimeout(()=>{
                document.querySelector('.delete-form').classList.remove('show');
                window.location.href='postmanagement.php';
            },3000)
            </script>";
        }
        else{
            echo "<script>
            document.querySelector('.delete-form').classList.add('show');
            document.querySelector('#icon').classList.add('ti-close');
            document.querySelector('#demo').innerHTML='Has failed to be deleted';
            setTimeout(()=>{
                document.querySelector('.delete-form').classList.remove('show');
                window.location.href='postmanagement.php';
            },3000)
            </script>";
        }
    }
    ?>
</body>
</html>