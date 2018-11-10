$(document).ready(function(){
	var deptName = "";
	var deptMaxSalary = "";
	var labels = [];
	var data_for_plot = [];
	var ctx = document.getElementById('empoyeeGraph').getContext('2d');
	//var tableEmp;
	load_table();



	$('#graphPill').click(function(){
		console.log("graph pill clicked");
		$('#loadingMessage').html('<div class="alert alert-warning">Обработка запроса...</div>');
		$.ajax({
			url : "php_scripts/graph.php",
			method : "POST",
			data : {dept_name : deptName, dept_max_salary: deptMaxSalary},
			success : function(data){
				$.notify("Успешно","success");
				$('#loadingMessage').html('');
				//$.notify("Query successful","success");
				var dt = JSON.parse(data);
				dt["data"].forEach(function(packet){
					labels.push(packet[0]);
					data_for_plot.push(parseInt(packet[1]));
				});
				plot_graph();
				// deptName = dt["dept_name"];
				// deptMaxSalary = parseInt(dt["max_salary"]);
				//deptName = dt.map(function(e){return e.dept_name});
				// deptName = dt.data.map(function(e){
				// 	return e[0];
				// });
				// deptMaxSalary = dt.data.map(function(e){
				// 	return e[1];
				// });
				//console.log(dt["data"]);

				// console.log(deptName);
				// console.log(deptMaxSalary);
				//console.log(dt["dept_name"]);
				// console.log(typeof(dt["max_salary"]));
				// console.log(typeof(deptMaxSalary));
				// console.log(typeof([20]));
				// console.log(typeof([deptMaxSalary]));
				// console.log(typeof([deptName.toString()]));

			}
		});





	});

	$("#refreshButtonTable").click(function(){
		//console.log("button clicked");
		$("#employeeTable").DataTable().destroy();
		load_table();
		$.notify("Таблица обновлена","success");
	});

	$("#refreshButtonGraph").click(function(){
		plot_graph();
		$.notify("График обновлен","success");
	});

	// $("#deleteButton").click(function(){
	//
	// 	$("#employeeTable").DataTable().rows().remove().draw();
	// 	$("#employeeTable").DataTable().destroy();
	// });

	$("#addButton").click(function(){
		console.log("addButton clicked");
		var htmlCnt = '<tr>';
		htmlCnt += '<td contenteditable id="firstNameInsert"></td>';
		htmlCnt += '<td contenteditable id="lastNameInsert"></td>';
		htmlCnt += '<td contenteditable id="genderInsert"></td>';
		htmlCnt += '<td contenteditable id="birthDateInsert"></td>';
		htmlCnt += '<td contenteditable id="hireDateInsert"></td>';
		htmlCnt += '<td><button type = "button" name = "insert" class="btn btn-success btn-xs insert" id="insertButton"><i class="fas fa-check-circle"></i> Добавить</button></td>';
		htmlCnt += '</tr>';
		$("#employeeTable tbody").prepend(htmlCnt);
	});

	$(document).on('click','#insertButton',function(){
		console.log("insert button clicked");
		var firstName = $("#firstNameInsert").text();
		var lastName = $("#lastNameInsert").text();
		var gender = $("#genderInsert").text();
		var birthDate = $("#birthDateInsert").text();
		var hireDate = $("#hireDateInsert").text();
		$.ajax({
			url : "php_scripts/insert.php",
			method : "POST",
			data : {first_name : firstName, last_name : lastName, gender : gender, birth_date : birthDate, hire_date : hireDate},
			success: function (data){
				$.notify("Запись добавлена", "success");
				//$('#alertMessage').html('<div class="alert alert-success">' + data + '</div>');
				$("#employeeTable").DataTable().destroy();
				load_table();
			}
		});
		// setInterval(function(){
		// 	$('#alertMessage').html('');
		// }, 2000);
	});

	$(document).on('click','.delete',function(){
		var emp_no = $(this).attr("id");
		if(confirm("Are you sure you want to remove this?")){
			$.ajax({
				url : "php_scripts/delete.php",
				method : "POST",
				data : {empNum : emp_no},
				success : function(data){
					$.notify("Запись уделена", "success");
					// $('#alertMessage').html('<div class="alert alert-success">' + data + '</div>');
					$('#employeeTable').DataTable().destroy();
					load_table();
				}
			});
			// setInterval(function(){
			// 	$('#alertMessage').html('');
			// }, 2000);
		}
	});

		// $.ajax({
		// 	"url" : "php_scripts/insert.php";
		//
		// });



	function update_data(emp_no,column_name,value){
		$.ajax({
				url: "php_scripts/update.php",
				method: "POST",
				data:{emp_no: emp_no, column_name: column_name, value: value},
				success: function(data){
					$.notify("Запись обновлена","success");
					//$('#alertMessage').html('<div class="alert alert-success">' + data + '</div>');
					$('#employeeTable').DataTable().destroy();
					//console.log("now draw the table again");
					//tableEmp.clear().draw();

					load_table();
					console.log("success");

				}

		});
		// setInterval(function(){
		// 	$('#alertMessage').html('');
		// }, 2000);
	}

	$(document).on('blur','.update',function(){
		console.log($(this).attr("data_column_name"));
		console.log($(this).attr("data-id"));
		console.log($(this).text());
		//console.log($(this));
		var emp_no = $(this).attr("data-id");
		var column_name = $(this).attr("data_column_name");
		var value = $(this).text();
		update_data(emp_no,column_name,value);
	});

	function plot_graph(){
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'line',
			pointStyle: 'triangle',

			// The data for our dataset
			data: {
				labels: labels,
				datasets: [{
					label: "Department and salary",
					backgroundColor: 'rgb(255, 99, 132)',
					borderColor: 'rgb(255, 99, 132)',
					data: data_for_plot,
				}]
			},

			// Configuration options go here
			options: {

				responsive: true,
				title : {
					display : true,
					text : 'Departments statistic',
					position : 'top',
				},
				legend : {
					display : true,
					labels : {
						fontColor: 'rgb(255,99,32)',
					}
				}
			}
		});

	}

	function load_table(){
			console.log("Table is loading...");
			//$("employeeTable").empty();
			$("#employeeTable").DataTable({

			"processing" : true,
			"serverSide" : true,
			"order" : [],
			"ajax": {
				url : "php_scripts/functions.php",
				type : "POST",
				//dataSrc : ''
			}
			// "columns" : [{
			// 	"data" : "first_name"
			// }, {
			// 	"data" : "last_name"
			// }, {
			// 	"data" : "gender"
			// }, {
			// 	"data" : "birth_date"
			// },{
			// 	"data" : "hire_date"
			// }	]
		});
	}













	// $("#editButton").click(function(){
	// 	var ajaxurl = 'php_scripts/functions.php';
	// 	data = {'gr_string' : 'Hello'};
	// 	$.post(ajaxurl,data,function(response){
	// 		alert("greeting string has been sent");
	// 		console.log(response);
	// 	});
	// });
});
