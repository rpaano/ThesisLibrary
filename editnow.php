<?php
	
	$id = $_GET['id'];

	//echo "<br>".$id."<br>";

	include("connect.php");

	session_start();

	$_SESSION['id_thesis'] = $id;

	$sql = "SELECT * FROM add_year INNER JOIN add_thesis ON add_thesis.year_id = add_year.year_id and add_thesis.addthesis_id = '$id'";

	echo "<br>".$sql."<br>";

	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result)>0)
		$row = mysqli_fetch_assoc($result);


	$plahold = "#";

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="change.php" method="POST" enctype="multipart/form-data">
		Year <input type="text" name="year" value="<?php print $row['year']; ?>" placeholder="<?php echo $plahold;?>"><br>
		Title <input type="text" name="title" value="<?php print $row['title']; ?>"  placeholder="<?php echo $plahold;?>"><br><br>
		<output>#NOTE if youd don't want to change the existing file just dont open anything or it will rewrite!!</output><br>
		Thesis File <input type="file" name="thesis_file" value="<?php print $row['thesis_file']; ?>" placeholder="<?php echo $plahold ;?>"><br><br>
		<input type="hidden" name="location" value="<?php print $row['location']; ?>">
		Description <input type="text" name="description" value="<?php print $row['description']; ?>" placeholder="<?php echo $plahold;?>"><br>
		Author 1 <input type="text" name="author_1" value="<?php print $row['author_1']; ?>" placeholder="<?php echo $plahold;?>"><br>
		Author 2 <input type="text" name="author_2" value="<?php print $row['author_2']; ?>" placeholder="<?php echo $plahold;?>"><br>
		Author 3 <input type="text" name="author_3" value="<?php print $row['author_3']; ?>" placeholder="<?php echo $plahold;?>"><br>

		<button type="sumbit">Sumbit</button>
	</form>
</body>
</html>