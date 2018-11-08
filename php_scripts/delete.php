<?php
  $link = mysqli_connect("localhost","root","2130415sap","employees");
  if ($link -> connect_error){
    die("Connection failed: " . $conn -> connect_error);
  }
  $empNum = mysqli_real_escape_string($link,$_POST["empNum"]);
  //print_r($empNum);
  $query_delete = "DELETE FROM employees WHERE emp_no = '$empNum'";
  //print_r($query_delete);
   if(mysqli_query($link,$query_delete)){
    echo 'Data deleted successfully';
  }

?>
