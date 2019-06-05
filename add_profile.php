<?php
	

 	session_start();
	$row['login_id'] = $_SESSION['varname'];

	$id = $_SESSION['create_id'];

	//for placeholder
	$placehold = "";

 	//echo "$id";

 	if ($_SERVER['REQUEST_METHOD'] == "POST"){

 		//for session
 		$lastname = $_POST['lastname'];
 		$firstname = $_POST['firstname'];
 		$middlename = $_POST['middlename'];
 		$contactnum = $_POST['contactnum'];
 		$position = $_POST['position'];

 		/*$_SESSION['lastname1'] = $lastname;
		$_SESSION['firstname1'] = $firstname;
		$_SESSION['middlename1'] = $middlename;
		$_SESSION['contactnum1'] = $contactnum;
		$_SESSION['position1'] = $position;

		$last1 = $_SESSION['lastname1'];
		$first1 = $_SESSION['firstname1'];
		$middle1 = $_SESSION['middlename1'];
		$contact1 = $_SESSION['contactnum1'];
		$posi1 = $$_SESSION['position1'];
		*/


		//for value
		$last1 = $lastname;
		$first1 = $firstname;
		$middle1 = $middlename;
		$contact1 = $contactnum;
		$posi1 = $position;

 		if ($lastname != NULL and $firstname != NULL or $middlename != NULL or $contactnum != NULL and $position != NULL){

 			include("connect.php");

 			$sql = "INsert into profile (lastname,firstname,middlename,contactnum,position,login_id) values ('$lastname','$firstname','$middlename','$contactnum','$position','$id')"; 
 			
 			$result = mysqli_query($conn,$sql);

 			echo "<script type='text/javascript'>alert('Accesfully Added'); window.location.replace('edit.php?id=$id');</script>";

 			//header("Location:edit.php?id=$id");

 		}else{
 			//for placeholder
			$placehold = "#";
 		}


		

 	}else{

 		//for value
		$last1 = "";
		$first1 = "";
		$middle1 = "";
		$contact1 = "";
		$posi1 = "";
 	}



?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="add_profile.php">
		Last Name    <input type="text" name="lastname" value="<?php echo $last1;?>" placeholder="<?php echo $placehold; ?>"><br>
		First Name    <input type="text" name="firstname" value="<?php echo $first1;?>" placeholder="<?php echo $placehold; ?>"><br>
		Middle Name <input type="text" name="middlename" value="<?php echo $last1;?>" placeholder="<?php echo $placehold; ?>"><br>
		Contact Number    <input type="text" name="contactnum" value="<?php echo $contact1;?>" placeholder="<?php echo $placehold; ?>"><br>
		Position    <input type="text" name="position" value="<?php echo $posi1;?>" placeholder="<?php echo $placehold; ?>"><br>
		
		<button type="submit">Create</button> 
			
	</form>
</body>
</html>