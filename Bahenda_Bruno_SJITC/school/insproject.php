<?php 
include '../conn.php';
$user=$_SESSION['username'];
$sel=mysqli_query($con,"SELECT*FROM schools WHERE username='$user'");
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
            <a href="settings.php?set=<?=$go['school_id'];?>">Settings</a>
            <a href="../logout.php">Logout</a>
        </nav>
    </div>
    <div class="right">
        <form method="post" enctype="multipart/form-data">
            <h3>Register a project</h3>
            <input type="text" name="pname" id="" placeholder="Enter project name...." required>
            <input type="text" name="powner" id="" placeholder="Enter Project owner...." required>
            <input type="file" name="pfile" id="">
            <select name="school" id="">
                <option selected hidden>Select a school</option>
                <?php 
                $schoo=mysqli_query($con,"SELECT * FROM schools");
                while ($row=mysqli_fetch_assoc($schoo)) {
                    ?>
                <option value="<?=$row['school_id']?>"><?=$row['school_name']?></option>
                <?php }
                ?>
            </select>
            <button name="register">Register</button>
        </form>
        <?php 
        if (isset($_POST['register'])) {
            $prname=$_POST['pname'];
            $owner=$_POST['powner'];
            $school=$_POST['school'];
            $filee=$_FILES['pfile']['name'];
            $temp_name=$_FILES['pfile']['tmp_name'];
            $dir="../files/" . $filee;
            move_uploaded_file($temp_name,$dir);
            $status="Pending";
            $sel=mysqli_query($con,"SELECT * FROM projects WHERE project_name='$prname'");
            if (mysqli_num_rows($sel)>0) {
                echo "<script>alert('This Project is already registered')</script>";
            }else{
                $insert=mysqli_query($con,"INSERT INTO projects VALUES('','$prname','$owner','$filee','$status','$school')");
                if ($insert) {
                    echo"<script>alert('Project registered successfully');window.location.href='project.php'</script>";
                }else{
                    echo"<script>alert('Project registration failed')</script>";
                }
            }
        }
        ?>
    </div>
</body>
</html>