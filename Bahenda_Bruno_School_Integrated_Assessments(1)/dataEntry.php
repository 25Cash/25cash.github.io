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
	<title>UMUTUZO CAFE</title>
    <script>
        function back() {window.history.forward();}
        setTimeout("back()",0);
        window.onunload=function(){null};
    </script>
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
			<div class="btns">
				<label id="add" onclick="window.location.replace('post.php')">Add post</label>
				<button>Print report</button>
			</div>
			<h4>All posts</h4>
			<table cellpadding="10px" cellspacing="0">
				<tr>
					<td>POST ID</td>
					<td>POST NAME</td>
					<td>UPDATE</td>
					<td>DELETE</td>
				</tr>
				<?php 
				$getPosts=mysqli_query($con,"SELECT * FROM post");
				if (mysqli_num_rows($getPosts) > 0) {
				while ($postData=mysqli_fetch_assoc($getPosts)) {
				?>
				<tr>
					<td><?=$postData['postID']?></td>
					<td><?=$postData['postname']?></td>
					<td><a href="delpost.php?update=<?=$postData['postID']?>">Update</a></td>
					<td><a href="dataEntry.php?delete=<?=$postData['postID']?>">Delete</a></td>
				</tr>
			    <?php } } 
			    else{
			    	while($Nopost=mysqli_fetch_assoc($getPosts)){
			    ?>
				<tr>
					<td>No posts yet</td>
					<td>No posts yet</td>
					<td>No posts yet</td>
					<td>No posts yet</td>
				</tr>
			    <?php } }?>
			</table>
			<?php 
			if (isset($_GET['delete'])) {
				$delID=$_GET['delete'];
				$delete=mysqli_query($con,"DELETE FROM post WHERE postID='$delID'");
				if ($delete) {
					header('location: dataEntry.php');
				}
				else{
					echo "Failure";
				}
			}
			?>
		</div>
	</div>
</body>
</html>