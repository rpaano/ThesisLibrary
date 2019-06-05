<?php

	include("connect.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		//getting session
		session_start();
		$id = $_SESSION['id_thesis'];
		$login_id = $_SESSION['varname'];

		//getting posts
		$year = $_POST['year'];
		$title = $_POST['title'];
	
		//file 
		$file = $_FILES['thesis_file'];
	
		$location = $_POST['location'];
		$description = $_POST['description'];
		$author_1 = $_POST['author_1'];
		$author_2 = $_POST['author_2'];
		$author_3 = $_POST['author_3'];

		//check if the user edit the file to change it
		if (($fileName = $_FILES['thesis_file']['name'])) {
			echo "inn ";
			if (unlink($location)) {
				echo "succes!!! ";
			}
			else{
				echo "error ";
			}

			$fileName = $_FILES['thesis_file']['name'];
			//echo "$fileName ";
			$fileTmpName = $_FILES['thesis_file']['tmp_name'];
			//echo "$fileTmpName ";
			$fileSize = $_FILES['thesis_file']['size'];
			//echo "$fileSize ";
			$fileError = $_FILES['thesis_file']['error'];
			//echo "$fileError ";
			$fileType = $_FILES['thesis_file']['type'];
			//echo "$fileType ";

			$fileExt = explode('.', $fileName);

			//echo "$fileExt[1]";

			//to make lower case thr .pdf file if capital
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('pdf');

			//check if only pdf
			if (in_array($fileActualExt, $allowed)){

				//check if error occurs
				if($fileError === 0){

					//file limit
					if ($fileSize< 1000000000000){
						$fileNameNew = $fileName;
						$fileDestination = 'uploads/'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);
						//header("Location:index2.php?sucess");

						$sql = "UPDATE add_thesis SET thesis_file='$fileNameNew', location='$fileDestination' WHERE addthesis_id='$id'";

						$results = mysqli_query($conn,$sql);

					}
					else{
						echo "<script type='text/javascript'>alert('File too big'); window.location.replace('editnow.php?id=$id');</script>";
					}
				}
				else{
					echo "<script type='text/javascript'>alert('Not allowed'); window.location.replace('editnow.php?id=$id');</script>";
				}
			}
			else{
				echo "<script type='text/javascript'>alert('Not allowed'); window.location.replace('editnow.php?id=$id');</script>";
			}

		}
		else{
			
		}

		//check if null but for the author in needs only one to accept
		if($year!=NULL and $title !=NULL and $description != NULL and ($author_1 != NULL or $author_2 != NULL or $author_3 != NULL)){

			$query = "SELECT * FROM add_year INNER JOIN add_thesis ON add_thesis.year_id = add_year.year_id and add_thesis.addthesis_id = '$id'";
			$result = mysqli_query($conn,$query);

			if (mysqli_num_rows($result)>0)
				$row = mysqli_fetch_assoc($result);

			if ($year != $row['year']) {
				$sql1 = "SELECT * from add_year where year like '$year'";

				$result1 = mysqli_query($conn,$sql1);

				//check if year exist
				if (mysqli_num_rows($result1)>0){
					$row1 = mysqli_fetch_assoc($result1);

					$yeared = $row1['year_id'];

					//update the year_id
					$sql2 = "UPDATE add_thesis SET year_id='$yeared' where addthesis_id='$id'";

					$result2 = mysqli_query($conn,$sql2);

				}
				else{
					echo "<script type='text/javascript'>alert('Please enter an existing year or add it then edit this again!!'); window.location.replace('editnow.php?id=$id');</script>";
				}
			}
			
			$query1 = "UPDATE add_thesis SET title = '$title', description = '$description', author_1 = '$author_1', author_2 = '$author_2', author_3 = '$author_3' where addthesis_id = '$id'";

			$results1 = mysqli_query($conn,$query1);

		}else{
			echo "<script type='text/javascript'>alert('Please Fill the important staff'); window.location.replace('editnow.php?id=$id');</script>";
		}


		echo "<script type='text/javascript'>alert('Sucessfully Updated!!'); window.location.replace('edit.php?id=$login_id');</script>";
	}
?>