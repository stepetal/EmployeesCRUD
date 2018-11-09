$(document).ready(function(){
	//var tableEmp;
	load_table();

	$('#graphPill').click(function(){
		console.log("graph pill clicked");
		var ctx = document.getElementById('empoyeeGraph').getContext('2d');
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'line',

			// The data for our dataset
			data: {
				labels: ["January", "February", "March", "April", "May", "June", "July"],
				datasets: [{
					label: "My First dataset",
					backgroundColor: 'rgb(255, 99, 132)',
					borderColor: 'rgb(255, 99, 132)',
					data: [0, 10, 5, 2, 20, 30, 45],
				}]
			},

			// Configuration options go here
			options: {
				responsive: true
			}
		});

	});

	$("#refreshButton").click(function(){
		//console.log("button clicked");
		$("#employeeTable").DataTable().destroy();
		load_table();
		$.notify("Таблица обновлена","success");
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
