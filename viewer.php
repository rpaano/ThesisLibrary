<?php

	include("connect.php");
	
	$id = $_GET['id'];


	$sql = "SELECT * from add_thesis where year_id = $id";
	echo $sql;

	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result)>0)
		$row = mysqli_fetch_assoc($result);

	$file = $row['location'];
	echo $file;
	$filename = $row['thesis_file'];
	echo $filename;

	header('Content-Type: application/pdf');

	header('Content-Disposition: inline; filename="'.$filename.'"');


	header("Content-Transfer-Encoding: binary");

	header('Accept-Ranges: bytes');

	@readfile($file);
	

?>