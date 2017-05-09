<?php
require_once("check_login.php");

require('dbconn.php');
//connect to db
$conn = getEmployeesDbConnection();

$empNo = empty($_GET["empNo"]) ? 0 : $_GET["empNo"];
$sql = "SELECT emp_no, birth_date, first_name, last_name, gender, hire_date";
$sql .= " FROM employees ";
$sql .= " WHERE emp_no=" . $empNo . ";";

$result = mysqli_query($conn, $sql);
if(!$result) {
    die("Unable to get record as New Emp_no. ". mysqli_error($conn));
}

$row = mysqli_fetch_object($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Employee Page</title>
</head>
<body>
<h2>
    <a href="check_logout.php" >Logout</a>
</h2>
<form id="updateForm" name="updateForm" action="update_process.php" method="post">
    <input type="hidden" id="empNo" name="emp_no" value="<?php echo $row -> emp_no ?>" />
    <p>First Name: <input type="text" id="first_name" name="first_name" placeholder="Minsu" pattern="[A-Z]([a-z]*)"
                          oninvalid="this.setCustomValidity('First Name must start with a capital letter.')" oninput="setCustomValidity('')"
                          value="<?php echo $row -> first_name ?>"</p>
    <p>Last Name : <input type="text" id="last_name" name="last_name" placeholder="Lee" pattern="[A-Z]([a-z]*)"
                          oninvalid="this.setCustomValidity('Last Name must start with a capital letter.')" oninput="setCustomValidity('')"
                            value="<?php echo $row -> last_name ?>"</p>
    <p>Birth Date: <input type="date" id="birth_date" name="birth_date" required="required"
                            value="<?php echo $row -> birth_date ?>"/></p>
    <p>Hire Date : <input type="date" id="hire_date" name="hire_date" required="required"
                          value="<?php echo $row -> hire_date ?>"/></p>
    <p><label><input type="radio" id="genderM" name="gender" value="M" required="required"
                                 <?php echo $row -> gender=='M'? 'checked' : '' ?>/>Male</label></p>
    <p><label><input type="radio" id="genderM" name="gender" value="F" required="required"
                                 <?php echo $row -> gender=='F'? 'checked' : '' ?>/>Female</label></p>
    <button type="reset" onclick="location.href='list_employee.php'">Cancel</button>
    <button type="submit" >Submit</button>
</form>
</body>
</html>


