<?php 
include '../conn.php';
session_start();
$user=$_SESSION['username'];
$sel=mysqli_query($con,"SELECT*FROM schools WHERE username='$user'");
$go=mysqli_fetch_assoc($sel);
if(!isset($_SESSION['username'])){
    header("location:../auth/admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexex.css">
    <title>Welcome to school dashboard</title>
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
        <form method="post" class="search">
            <input type="text" name="word" id="" placeholder="Type a project name to search....">
            <button name="search">Search</button>
            <button onclick="refresh()">Refresh</button>
        </form>
        <?php 
        if (isset($_POST['search'])) {
            $key=$_POST['word'];
            $sel=mysqli_query($con,"SELECT * FROM projects WHERE project_name LIKE '%$key%'");
        }else{
            $sel=mysqli_query($con,"SELECT * FROM projects");
        }
        ?>
        <div class="btns">
            <a href="insproject.php">Add project</a>
            <button onclick="print()">Print</button>
        </div>
        <table>
            <tr>
                <td>#</td>
                <td>Project name</td>
                <td>Project owner</td>
                <td>Project file</td>
                <td>Status</td>
                <td>School name</td>
                <td>Action</td>
            </tr>
            <?php 
            $num=0;
            while ($row=mysqli_fetch_assoc($sel)) {
                $idd=$row['school_id'];
                $schll=mysqli_query($con,"SELECT*FROM schools WHERE school_id='$idd'");
                $fetch=mysqli_fetch_assoc($schll);
                $num++;
             ?>
            <tr>
                <td><?=$num;?></td>
                <td><?=$row['project_name'];?></td>
                <td><?=$row['project_owner'];?></td>
                <td><?=$row['project_file'];?></td>
                <td><?=$row['status'];?></td>
                <td><?=$fetch['school_name'];?></td>
                <td><a href="updproject.php?update=<?=$row['project_id'];?>" class="update">update</a></td>
            </tr>
            <?php }
            ?>
        </table>
    </div>
</body>
</html>