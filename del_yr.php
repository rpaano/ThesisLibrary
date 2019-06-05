<?php 
	include("connect.php");
	session_start();

	$id = $_SESSION['varname'];

	//echo $id;

	$query = "Select * from add_year";

	$result = mysqli_query($conn,$query);

	
		//echo $row['year'];
	
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border='1'>

	<tr>
		<th>Year</th>
		<th>Edit</th>
		<th>DELETE</th>
	</tr>

	
		<?php foreach($result as $row): ?>
			<div>
				<tr>
					<th><output type="text" name="year"> <?php echo $row['year'];?> </output></th>
					<th><a href="chng.php?id=<?php echo $row['year_id'] ?>">Edit</a></th>
					<th><a href="del.php?id=<?php echo $row["year_id"] ?>">DELETE</a></th>
				</tr>
			</div>
		<?php endforeach; ?>
	<a href="edit.php?id=<?php echo $id;?>"><button>Done</button></a>
</body>
</html>