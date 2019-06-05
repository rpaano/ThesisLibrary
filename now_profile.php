<?php
class now_na{
			//editing

	public function now(){
		include("connect.php");
		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			$login_id = $_POST['login_id'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$lastname = $_POST['lastname'];
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$contactnum = $_POST['contactnum'];
			$position = $_POST['position'];

			if($username != NULL and $password != NULL and $lastname != NULL and $firstname != NULL and $middlename != NULL and $contactnum != NULL and $position != NULL){

				$sql = "select * from login where usern ='$username'";

				$result1 = mysqli_query($conn, $sql);

				if (!$result1) {
			         die('Invalid query: ' . mysql_error());
			    }
				//echo $result;


			    //check if it has the same username
				if (mysqli_num_rows($result1)==0){

					$query = "UPDATE login INNER JOIN profile ON login.login_id = profile.login_id SET login.usern = '$username', login.userp = '$password', profile.lastname = '$lastname', profile.firstname = '$firstname', profile.middlename = '$middlename', profile.contactnum = '$contactnum', profile.position = '$position' WHERE login.login_id='$login_id'";
					
					//echo "$query";
					$result = $conn->query($query);
					mysqli_close($conn);
					$id = $login_id;
					echo "$id";

					//header("Location:edit.php?id=$id");
				}else{
					echo "here ";
					if (mysqli_num_rows($result1)>0)
						$row = mysqli_fetch_assoc($result1);
					echo $row['login_id'];

					if ($row['login_id'] == $login_id){
						$query = "UPDATE login INNER JOIN profile ON login.login_id = profile.login_id SET login.usern = '$username', login.userp = '$password', profile.lastname = '$lastname', profile.firstname = '$firstname', profile.middlename = '$middlename', profile.contactnum = '$contactnum', profile.position = '$position' WHERE login.login_id='$login_id'";
					
						//echo "$query";
						$result = $conn->query($query);
						mysqli_close($conn);
						$id = $login_id;
						echo "$id";

						header("Location:edit.php?id=$id");
					}
					else{
						echo "<script type='text/javascript'>alert('Username already exist'); window.location.replace('edit_profile.php?login_id=$login_id');</script>";
						echo "$login_id";
						//header("Location:edit_profile.php?login_id=$login_id");

					}
				}

			}else{
				echo "<script type='text/javascript'>alert('Please fill up the whole profile!!'); window.location.replace('edit_profile.php?login_id=$login_id');</script>";
				//header("Location:edit_profile.php?login_id=$id");
			}
			
		}
	
	}
	//setting direction
	public function goes($id){
		//header('Location:edit.php?id=$id');
	}

}
	//$id = $_GET['login_id'];
	//echo "$id";
	$nows = new now_na();
	$login_id=$nows->now();
	$nows->goes($login_id);
?>



			