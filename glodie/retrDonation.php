<?php 
    session_start();
    include 'connect.php';

    if(!isset($_SESSION['logged'])){
        echo "<script>
            alert('Login First')
            window.location.href = 'login.php';
        </script>";
    }

    if(isset($_GET['delId'])){
        $id = $_GET['delId'];
        $qry = mysqli_query($con, "DELETE FROM donations WHERE ot_id = '$id'");
        if($qry){
            echo "<script>
                alert('Donation Record Deleted Successfully')
                window.location.href = 'retrDonation.php';
            </script>"; 
        }
    }
    $sql = mysqli_query($con, "SELECT * FROM donations");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>Retrieveing Donation</h1></center>
    <table border="1" >
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Date</td>
            <td>Type</td>
            <td>Amount</td>
            <td>Actions</td>
        </tr>
        <?php 
            $num = 0;
            while($row = mysqli_fetch_array($sql)){
                $num++;
                $name = $row['name'];
                $otId = $row['ot_id'];
                $date = $row['date'];
                $type = $row['type'];
                $amt = $row['amount'];
        ?>
        <tr>
            <td><?php echo $num?></td>
            <td><?php echo $name?></td>
            <td><?php echo $date?></td>
            <td><?php echo $type?></td>
            <td><?php echo $name?></td>
            <td>
                <a href="./upDonation.php?id=<?php echo $otId?>">Update</a>&nbsp;&nbsp;
                <a href="./retrDonation.php?delId=<?php echo $otId?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>