<?php
require_once("check_login.php");

require('dbconn.php');
//connect to db
$conn = getEmployeesDbConnection();

$empNo = $_POST["emp_no"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$birthDate = $_POST["birth_date"];
$gender = $_POST["gender"];
$hireDate = $_POST["hire_date"];

$sql = "UPDATE employees SET ";
$sql .= "birth_date = '" . $birthDate . "', ";
$sql .= "first_name = '" . $firstName . "', ";
$sql .= "last_name = '" . $lastName . "', ";
$sql .= "gender = '" . $gender . "', ";
$sql .= "hire_date = '" . $hireDate . "' ";
$sql .= "WHERE emp_no = " . $empNo;
$sql .= ";";

$result = mysqli_query($conn, $sql);
if(!$result) {
    die("Unable to Update new Employee into Table. ". mysqli_error($conn));
}

$count = mysqli_affected_rows($conn);
echo '<script language="javascript">';
if($count == 1) { //update success
    echo 'alert("update '. $count .' record success");';
    echo 'window.location.href="list_employee.php";';
}else {
    echo 'alert("Update failed");';
    echo 'window.location.href="update_form.php?empNo="' . $empNo . ';';
}
echo '</script>';
?>
