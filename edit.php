<?php 
	include("connect.php");

	$id = $_GET['id'];
	//echo "$id get ";
	
	$sql = "Select * from profile where login_id = '$id' limit 1";
	//	echo "$sql";

	$result = mysqli_query($conn,$sql) ;

	if (mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		$id1 = $row['login_id'];
	//	echo "$id1";
	}

	session_start();
	$_SESSION['varname'] = $id;
	//echo $_SESSION['varname'];
	$_SESSION['profile_id'] = $row['profile_id'];
	$profile_id = $_SESSION['profile_id'];
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<a href="add_admin.php?login_id=<?php echo $id; ?>"> Add Admin</a><br>
	<a href="edit_file.php?login_id=<?php echo $id; ?>">Edit File</a><br>
	<a href="edit_profile.php?login_id=<?php echo $id; ?>">Edit Profile</a><br>
	<a href="add_yr.php?login_id=<?php echo $id; ?>">ADD YEAR</a><br>
	<a href="del_yr.php?login_id=<?php echo $profile_id; ?>">DELETE YEAR</a><br>
	<a href="logout.php">LOGOUT</a>


</body>
</html>
