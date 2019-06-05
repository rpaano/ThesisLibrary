<?php

	include("connect.php");

	$id = $_GET['id'];

	$sql = "select * from add_thesis where addthesis_id = '$id'";

	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result)>0)
		$row = mysqli_fetch_assoc($result);


	$location = $row['location'];

	if (!unlink($location)) {
		
	}else{
		echo "<script type='text/javascript'>alert('Not Deleted!! Error!!!'); window.location.replace('edit_file.php');</script>";
	}


	$sql1 = "delete from add_thesis where addthesis_id='$id'";

	if (!(mysqli_query($conn,$sql1))) {
		echo "<script type='text/javascript'>alert('Not Deleted'); window.location.replace('edit_file.php?');</script>";
	}else{
		echo "<script type='text/javascript'>alert('Successfully Deleted!!!'); window.location.replace('edit_file.php');</script>";
	}


?>