<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST"){

		$file = $_FILES['file'];

		$fileName = $_FILES['file']['name'];
		echo "$fileName ";
		$fileTmpName = $_FILES['file']['tmp_name'];
		echo "$fileTmpName ";
		$fileSize = $_FILES['file']['size'];
		echo "$fileSize ";
		$fileError = $_FILES['file']['error'];
		echo "$fileError ";
		$fileType = $_FILES['file']['type'];
		echo "$fileType ";

		$fileExt = explode('.', $fileName);

		echo "$fileExt[1]";

		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg','jpeg','png', 'pdf');


		if (in_array($fileActualExt, $allowed)){
			if($fileError === 0){
				if ($fileSize< 10000000000){
					$fileNameNew = $fileName;
					$fileDestination = 'uploads/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					header("Location:index2.php?sucess");
				}
				else{
					echo "to big!!!";
				}
			}
			else{
				echo"no not allowed";
			}
		}
		else{
			echo"NOt allowed!!";
		}
	}
	else{
		echo "no";
	}
?>