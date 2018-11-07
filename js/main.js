$(document).ready(function(){

	$("#showButton").click(function(){
		//console.log("button clicked");
		load_table();
	});

	function update_data(emp_id,column_name,value){
		$.ajax({
				url: "update.php",
				method: "POST",
				data:{emp_no: emp_no, column_name: column_name, value: value},
				success: function(data){
					$('#alertMessage').html('<div class="alert alert-success">' + data + '</div>');
					$('#employeeTable').DataTable().destroy();
					load_table();
				}

		});
		setInterval(function()){
			$('#alertMessage').html('');
		}, 5000);
	}

	$(document).on('blur','.update',function(){
		var emp_no = $(this).data("emp_no");
		var column_name = $(this).data("column");
		var value = $(this).text();
		update_data(emp_no,column_name,value);
	});

	







	// $("#editButton").click(function(){
	// 	var ajaxurl = 'php_scripts/functions.php';
	// 	data = {'gr_string' : 'Hello'};
	// 	$.post(ajaxurl,data,function(response){
	// 		alert("greeting string has been sent");
	// 		console.log(response);
	// 	});
	// });
});

function load_table(){
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
