<?php 
	include 'connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = mysqli_query($con, "SELECT * FROM donations WHERE ot_id = '$id'");
        $row = mysqli_fetch_array($sql);
        $name = $row['name'];
        $otId = $row['ot_id'];
        $date = $row['date'];
        $type = $row['type'];
        $amt = $row['amount'];
    }

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$date = $_POST['date'];
		$type = $_POST['type'];
		$amt = $_POST['amount'];
		$sql = mysqli_query($con, "UPDATE donations SET name = '$name',date =  '$date',type = '$type',amount = '$amt' WHERE ot_id = '$id'");
		if($sql){
			echo "<script>
				alert('Donation Recorded Updated');
				window.location.href = 'retrDonation.php'
			</script>";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>donation</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<body class="form">
	<div class="form">
		<h1>donations - kainfc</h1>
		<form method="POST" action="">
			<label>name: </label>
			<input type="text" required placeholder="name" name="name" value="<?php echo $name?>">
			<br><br>
			<label>date: </label>
			<input type="date" required placeholder="date" name="date" value="<?php echo $date?>">
			<br>
			<label>type: </label>
			<input type="text" required placeholder="type" name="type" value="<?php echo $type?>">
			<br>
			<label>amount: </label>
			<input type="text" required placeholder="amount" name="amount" value="<?php echo $amt?>">
			<br>
			<button name="add">Update Donation</button>
		</form>
	</div>
			
</body>
</html>