<?php
	header("Content-Type: application/json; charset=UTF-8");
	$link = mysqli_connect("localhost","root","2130415sap","employees");
	if ($link -> connect_error){
		die("Connection failed: " . $conn -> connect_error);
	}
	//echo "<script type='text/javascript'> alert('Connected'); </script>";

	$sql = "SELECT birth_date, first_name, last_name, gender, hire_date FROM employees LIMIT 100";
	$query = $link->query($sql);
	$outp = $query->fetch_all(MYSQLI_ASSOC);
	echo json_encode($outp);

?>
