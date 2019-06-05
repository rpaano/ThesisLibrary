<?php
	session_start();
	$row['login_id'] = $_SESSION['varname'];

	$placehold = "";
	

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

 		include("connect.php");

		$username = $_POST['username'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];

		$_SESSION['user'] = $username;

		$setuser = $_SESSION['user'];

		//check if not NULL
		if ($username!=NULL and $password!=NULL){
			//check if it has the same password
			if ($password == $password1){
				
				$query = "Select * from login where usern = '$username'";
				//echo "$query";

				$result = mysqli_query($conn,$query);

				if (!$result) {
			         die('Invalid query: ' . mysql_error());
			    }
				//echo $result;


			    //check if it has the same username
				if (mysqli_num_rows($result)==0){
					echo "<script type='text/javascript'>alert('ok');</script>";

					//assign to NULL
					$_SESSION['user'] = "";
					$setuser = $_SESSION['user'];

					$sql = "INSERT INTO login (usern,userp) values ('$username','$password')";

					$result = mysqli_query($conn,$sql);

					$last_id = $conn->insert_id;

					$_SESSION['create_id'] = $last_id;

					echo $_SESSION['create_id'] ;

					header("Location:add_profile.php");

				}else{

					$_SESSION['user'] = "";
					$setuser = $_SESSION['user'];
					echo "<script type='text/javascript'>alert('Username or Password already exist');</script>";
				}

			}else{
				//echo "here";
				echo "<script type='text/javascript'>alert('The Password do not much!!');</script>";
			}
		}else{
			$placehold = "#";
		}	
	}else{
		$setuser = "";
	}
	

?>



<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
</head>
<body>

	<form method="POST" action="add_admin.php">
		username    <input type="text" name="username" value="<?php echo $setuser;?>" placeholder="<?php echo $placehold; ?>"><br>
		password    <input type="password" name="password" placeholder="<?php echo $placehold; ?>"><br>
		Confirm Password <input type="password" name="password1" placeholder="<?php echo $placehold; ?>"><br>
		
		<button type="submit">Create</button> | <a href="edit.php?id=<?php print $row['login_id'];?>"><button type="button">CANCEL</button></a>
			
	</form>
</body>
</html>