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
	<title>Add a post</title>
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
			<div id="post">
				<form method="POST" class="post">
				<h4>Add a post</h4>
				<input type="text" name="posted" placeholder="Post name">
				<button name="posting">Post</button>
				<?php 
				if (isset($_POST['posting'])) {
					$post=$_POST['posted'];
					if (!empty($post)) {
						$Enterpost=mysqli_query($con,"INSERT INTO post VALUES('','$post')");
						if ($Enterpost) {
							header('location: dataEntry.php');
						}
						else{
							echo "Failure";
						}
					}
					else{
						echo "<script>alert('Please state post name')</script>";
					}
				}
				?>
			</form>
		</div>
	</div>
</div>
</body>
</html>