$(document).ready(function(){
	$("#employeeTable").DataTable({
		"processing": true,
        "serverSide": true,
        "ajax": "php_scripts/functions.php"
	});
	$("#editButton").click(function(){
		var ajaxurl = 'php_scripts/functions.php';
		data = {'gr_string' : 'Hello'};
		$.post(ajaxurl,data,function(response){
			alert("greeting string has been sent");
			console.log(response);
		});
	});
});
