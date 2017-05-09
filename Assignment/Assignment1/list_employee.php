<?php
require_once("check_login.php");

require('dbconn.php');
//connect to db
$conn = getEmployeesDbConnection();

/* Get total number of records */
if(!empty($searchText)) {
    $sql = "SELECT count(emp_no) FROM employees WHERE first_name LIKE '%$searchText%' OR last_name LIKE '%$searchText%'";
}
else {
    $sql = "SELECT count(emp_no) FROM employees ";
}
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Could not get data: ' . mysqli_error());
}

$page_row = 25;
$total = mysqli_num_rows($result);//total data

$page_num = ceil($total/$page_row);//total page
$first_page = 1;
$current_page = 1;


$row = mysqli_fetch_array($result);
$page_count = $row[0];


if (isset($_GET{'page'})) {
    $page = $_GET{'page'} + 1;
    $offset = $page_row * $page;
} else {
    $page = 0;
    $offset = 0;
}

$searchText = empty($_POST["searchT
ext"]) ? 0 : $_POST["searchText"];
if(!empty($searchText)) {
    $sql = "SELECT * FROM employees WHERE first_name LIKE '%$searchText%' OR last_name LIKE '%$searchText%' ORDER BY emp_no DESC  LIMIT $offset, $page_row";
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        die("Could not retrieve records from databases:" . mysqli_error($conn));
    }
}
else {
    $sql = "SELECT *FROM employees ORDER BY emp_no DESC LIMIT $offset, $page_row";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die('Could not get data: ' . mysqli_error($conn));
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <style>
        table { border: 1px solid blue; }
        th, td { border: 1px solid red; }
    </style>
</head>
<body>
<h2>Welcome! <?php echo $_SESSION["userName"] ?>
    <a href="add_form.php" >Add employee</a>
    <a href="check_logout.php" >Logout</a></h2>
<h3>Search First & Last Names From Database: </h3>
<form id="searchForm" name="searchForm" action="list_employee.php" method="post">
    <p><label>Search: <input type="text" id="searchText" name="searchText" value=""/></label></p>
    <p><input type="submit" id="submitButton" name="submitButton" value="Submit Query" /></p>
</form>
<table>
    <thead>
    <tr>
        <th>Emp. Number</th>
        <th>Birth Date</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Hire Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //loop through the data
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row["emp_no"] ?></td>
            <td><?php echo $row["birth_date"] ?></td>
            <td><?php echo $row["first_name"] ?></td>
            <td><?php echo $row["last_name"] ?></td>
            <td><?php echo $row["gender"] ?></td>
            <td><?php echo $row["hire_date"] ?></td>
            <td><a href="javascript:location.href='update_form.php?empNo=<?php echo $row["emp_no"] ?>'">Edit</a></td>
            <td><a href="javascript:location.href='delete_process.php?empNo=<?php echo $row["emp_no"] ?>'">Delete</a></td>
        </tr>
        <?php
    }
    //close the connection
    mysqli_close($conn);
    ?>
    </tbody>
    <?php
    $_PHP_SELF = $_SERVER['PHP_SELF'] ;
    echo "<a href = \"$_PHP_SELF?page = $first_page\">First</a> |";
    echo "<a href = \"$_PHP_SELF?page = $current_page - 1\">Previous</a> |";
    echo "<a href = \"$_PHP_SELF?page = $current_page + 1\">Next</a> |";
    echo "<a href = \"$_PHP_SELF?page = $page_num\">Last</a>";
    ?>
</table>
</body>
</html>