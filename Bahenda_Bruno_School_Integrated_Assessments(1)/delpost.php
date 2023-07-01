<?php 
include 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/data.css">
	<title>Update posts</title>
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
	<div class="body">
			<form class="update" method="POST">
				<h4>Update post</h4>
				<?php 
				if (isset($_GET['update'])) {
					$ID=$_GET['update'];
					$slt=mysqli_query($con,"SELECT * FROM post WHERE postID='$ID'");
					if (mysqli_num_rows($slt) > 0) {
						while ($fetchName=mysqli_fetch_assoc($slt)) {
				?>
				<input type="text" name="postName" value="<?=$fetchName['postname'];?>" placeholder="Post name">
			    <?php } } }?>
				<button name="posting">update</button>
				<?php 
				if (isset($_POST['postName'])) {
					$name=$_POST['postName'];
					$update=mysqli_query($con,"UPDATE post SET postname='$name' WHERE postID='$ID'");
					if ($update) {
						// echo "success";
						header('location: dataEntry.php');
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