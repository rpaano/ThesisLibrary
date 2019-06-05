<?php


	include("connect.php");

	$plahold = "";

	$year = "";
	$title = "";
	$description = "";
	$author_1 = "";
	$author_2 = "";
	$author_3 = "";

	if ($_SERVER['REQUEST_METHOD'] == "POST"){

		$year = $_POST['year'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$author_1 = $_POST['author_1'];
		$author_2 = $_POST['author_2'];
		$author_3 = $_POST['author_3'];

		$file = $_FILES['thesis_file'];

		if($year!=NULL and $title !=NULL and $description != NULL and ($author_1 != NULL or $author_2 != NULL or $author_3 != NULL)){

			if (($fileName = $_FILES['thesis_file']['name'])) {
				echo "inn ";

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

				$fileActualExt = strtolower(end($fileExt));

				$allowed = array('jpg','jpeg','png', 'pdf');


				if (in_array($fileActualExt, $allowed)){

					//check if error occurs
					if($fileError === 0){
						//file limit
						if ($fileSize< 1000000000000){
							$fileNameNew = $fileName;
							$fileDestination = 'uploads/'.$fileNameNew;
							move_uploaded_file($fileTmpName, $fileDestination);
							//header("Location:index2.php?sucess");

							//$sql = "UPDATE add_thesis SET thesis_file='$fileNameNew', location='$fileDestination' WHERE addthesis_id='$id'";

							//$results = mysqli_query($conn,$sql);

							$sql = "Select * from add_year WHERE year='$year'";

							$result = mysqli_query($conn,$sql);

							//check if year exist year
							if (mysqli_num_rows($result)>0){
								$row1 = mysqli_fetch_assoc($result);
								echo "inn3";
								$yeared = $row1['year_id'];

								$sql1 = "insert into add_thesis (title, thesis_file, location, description, author_1, author_2, author_3, year_id) values ('$title', '$fileNameNew', '$fileDestination', '$description','$author_1', '$author_2', '$author_3', '$yeared')";

								echo $sql1;
								//$result2 = mysqli_query($conn,$sql1);

								//check if no error
								if(mysqli_query($conn,$sql1)) {
									echo "inn4";
									echo "<script type='text/javascript'>alert('Succesfully added!!'); window.location.replace('edit_file.php');</script>";
								}
								else{
									echo "inn5";
									echo "<script type='text/javascript'>alert('Unsuccesfull Please try again!!'); window.location.replace('edit_file.php');</script>";
								}

							}
							else{
								echo "<script type='text/javascript'>alert('Please enter an existing year or add it then edit this again!!'); </script>";
							}

						}
						else{
							echo "<script type='text/javascript'>alert('File too big'); </script>";
						}
					}
					else{
						echo "<script type='text/javascript'>alert('Not allowed');</script>";
					}
				}
				else{
					echo "<script type='text/javascript'>alert('Not allowed'); </script>";
				}

			}
			else{
				echo "<script type='text/javascript'>alert('Please put a PDF File!!!'); </script>";
			}

		}else{
			$plahold = "#";
		}

	}else{

	}



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="add.php" method="POST" enctype="multipart/form-data">
		Year <input type="text" name="year" value="<?php print $year; ?>" placeholder="<?php echo $plahold;?>"><br>
		Title <input type="text" name="title" value="<?php print $title; ?>"  placeholder="<?php echo $plahold;?>"><br><br>
		<output>#NOTE if youd don't want to change the existing file just dont open anything or it will rewrite!!</output><br>
		Thesis File <input type="file" name="thesis_file" value="<?php print $thesis_file; ?>" placeholder="<?php echo $plahold ;?>"><br><br>
		Description <textarea  type="text" name="description" value="<?php print $description; ?>" placeholder="<?php echo $plahold;?>"></textarea> <br>
		Author 1 <input type="text" name="author_1" value="<?php print $author_1; ?>" placeholder="<?php echo $plahold;?>"><br>
		Author 2 <input type="text" name="author_2" value="<?php print $author_2; ?>" placeholder="<?php echo $plahold;?>"><br>
		Author 3 <input type="text" name="author_3" value="<?php print $author_3; ?>" placeholder="<?php echo $plahold;?>"><br>

		<button type="sumbit">Sumbit</button>
	</form>
</body>
</html>