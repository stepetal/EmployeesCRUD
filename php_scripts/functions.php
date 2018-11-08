<?php
	//header("Content-Type: application/json; charset=UTF-8");
	$link = mysqli_connect("localhost","root","2130415sap","employees");
	if ($link -> connect_error){
		die("Connection failed: " . $conn -> connect_error);
	}
	//echo "<script> alert('Connected'); </script>";

	//select the rows
	/*
	$sql = "SELECT birth_date, first_name, last_name, gender, hire_date FROM employees LIMIT 100";
	$query = $link->query($sql);
	$outp = $query->fetch_all(MYSQLI_ASSOC);
	echo json_encode($outp);
	*/
	$columns = array('first_name','last_name','gender','birth_date','hire_date','operations');
	$query = "SELECT * FROM employees ";

	//print_r($_POST);
	if(isset($_POST["search"]["value"])){

		$query .= 'WHERE first_name LIKE "%' . $_POST["search"]["value"].'%" ORDER BY emp_no DESC LIMIT 10';
	} else {
		$query .= "ORDER BY emp_no DESC LIMIT 10";
	}
	//print_r($query);
	$num_filter_rows = mysqli_num_rows(mysqli_query($link,$query));
	$result = mysqli_query($link,$query);
	$data = array();
	while ($row = mysqli_fetch_array($result)){
		$sub_array = array();
		$sub_array[] = '<div contenteditable class="update" data-id="'.$row["emp_no"].'"
		data_column_name="first_name">'.$row["first_name"].'</div>';
		$sub_array[] = '<div contenteditable class="update" data-id="'.$row["emp_no"].'"
		data_column_name="last_name">'.$row["last_name"].'</div>';
		$sub_array[] = '<div contenteditable class="update" data-id="'.$row["emp_no"].'"
		data_column_name="gender">'.$row["gender"].'</div>';
		$sub_array[] = '<div contenteditable class="update" data-id="'.$row["emp_no"].'"
		data_column_name="birth_date">'.$row["birth_date"].'</div>';
		$sub_array[] = '<div contenteditable class="update" data-id="'.$row["emp_no"].'"
		data_column_name="hire_date">'.$row["hire_date"].'</div>';
		$sub_array[] = '<button type = "button" name = "delete" class="btn btn-danger btn-xs delete" id="'.$row["emp_no"].'"><i class="fas fa-user-minus"></i></button>';
		//$sub_array[] = '<div contenteditable></div>';
		$data[] = $sub_array;
	}

	function get_all_data($link)
	{
		$query = "SELECT * FROM employees LIMIT 10";
		$result = mysqli_query($link,$query);
		return mysqli_num_rows($result);
	}


	$output = array(
		"draw" => intval($_POST['draw']),
		"recordsTotal" => get_all_data($link),
		"recordsFiltered" => $num_filter_rows,
		"data" => $data
	);

	echo json_encode($output);


?>
