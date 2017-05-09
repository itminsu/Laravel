<?php
require_once("check_login.php");
function getEmployeesDbConnection()
{
    //connect to db
    $conn = mysqli_connect("127.0.0.1", "root", "inet2005", "employees");
    if (!$conn) {
        die("Could not connect to db: " . mysqli_connect_error());
    }
    return $conn;
}
?>