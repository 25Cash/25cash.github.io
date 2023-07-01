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
    <title>Welcome to admin dashboard</title>
</head>
<body>
    <div class="left">
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="school.php">Manage schools</a>
            <a href="project.php">Manage projects</a>
            <a href="settings.php?set=<?=$go['id'];?>">Settings</a>
            <a href="../logout.php">Logout</a>
        </nav>
    </div>
    <div class="right">
        <form method="post">
            <input type="text" name="word" id="" placeholder="Type a school name to search....">
            <button name="search">Search</button>
            <button onclick="refresh()">Refresh</button>
        </form>
        <?php 
        if (isset($_POST['search'])) {
            $key=$_POST['word'];
            $sel=mysqli_query($con,"SELECT * FROM schools WHERE school_name='$key'");
        }else{
            $sel=mysqli_query($con,"SELECT * FROM schools");
        }
        ?>
        <div class="btns">
            <a href="inschool.php">Add school</a>
            <button onclick="print()">Print</button>
        </div>
        <table>
            <tr>
                <td>#</td>
                <td>School name</td>
                <td>District</td>
                <td>Sector</td>
                <td>Phone</td>
                <td>E-mail</td>
                <td>Username</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
            <?php 
            $num=0;
            while ($row=mysqli_fetch_assoc($sel)) {
                $num++;
             ?>
            <tr>
                <td><?=$num;?></td>
                <td><?=$row['school_name'];?></td>
                <td><?=$row['district'];?></td>
                <td><?=$row['sector'];?></td>
                <td><?=$row['phone'];?></td>
                <td><?=$row['email'];?></td>
                <td><?=$row['username'];?></td>
                <td><a href="?stat=<?=$row['school_id'];?>" class="stat"><?=$row['schhol_status'];?></a></td>
                <td><a href="upschool.php?update=<?=$row['school_id'];?>" class="update">update</a><a href="?delete=<?=$row['school_id'];?>" class="delete">delete</a></td>
            </tr>
            <?php }
            ?>
        </table>
    </div>
    <?php 
    if (isset($_GET['stat'])) {
        $id=$_GET['stat'];
        $selit=mysqli_query($con,"SELECT*FROM schools WHERE school_id='$id'");
        $data=mysqli_fetch_assoc($selit);
        if ($data['schhol_status']==="Enable") {
            $status="Disable";
            $sql=mysqli_query($con,"UPDATE schools SET schhol_status='$status' WHERE school_id='$id'");
            if ($sql) {
                echo"<script>window.location.href='school.php'</script>";
            }else{
                echo"<script>alert('Failed to change status')</script>";
            }
        }else{
            $status="Enable";
            $sql=mysqli_query($con,"UPDATE schools SET schhol_status='$status' WHERE school_id='$id'");
            if ($sql) {
                echo"<script>window.location.href='school.php'</script>";
            }else{
                echo"<script>alert('Failed to change status')</script>";
            }
        }
    }
    ?>
    <?php 
    if (isset($_GET['delete'])) {
        $id=$_GET['delete'];
        $sql=mysqli_query($con,"DELETE FROM schools WHERE school_id='$id'");
        if ($sql) {
            echo"<script>alert('Record deleted');window.location.href='school.php'</script>";
        }else{
            echo"<script>alert('Record not deleted')</script>";
        }
    }
    ?>
</body>
</html>