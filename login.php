<?php
	include("connect.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];
		//echo "$username $password";

		$sql = "Select * from login where usern='".$username."' and userp = '".$password."' limit 1";
		//echo "$sql <br>";

		$result = mysqli_query($conn,$sql);

		if (mysqli_num_rows($result) == 1){
			echo "You have login";
			$row = mysqli_fetch_assoc($result);
			$id = $row['login_id'];
			//echo "$id";

			header("Location:edit.php?id=$id");
		}
		else{
			echo "<script type='text/javascript'>alert('Wrong Username Or Password'); </script>";
		}


	}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST" action="login.php">
		<input type="text" name="username" ><br>
		<input type="password" name="password"><br>
		<input type="submit" name="submit" value="Login">
	</form>
</body>
</html>