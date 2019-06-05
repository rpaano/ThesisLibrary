<?php 

	session_start();

	$_SESSION['varname'] = "";

	echo "<script type='text/javascript'> window.location.replace('index.php');</script>";


 ?>