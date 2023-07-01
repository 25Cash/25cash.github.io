<?php 
include 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/candidates.css">
	<title>Update candidates</title>
</head>
<body>
<div class="main">
		<div class="left-nav">
			<a href="index.php">Home</a>
			<a href="#">All data</a>
			<a href="#">Candidates Entry</a>
			<a href="#">Settings</a>
			<a href="dataEntry.php">Data entry</a>
			<a href="logout.php">Logout</a>
		</div>
	<div id="form">
			<form class="update" method="POST">
				<?php 
				if (isset($_GET['update'])) {
					$ID=$_GET['update'];
					$slt=mysqli_query($con,"SELECT * FROM candidates WHERE CandidateID='$ID'");
					if (mysqli_num_rows($slt) > 0) {
						while ($row=mysqli_fetch_assoc($slt)) {
				?>
				<input type="number" name="cID" value="<?=$row['CandidateID']?>" placeholder="ID" readonly>
				<input type="number" name="cnID" value="<?=$row['candidateNationalID']?>" placeholder="National ID">
				<input type="text" name="fname" value="<?=$row['firstname']?>" placeholder="Firstname">
				<input type="text" name="lname" value="<?=$row['lastname']?>" placeholder="Lastname">
				<select name="sex">
					<option value="<?=$row['gender']?>" selected hidden><?=$row['gender'];?></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
				<input type="date" name="dob" value="<?=$row['dateofbirth']?>" placeholder="Date of birth">
				<select name="posting">
					<option  value="<?=$row['postID']?>" selected hidden><?=$row['postID']?></option>
					<?php 
					$slt=mysqli_query($con,"SELECT * FROM post");
					while ($fetchPost=mysqli_fetch_assoc($slt)) {
					?>
					<option name="id" value="<?=$fetchPost['postID']?>"><?=$fetchPost['postID']?></option>
				    <?php }?>
				</select>
				<input type="date" name="examdate" value="<?=$row['examdate']?>" placeholder="Exam date">
				<input type="telephone" name="pnumber" value="<?=$row['phonenumber']?>" placeholder="Phone number">
				<input type="number" name="marks" value="<?=$row['marks']?>" placeholder="Marks">
			<?php } } }?>
				<button name="updated">update</button>
				<?php 
				if (isset($_POST['updated'])) {
					$cnID=$_POST['cnID'];
					$fname=$_POST['fname'];
					$lname=$_POST['lname'];
					$sex=$_POST['sex'];
					$dob=$_POST['dob'];
					$postid=$_POST['posting'];
					$examdate=$_POST['examdate'];
					$pnumber=$_POST['pnumber'];
					$marks=$_POST['marks'];
					$update=mysqli_query($con,"UPDATE candidates SET candidateNationalID='$cnID',firstname='$fname',lastname='$lname',gender='$sex',dateofbirth='$dob',postID='$postid',examdate='$examdate',phonenumber='$pnumber',marks='$marks' WHERE CandidateID='$ID'");
					if ($update) {
						header('Location: candidates.php');
					}
					else{
						echo "failure";
					}
				}
				?>
			</form>
		</div>
</div>
</body>
</html>