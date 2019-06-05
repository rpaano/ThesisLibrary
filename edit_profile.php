<?php
	class editthis{

		public $id;
		public $result;

		public function setid($sett){
			$this->id = $sett;
		}

		public function que(){
			$this->query = "SELECT * FROM login INNER JOIN profile ON login.login_id = profile.login_id WHERE profile.login_id =".$this->id;
			//echo "$this->query";
			return $this->query;
		}
		
		public function results(){
			include("connect.php");

			$this->result = mysqli_query($conn, $this->que());
			if (mysqli_num_rows($this->result)==1)
				$row = mysqli_fetch_assoc($this->result);
			else{
				echo "no";
			}

			return $row;
		}
	}

	session_start();

	

	$edit = new editthis();
	//echo $_GET['profile_id'];
	//echo $_GET['login_id'];
	$edit->setid($_GET['login_id']);

	$row = $edit->results();

?>



<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
</head>
<body>

	<form method="POST" action="now_profile.php">
		<input type="hidden" name="login_id" value="<?php print $row['login_id']; ?>">
		username    <input type="text" name="username" value="<?php print $row['usern']; ?>"><br>
		password    <input type="text" name="password" value="<?php print $row['userp']; ?>"><br>
		lastname    <input type="text" name="lastname" value="<?php print $row['lastname']; ?>"><br>
		firstname  	<input type="text" name="firstname" value="<?php print $row['firstname']; ?>"><br>
		middlename  <input type="text" name="middlename" value="<?php print $row['middlename']; ?>"><br>
		contactnum  <input type="text" name="contactnum" value="<?php print $row['contactnum']; ?>"><br>
		position    <input type="text" name="position" value="<?php print $row['position']; ?>"><br>

		<button type="submit">UPDATE</button> | <a href="edit.php?id=<?php print $row['login_id']; ?>"><button type="button">CANCEL</button></a>
			<input type="hidden" name="id" value="<?php print $row['login_id']; ?>" />
	</form>
</body>
</html>