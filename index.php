<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
	<title>Employee table</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="css/style.css">
	
</head>
<h1 class="text-center"> Employee Table </h1>
<body>

<?php
	$link = mysqli_connect("localhost","root","2130415sap","employees");
	if ($link -> connect_error){
		die("Connection failed: " . $conn -> connect_error);
	}
	echo "<script type='text/javascript'> alert('Connected'); </script>";
	
	$sql = "SELECT birth_date, first_name, last_name, gender, hire_date FROM employees LIMIT 100";
	$query = $link->query($sql);
?>
	<div class="row">
		<div class = "col-md-3"></div>
		<div class = "col-md-6">
			<table id="employeeTable" class="table table-striped table-bordered display" style="width: 100%">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Gender</th>
						<th>Birth date</th>
						<th>Hire date</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while ($row = $query->fetch_assoc()){
					echo "<tr>";
					echo "<td>" . $row["first_name"] . "</td>";
					echo "<td>" . $row["last_name"] . "</td>";
					echo "<td>" . $row["gender"] . "</td>";
					echo "<td>" . $row["birth_date"] . "</td>";
					echo "<td>" . $row["hire_date"] . "</td>";
					echo "</tr>";
				}
				?>	
				</tbody>
			</table>		
		</div>
	</div>

	
		
	
	
	
<form action = "/pages/get_handler.php" method = "get">
	Name:	<input type = "text" name = "name"><br>
	E - mail:	<input type = "text" name = "email"><br>
	<input type = "submit">
</form>
<?php
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		if (empty($name)){
			echo "Your name is empty";
		} else {
			echo $name;
			echo "<br>";
		}
		if (empty($email)){
			echo "Enter the email";
		} else {
			echo $email;
			echo "<br>";
		}
	}
	
?>
<script>
	function newFunction(){
		document.getElementById("demo_p").innerHTML = "New title";
	}
</script>


<?php
	
	define("constant","Just string",true);
	$str_1 = "New string";
	$str_2 = "New string 2";
	
	$new_array = array(1,2,3);
	$var = 4;
	$a_array = array("Tom" => "46","3" => "7");
	//echo $echo;
	//var_dump($echo_str);
	//var_dump($var);
	class Book{
		function Book(){
			$this -> title = "Mathcad";
		}
	}
	$new_book = new Book();
	echo $new_book -> title;
	echo strlen("Just little string");
	echo str_word_count("Just little string");
	echo constant; 
	echo $str_1.$str_2;
	//echo $new_array.item[0];
	
	if ($new_book -> title == "Matlab"){
		print "Success\n";
	} elseif ($new_book -> title == "Mathcad"){
		print "Nearly success\n";
	} else {
		print "Have a good day)";
	}
	print "Again hello <br>";
	$x = 0;
	while ($x < 4){
		echo "Hello<br>";
		$x++;
	}
	foreach ($new_array as $value){
		print "$value<br>";
	}
	for ($x = 0;$x < count($new_array);$x++){
			print "$new_array[$x] ";
	}
	foreach ($a_array as $name => $a_value){
			print "Key is: " . $name . ",Value is: " . $a_value . "<br>";
	}
	rsort($new_array);
	foreach ($new_array as $value){
		print "$value";
	}
	echo $_SERVER['PHP_SELF'];
	echo "</br>";
	echo $_SERVER['SCRIPT_NAME'];
	echo "</br>";
	echo $_SERVER['HTTP_HOST'];
	echo "</br>";
	echo $_SERVER['SERVER_ADDR'];
	
	
	
?>
<p id = "demo_p">Just paragraph</p>
<button type = "button" onclick = "newFunction()">Click!</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>