<?php
require_once("check_login.php");
require('dbconn.php');
//connect to db
$conn = getEmployeesDbConnection();

$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$birthDate = $_POST["birth_date"];
$gender = $_POST["gender"];
$hireDate = $_POST["hire_date"];

//get new emp_no from employees table
$sql = "SELECT MAX(emp_no) + 1 AS emp_no from employees;";
$result = mysqli_query($conn, $sql);
if(!$result) {
    die("Unable to get record as New Emp_no. ". mysqli_error($conn));
}

$newEmpNo = implode(mysqli_fetch_assoc($result));

$sql = "INSERT INTO employees( ";
$sql .= "emp_no, birth_date, first_name, last_name, gender, hire_date) ";
$sql .= "VALUES( ";
$sql .= $newEmpNo . ", '";
$sql .= $birthDate . "', '";
$sql .= $firstName . "', '";
$sql .= $lastName . "', '";
$sql .= $gender . "', '";
$sql .= $hireDate . "');";

$result = mysqli_query($conn, $sql);
if(!$result) {
    die("Unable to insert new Employee into Table. ". mysqli_error($conn));
}

$count = mysqli_affected_rows($conn);
if($count == 1) {
    //add succeed
    echo '<script language="javascript">';
    echo 'alert("Insert '. $count .' record success");';
    echo 'window.location.href="list_employee.php";';
    echo '</script>';
}else {
    echo '<script language="javascript">';
    echo 'alert("Inserting Employee is failed!!");';
    echo 'window.location.href="add_form.php";';
    echo '</script>';
}
?>

