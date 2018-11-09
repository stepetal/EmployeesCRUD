<?php
$link = mysqli_connect("localhost","root","2130415sap","employees");
if ($link -> connect_error){
  die("Connection failed: " . $conn -> connect_error);
}
//print_r($_POST);
$query = "SELECT q.dept_name AS dept_name, MAX(salary) AS max_salary FROM
(SELECT dep_t.dept_name AS dept_name, sal_t.salary AS salary
FROM departments dep_t
INNER JOIN dept_emp ON dept_emp.dept_no = dep_t.dept_no
INNER JOIN employees emp_t ON emp_t.emp_no = dept_emp.emp_no
INNER JOIN salaries sal_t ON emp_t.emp_no = sal_t.emp_no
LIMIT 100
) q
GROUP BY q.dept_name";
$num_filter_rows = mysqli_num_rows(mysqli_query($link,$query));
$result = mysqli_query($link,$query);
$data = array();
while ($row = mysqli_fetch_array($result)){
  $sub_array1[] = $row["dept_name"];
  $sub_array2[] = $row["max_salary"];
}
$output = array(
"dept_name" => $sub_array1,
"max_salary" => $sub_array2
);
echo json_encode($output);
//print_r($output);
?>
