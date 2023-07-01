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
	<title>Add candidate</title>
</head>
<body>
<div class="main">
		<div class="left-nav">
			<a href="index.php">Home</a>
			<a href="#">All data</a>
			<a href="candidates.php">Candidates Entry</a>
			<a href="#">Settings</a>
			<a href="dataEntry.php">Data entry</a>
			<a href="logout.php">Logout</a>
		</div>
	<div class="form">
	<form method="POST" class="candidate">
				<h4>Add a candidate</h4>
				<input type="number" name="cnID" placeholder="National ID">
				<input type="text" name="fname" placeholder="Firstname">
				<input type="text" name="lname" placeholder="Lastname">
				<select name="gender">
					<option selected hidden>Choose gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
				<input type="date" name="dob" placeholder="Date of birth">				
				<select name="postID">
					<option value="Post">Post ID</option>
					<?php 
						$slt=mysqli_query($con,"SELECT * FROM post");
						while ($fetchPost=mysqli_fetch_array($slt)) {
					?>
					<option name="id" value="<?=$fetchPost['postID']?>"><?=$fetchPost['postID']?></option>
				   <?php }?>
				</select>
				<input type="date" name="examdate" placeholder="Exam date">
				<input type="telephone" name="pnumber" placeholder="Phone number">
				<input type="number" name="marks" placeholder="Marks">

				<button name="submit">Add</button>

				<?php 
				if (isset($_POST['submit'])) {
					$NId=$_POST['cnID'];
					$fname=$_POST['fname'];
					$lname=$_POST['lname'];
					$gender=$_POST['gender'];
					$dob=$_POST['dob'];
					$pid=$_POST['postID'];
					$examdate=$_POST['examdate'];
					$pnumber=$_POST['pnumber'];
					$marks=$_POST['marks'];
					$insert=mysqli_query($con,"INSERT INTO candidates VALUES('','$NId','$fname','$lname','$gender','$dob','$pid','$examdate','$pnumber','$marks')");
					if ($insert) {
						// echo "success";
						header('location: candidates.php');
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