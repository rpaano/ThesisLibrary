<?php 

	include("connect.php");

	$id = $_GET['id'];

	echo $id. " ";

	$sql = "SElect * from add_thesis where year_id ='$id'";

	echo $sql . " ";

	$result = mysqli_query($conn,$sql);

	//check if the year is used as a foreign key
	if (mysqli_num_rows($result)!=0){
		echo "yes";
		echo "<script type='text/javascript'>alert('Year Not deleted. Please Be sure the the year you want to delete is not connected to anything!!'); window.location.replace('del_yr.php');</script>";
		

	}else{
		
		$sql1 = "delete from add_year where year_id ='$id'";

		$result1 = mysqli_query($conn,$sql1);

		header("Location:del_yr.php");
		//echo "<script type='text/javascript'>alert('Year deleted'); window.location.replace('del_yr.php');</script>";
	}

	
	



 ?>