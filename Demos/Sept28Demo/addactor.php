<!DOCTYPE html>
<html>
    <head>
        <title>Add New Actor</title>
    </head>
    <body>
        <h1>Add New Actor</h1>
            <form id="addActor" name="addActor" action="addactor.php" method="post">
                <p><label>First Name: <input type="text" id="firstName" name="firstName" value=""/></label></p>
                <p><label>Last Name: <input type="text" id="lastName" name="lastName" value=""/></label></p>
                <input type="submit" id="submitButton" name="submitButton" value="Submit"/>
            </form>
        <?php

            if(!empty($_POST['firstName']) && !empty($_POST['lastName']))
            {

                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                //possible validation here

                //connect to db
                $conn = mysqli_connect("localhost", "root", "inet2005", "sakila");//host , user, password, dbname
                if(!$conn)
                {
                    die("Unable to establish db connection: " . mysqli_connect_error());
                }
                //insert data to db

                $sql = "INSERT INTO actor (first_name, last_name) VALUES  ('";
                $sql.= $firstName . "','";
                $sql.= $lastName . "')
                ";

                //execute the query
                $result = mysqli_query($conn, $sql);
                if(!$result)
                {
                    die("Unable to insert new row: " . mysqli_error());
                } else {
                    echo "Record saved!";
                }



                //close to db
                mysqli_close($conn);

            }
        ?>
    </body>
</html>