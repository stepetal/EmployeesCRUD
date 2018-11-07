<?php
$link = mysqli_connect("localhost","root","2130415sap","employees");
if ($link -> connect_error){
  die("Connection failed: " . $conn -> connect_error);
}

//print_r($_POST);
if (isset($_POST["emp_no"])){
  $value = mysqli_real_escape_string($link,$_POST["value"]);
  $query = "UPDATE employees SET ". $_POST["column_name"]."='".$value."' WHERE emp_no = '".$_POST["emp_no"]."'";
  //print_r($query);
  if (mysqli_query($link,$query)){
    echo 'Data updated successfully';
  }

}

?>
