<?php 

	session_start();
	include("connect.php");

	$id = $_SESSION['id1'];

	echo $id;

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//echo "string";

		//check if exist

		$year = $_POST['year'];

		$query = "select * from add_year where year_id='$id'";

		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result)==0){
			//$row = mysqli_fetch_assoc($result);

			//if true update
			$sql = "update add_year SET year='$year' where year_id='$id'";
			echo $sql;

			$result1 = mysqli_query($conn, $sql);

			$_SESSION['id1'] = "";

			echo "<script type='text/javascript'> window.location.replace('del_yr.php');</script>";
		}
		else{
			//if false return
			$row = mysqli_fetch_assoc($result);

			if ($row['year'] == $year) {
				echo "<script type='text/javascript'> window.location.replace('del_yr.php');</script>";
			}
			else{
				echo "<script type='text/javascript'>alert('Year already existed!!'); window.location.replace('chng.php?id=$id');</script>";
			}
		}
	}

 ?>