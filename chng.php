<?php 
	include("connect.php");
	session_start();

	$id = $_GET['id'];

	$_SESSION['id1'] = $id;

	$sql = "select * from add_year where year_id='$id'";

	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result)==1){
		$row = mysqli_fetch_assoc($result);
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="chng1.php" method="POST">
		<input type="text" name="year" value="<?php echo $row['year'] ?>">
		<button value="sumit">Submit</button> <a href="del_ry.php"><button value="">Cancel</button></a>
	</form>
</body>
</html>