<?php
	if ($_POST['gr_string']){
		greeting_function();
		
	}
	
	function greeting_function(){
		//echo "<script> console.log('Hello'); </script>";
		//exit;
		$i = 1;
		echo "Hello world " . $i . " ";
		
	}
?>