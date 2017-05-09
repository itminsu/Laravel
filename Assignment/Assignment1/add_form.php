<?php
require_once("check_login.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Employee Page</title>
    </head>
    <body>
        <h2>
            <a href="list_employee.php">Go to Employee List</a>
            <a href="check_logout.php" >Logout</a>
        </h2>
        <form id="addForm" name="addForm" action="add_process.php" method="post">
            <p>First Name: <input type="text" id="first_name" name="first_name" placeholder="Minsu" pattern="[A-Z]([a-z]*)"
                                  oninvalid="this.setCustomValidity('First Name must start with a capital letter.')" oninput="setCustomValidity('')"/></p>
            <p>Last Name : <input type="text" id="last_name" name="last_name" placeholder="Lee" pattern="[A-Z]([a-z]*)"
                                  oninvalid="this.setCustomValidity('Last Name must start with a capital letter.')" oninput="setCustomValidity('')"/></p>
            <p>Birth Date: <input type="date" id="birth_date" name="birth_date" required="required"/></p>
            <p>Hire Date : <input type="date" id="hire_date" name="hire_date" required="required"/></p>
            <p><label><input type="radio" id="genderM" name="gender" value="M" required="required" checked/>Male</label></p>
            <p><label><input type="radio" id="genderM" name="gender" value="F" required="required" />Female</label></p>
            <p><input type="submit" id="submitButton" name="submitButton" value="Submit Query" /></p>
        </form>
    </body>
</html>


