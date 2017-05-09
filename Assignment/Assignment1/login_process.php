<?php
require_once("check_login.php");
session_start();
ob_start();
require_once("dbconn.php");
$conn = getEmployeesDbConnection();

$tbl_Name="login_user"; // Table name
// username and password sent from form
$userName=$_POST['userName'];
$userPwd=$_POST['userPwd'];

// To protect MySQL injection (more detail about MySQL injection)
$userName = stripslashes($userName);
$userPwd = stripslashes($userPwd);
$userName = mysqli_real_escape_string($conn, $userName);
$userPwd = mysqli_real_escape_string($conn, $userPwd);
//Hash Password
$hashPwd = hash('sha256', $userPwd);

$sql="SELECT * FROM $tbl_Name WHERE user_name='$userName' and user_pwd='$hashPwd'";
$result = mysqli_query($conn, $sql);
if(!$result) {
    die("Unable to get record list. ". mysqli_error($conn));
}
// Mysql_num_row is counting table row
$count = mysqli_num_rows($result);

// If result matched $userName and $userPwd, table row must be 1 row
if($count == 1){
// Register $userName, $userPwd and redirect to file "list_employee.php"
    $_SESSION["userName"] = $userName;
    $_SESSION['userPwd'] = $hashPwd;
    header("location:list_employee.php");
    exit;
}
else {
    echo '<script language="javascript">';
    echo 'alert("Login failed: Wrong Username or Password");';
    echo 'window.location.href="index.html";';
    echo '</script>';
}
ob_end_flush();
?>


