$(document).ready(function(){

	$("#showButton").click(function(){
		//console.log("button clicked");
		load_table();
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
			"url" : "php_scripts/functions.php",
			//type : "POST",
			dataSrc : ''
		},
		"columns" : [{
			"data" : "first_name"
		}, {
			"data" : "last_name"
		}, {
			"data" : "gender"
		}, {
			"data" : "birth_date"
		},{
			"data" : "hire_date"
		}	]
	});
}
