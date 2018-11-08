<?php
$link = mysqli_connect("localhost","root","2130415sap","employees");
if ($link -> connect_error){
  die("Connection failed: " . $conn -> connect_error);
}
$query_emp_no = "SELECT emp_no FROM employees ORDER BY emp_no DESC LIMIT 1";
$result = mysqli_query($link,$query_emp_no);
while ($row = mysqli_fetch_array($result)){
    //print_r($row);
  //  print_r($row["emp_no"]);
    $empNum = $row["emp_no"];
    //print_r($empNum);
}
$firstName = mysqli_real_escape_string($link,$_POST["first_name"]);
$lastName = mysqli_real_escape_string($link,$_POST["last_name"]);
$gender = mysqli_real_escape_string($link,$_POST["gender"]);
$birthDate = mysqli_real_escape_string($link,$_POST["birth_date"]);
$hireDate = mysqli_real_escape_string($link,$_POST["hire_date"]);
$pars[] = array($firstName,$lastName,$gender,$birthDate,$hireDate);
//print_r($pars);
// $query_select_last = "SELECT * FROM employees WHERE emp_no = '$empNum'";
// print_r($query_select_last);
// $result = mysqli_query($link,$query_select_last);
// while ($row = mysqli_fetch_array($result)){
//   print_r($row);
// }
$new_emp_no = intval($empNum) + 1;
$query_insert = "INSERT INTO employees(emp_no,birth_date,first_name,last_name,gender,hire_date) VALUES ('$new_emp_no','$birthDate','$firstName','$lastName','$gender','$hireDate')";
if(mysqli_query($link,$query_insert)){
  echo 'Data inserted successfully';
}
//print_r($query_insert);


?>
