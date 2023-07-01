<?php 
include 'conn.php';
session_start();
$users=mysqli_query($con,"SELECT * FROM users ORDER BY userID");
$fetchUsers=mysqli_fetch_assoc($users);
$posts=mysqli_query($con,"SELECT * FROM post ORDER BY postID");
$fetchPosts=mysqli_fetch_assoc($posts);
$candidates=mysqli_query($con,"SELECT * FROM candidates ORDER BY CandidateID");
$fetchcandidates=mysqli_fetch_assoc($candidates);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>umutuzo cafe</title>
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
			<a href="#">News</a>
			<a href="#">Contact</a>
			<a href="#">About</a>
			<a href="dataEntry.php">Data entry</a>
			<a href="logout.php">Logout</a>
		</div>
		<div class="body">
			<div class="nav"><h2>UMUTUZO CAFE</h2></div>
			<div class="bottom">
				<h4>Welcome to manager dashboard <span><?=$_SESSION['username'];?></span></h4>
				<div class="numbers">
					<div class="num">
						<span>Total users</span>
						<p><?=$fetchUsers['userID'];?></p>
					</div>
					<div class="num">
						<span>Total posts</span>
						<p><?=$fetchPosts['postID'];?></p>
					</div>
					<div class="num">
						<span>Total candidates</span>
						<p><?=$fetchcandidates['CandidateID'];?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>