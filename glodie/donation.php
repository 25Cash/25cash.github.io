<?php 
	include 'connect.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$date = $_POST['date'];
		$type = $_POST['type'];
		$amt = $_POST['amount'];
		$sql = mysqli_query($con, "INSERT INTO donations VALUES ('', '$name', '$date', '$type', '$amt')");
		if($sql){
			echo "<script>
				alert('Donation Recorded Successfully');
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
			<input type="text" required placeholder="name" name="name">
			<br><br>
			<label>date: </label>
			<input type="date" required placeholder="date" name="date">
			<br>
			<label>type: </label>
			<input type="text" required placeholder="type" name="type">
			<br>
			<label>amount: </label>
			<input type="text" required placeholder="amount" name="amount">
			<br>
			<button name="add">Add Donation</button>
		</form>
	</div>
			
</body>
</html>