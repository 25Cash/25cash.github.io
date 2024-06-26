<?php 
include '../conn.php';
session_start();
$user=$_SESSION['username'];
$sel=mysqli_query($con,"SELECT*FROM users WHERE username='$user'");
$go=mysqli_fetch_assoc($sel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a project</title>
</head>
<body>
    <div class="left">
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="project.php">Manage projects</a>
            <a href="settings.php?set=<?=$go['id'];?>">Settings</a>
            <a href="../logout.php">Logout</a>
        </nav>
    </div>
    <div class="right">
        <?php 
        if (isset($_GET['update'])) {
            $id=$_GET['update'];
            $sql=mysqli_query($con,"SELECT*FROM projects WHERE project_id='$id'");
            $data=mysqli_fetch_assoc($sql);
        }
        ?>
        <form method="post" enctype="multipart/form-data">
            <h3>Modify school</h3>
            <input type="number" name="id" id="" value="<?=$data['project_id']?>" readonly>
            <input type="text" name="pname" id="" value="<?=$data['project_name']?>" placeholder="project name...." readonly>
            <input type="text" name="pown" value="<?=$data['project_owner']?>" id="" placeholder="Project owner...." readonly>
            <input type="text" value="<?=$data['project_file']?>" name="pfile" id="" placeholder="Project file...." readonly>
            <select name="status" id="">
                <option value="<?=$data['status']?>" selected hidden><?=$data['status'];?></option>
                <option value="Selected">Selected</option>
                <option value="Reject">Reject</option>
            </select>
            <input type="text" name="sid" id="" value="<?=$data['school_id']?>" placeholder="School name...."  readonly>
            <button name="update">Modify</button>
        </form>
        <?php 
        if (isset($_POST['update'])) {
            $pid=$_POST['id'];
            $prname=$_POST['pname'];
            $owner=$_POST['pown'];
            $filee=$_POST['pfile'];
            $status=$_POST['status'];
            $sid=$_POST['sid'];
            $stat=$_POST['status'];
            move_uploaded_file($temp_name,$dir);
            $upd=mysqli_query($con,"UPDATE projects SET project_name='$prname',
            project_owner='$owner',
            project_file='$filee',
            status='$stat',
            school_id='$sid' WHERE project_id='$pid'");
            if ($upd) {
                echo"<script>alert('Record updated successfully');window.location.href='project.php'</script>";
            }else{
                echo"<script>alert('Record update failed')</script>";
            }
        }
        ?>
    </div>
</body>
</html>