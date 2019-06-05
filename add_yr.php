<?php

	//for including
	session_start();
	include("connect.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST"){

		$id = $_SESSION['varname'];
		$profile_id = $_SESSION['profile_id'];

		$year = $_POST['year'];

		$sql = "Select * from add_year where year = '$year'";

		$result = mysqli_query($conn,$sql);

		//echo $sql;

		if ($year != NULL) {
			//check if year exist
			if (mysqli_num_rows($result)>0){

				echo "<script type='text/javascript'>alert('Year Already Existed'); </script>";

				
			}
			else{

				$sql1 = "insert into add_year (year, profile_id) values ('$year', '$profile_id')";

				//check if added
				if(mysqli_query($conn,$sql1)){
					echo "<script type='text/javascript'>alert('Year Added'); window.location.replace('edit.php?id=$id');</script>";
				}
				else{
					echo "<script type='text/javascript'>alert('Failed'); </script>";
				}
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Please fill up before submitting'); </script>";

		}

			
	}



?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="add_yr.php" method="POST" enctype="multipart/form-data">
		<input type="text" name="year">

		<button type="sumbit">Sumbit</button>
	</form>
</body>
</html>