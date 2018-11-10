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

	<div class="row">
		<div class = "col-md-2"></div>
		<div class = "col-md-8 jumbotron">
			<ul class="nav nav-pills" role="tablist">
				<li class="nav-item text-light">
					<a class="nav-link text-dark active" data-toggle="pill" href="#table" id="tablePill">Таблица</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" data-toggle="pill" href="#graph" id="graphPill">График</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="table" class="container tab-pane active">
					<h3 class="text-center">Табличное представление</h3>

					<a class='btn btn-small text-light' id='addButton'><i class='fas fa-plus-circle'></i> Добавить</a>
					<!-- <a class='btn btn-primary btn-small' id='editButton'><i class='fas fa-user-edit'></i></a>
					 -->
					<a class='btn btn-small text-light' id='refreshButtonTable'><i class='fas fa-sync'></i> Обновить</a>

					<table id="employeeTable" class="table cell-border table-striped table-bordered display table-responsive" style="width: 100%">
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
						</tbody>
					</table>
				</div>
				<div id="graph" class="container tab-pane fade">
					<h3 class="text-center">Графическое представление</h3>
					<div id="loadingMessage"></div>
					<a class='btn btn-small text-light' id='refreshButtonGraph'><i class='fas fa-sync'></i> Обновить</a>

					<canvas id="empoyeeGraph"></canvas>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/notify.js"></script>
</body>
</html>
