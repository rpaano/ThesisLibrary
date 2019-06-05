<?php
	include("connect.php");

	$query = "SELECT * from add_year";

	$result = mysqli_query($conn, $query);
	mysqli_close($conn);


?>


<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<?php foreach($result as $row): ?>
			<div id="title">
				<?php echo $row['year_id'];  ?>
				<a href="view.php?year_id=<?php echo $row['year_id']; ?>"><?php echo $row['year']; ?></a>
			</div>
			<br />
		<?php endforeach; ?>

		<button><a href="login.php">Login</a></button>
</body>
</html>