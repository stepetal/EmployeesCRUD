$(document).ready(function(){
	$("#employeeTable").DataTable();
	$("#editButton").click(function(){
		var ajaxurl = 'php_scripts/functions.php';
		data = {'gr_string' : 'Hello'};
		$.post(ajaxurl,data,function(response){
			alert("greeting string has been sent");
			console.log(response);
		});
	});
});
