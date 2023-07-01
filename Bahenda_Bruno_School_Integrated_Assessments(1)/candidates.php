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
			<a href="#">Candidates Entry</a>
			<a href="#">Settings</a>
			<a href="dataEntry.php">Data entry</a>
			<a href="logout.php">Logout</a>
		</div>
		<div class="body">
			<div class="btns">
				<label id="add">Add candidate</label>
				<button>Print report</button>
			</div>
			<h4>All posts</h4>
			<table cellpadding="10px" cellspacing="0">
				<tr>
					<td>ID</td>
					<td>NATIONAL ID</td>
					<td>FIRSTNAME</td>
					<td>LASTNAME</td>
					<td>GENDER</td>
					<td>DATE OF BIRTH</td>
					<td>POST ID</td>
					<td>EXAM DATE</td>
					<td>PHONE NUMBER</td>
					<td>MARKS</td>
					<td>UPDATE</td>
					<td>DELETE</td>
				</tr>
				<?php 
				$getCandidate=mysqli_query($con,"SELECT * FROM candidates");
				if (mysqli_num_rows($getCandidate) > 0) {
				while ($candidateData=mysqli_fetch_assoc($getCandidate)) {
				?>
				<tr>
					<td><?=$candidateData['CandidateID'];?></td>
					<td><?=$candidateData['candidateNationalID'];?></td>
					<td><?=$candidateData['firstname'];?></td>
					<td><?=$candidateData['lastname'];?></td>
					<td><?=$candidateData['gender'];?></td>
					<td><?=$candidateData['dateofbirth'];?></td>
					<td><?=$candidateData['postID'];?></td>
					<td><?=$candidateData['examdate'];?></td>
					<td><?=$candidateData['phonenumber'];?></td>
					<td><?=$candidateData['marks'];?></td>
					<td><a href="candidateregistry.php?update=<?=$candidateData['CandidateID']?>">update</a></td>
					<td><a href="delcandidate.php?delete=<?=$candidateData['CandidateID']?>">delete</a></td>
				</tr>
			    <?php } } ?>
			</table>
			<?php 
			if (isset($_GET['delete'])) {
				$delID=$_GET['delete'];
				$delete=mysqli_query($con,"DELETE FROM candidates WHERE CandidateID='$delID'");
				if ($delete) {
					header('location: candidates.php');
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