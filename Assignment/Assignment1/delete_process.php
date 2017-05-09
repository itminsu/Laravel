<?php
require_once("check_login.php");
require('dbconn.php');
//connect to db
$conn = getEmployeesDbConnection();

$emp_no = $_GET["empNo"];


$sql = "DELETE FROM employees ";
$sql .= "WHERE emp_no = " . $emp_no;
$sql .= ";";

$result = mysqli_query($conn, $sql);
if(!$result) {
    die("Unable to DELETE Employee from Table. ". mysqli_error($conn));
}

$count = mysqli_affected_rows($conn);
$msg;
if($count == 1) { //delete success
    $msg = "delete " . $count . " record success";
}else {
    $msg = "Delete Failed";
}

echo '<script language="javascript">';
echo 'alert(" ' . $msg . ' ");';
echo 'window.location.href="list_employee.php";';
echo '</script>';
?>

