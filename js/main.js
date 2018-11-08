$(document).ready(function(){
	//var tableEmp;
	load_table();
	$("#showButton").click(function(){
		//console.log("button clicked");
		load_table();
	});

	// $("#deleteButton").click(function(){
	//
	// 	$("#employeeTable").DataTable().rows().remove().draw();
	// 	$("#employeeTable").DataTable().destroy();
	// });

	$("#addButton").click(function(){
		// var html = '<tr>';
		// html += '<td contenteditable id>'
	});

	function update_data(emp_no,column_name,value){
		$.ajax({
				url: "php_scripts/update.php",
				method: "POST",
				data:{emp_no: emp_no, column_name: column_name, value: value},
				success: function(data){
					$('#alertMessage').html('<div class="alert alert-success">' + data + '</div>');
					$('#employeeTable').DataTable().destroy();
					//console.log("now draw the table again");
					//tableEmp.clear().draw();

					load_table();
					console.log("success");

				}

		});
		setInterval(function(){
			$('#alertMessage').html('');
		}, 2000);
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
