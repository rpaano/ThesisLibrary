<?php
class editthis{

		public $id;
		public $result;

		public function setid($sett){
			$this->id = $sett;
		}

		public function que(){
			$this->query = "SELECT * FROM add_thesis WHERE year_id =".$this->id;
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
	$edit->setid($_GET['year_id']);
	$result = $edit->results();
?>

<!DOCTYPE html>
<html>
<head>
	<title>BBS</title>
</head>
<body>
	<h1></h1>

	<form action="" method="POST">
		<table border='1'>

		<tr>

		<th>Id</th>

		<th>Title</th>

		<th>description</th>

		<th>Thesis</th>

		<th>author_1</th>

		<th>author_2</th>

		<th>author_3</th>

		<th>View</th>

		</tr>

		<?php foreach($result as $row): ?>
			<div id="title">
				
					<tr>
						
					<th><?php echo $row['year_id'];  ?></th>
					<th><output><?php echo $row['title']; ?></output></th>
					<th>PAra sa pag view</th>
					<th><output><?php echo $row['description']; ?></output></th>
					<th><output><?php echo $row['author_1']; ?></output></th>
					<th><output><?php echo $row['author_2']; ?></output></th>
					<th><output><?php echo $row['author_3']; ?></output></th>
					<th><a href="viewer.php?id=<?php echo $row['year_id'];?>" >View</a></th>
					</tr>
				
			</div>
			<br />
		<?php endforeach; ?>
	</form>
</body>
</html>