<?php
	

	class editthis{

		public $id;
		public $result;

		public function setid($sett){
			$this->id = $sett;
		}

		public function que(){
			$this->query = "SELECT * FROM add_year INNER JOIN add_thesis ON add_year.year_id = add_thesis.year_id order by add_year.year";
			return $this->query;
		}
		
		public function results(){
			include("connect.php");

			$this->result = mysqli_query($conn, $this->que());
			//echo "here <br>";
			mysqli_close($conn);
			return $this->result;
		}
	}

	$edit = new editthis();
	//$edit->setid($_GET['year_id']);
	$result = $edit->results();

	session_start();
	 $row1['login_id'] = $_SESSION['varname'];
	 //echo $row1['login_id'];

	 /*<button type="submit">UPDATE</button> | <a href="edit.php?id=<?php print $row1['login_id']; ?>"><button type="button">CANCEL</button></a>
	 */
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<body>
		
		<p>

			<table border='1'>

			<tr>

			<th>ID</th>

			<th>Year</th>

			<th>Title</th>

			<th>File</th>

			<th>description</th>

			<th>author_1</th>

			<th>author_2</th>

			<th>author_3</th>

			<th>Edit</th>

			<th>Delete</th>

			</tr>

			<?php foreach($result as $row): ?>

				
				<div id="title">
					
					<tr>
					<th><?php echo $row['year_id'];  ?></th>
					<th><?php echo $row['year'];  ?></th>
					<th><a value="<?php echo $row['title']; ?>"></a><?php echo $row['title']; ?></th>
					<th>PAra sa pag view</th>
					<th><a value="<?php echo $row['description']; ?>" ><?php echo $row['description']; ?></a></th>
					<th><a value="<?php echo $row['author_1']; ?>"><?php echo $row['author_1']; ?></a></th>
					<th><a value="<?php echo $row['author_2']; ?>"><?php echo $row['author_2']; ?></a></th>
					<th><a value="<?php echo $row['author_3']; ?>"><?php echo $row['author_3']; ?></a></th>
					<th><a href="editnow.php?id=<?php echo $row['addthesis_id']; ?>">EDIT</a></th>
					<th><a href="deletenow.php?id=<?php echo $row['addthesis_id']; ?>">DELETE</a></th>
					</tr>
				</div>

			<?php endforeach; ?>

		</p>
		
				
		<p>
				<a href="edit.php?id=<?php print $row1['login_id']; ?>"><button type="button">DONE</button></a>
				<br>
				<a href="add.php"><button type="button">ADD Thesis</button></a>
		</p>
	</body>
</html>