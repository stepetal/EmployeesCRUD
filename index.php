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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
						<th>Operations</th>
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
						echo "<td> <a class='btn btn-primary btn-small' id='editButton'><i class='fas fa-user-edit'></i></a> <a class='btn btn-danger btn-small' id='deleteButton'><i class='fas fa-user-minus'></i></a></td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
