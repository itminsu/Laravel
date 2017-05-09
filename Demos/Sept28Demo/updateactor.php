<?php
    $id = 203;

    //connect to db
    $conn = mysqli_connect("localhost", "root", "inet2005", "sakila");//host , user, password, dbname
    if(!$conn)
    {
        die("Unable to establish db connection: " . mysqli_connect_error());
    }


    $sql = "SELECT * FROM actor WHERE actor_id = $id";

    //execute the query
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die("Unable to get record: " . mysqli_error());
    }

    $data = mysqli_fetch_assoc($result);
    $firstName = $data['first_name'];
    $lastName = $data['last_name'];

    //Get the current info for specific user id


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Actor</title>
    </head>
    <body>
        <h1>Update Actor</h1>
            <form id="updateActor" name="updateActor" action="updateactor.php" method="post">
                <p><label>Actor ID: <input type="text" id="actorID" name="actorID" value="<?php echo $id?>"/></label></p>
                <p><label>First Name: <input type="text" id="firstName" name="firstName" value="<?php echo $firstName ?>"/></label></p>
                <p><label>Last Name: <input type="text" id="lastName" name="lastName" value="<?php echo $lastName ?>"/></label></p>
                <input type="submit" id="submitButton" name="submitButton" value="Update"/>
            </form>
        <?php

            if(!empty($_POST['firstName']) && !empty($_POST['lastName']))
            {

                $actorID = $_POST['actorID'];

                //possible validation here


//                //build our update command
//                $sql = "UPDATE actor SET first_name = '";
//                $sql .= $firstName . "', ";
//                $sql .= "last_name = '" . $lastName . "''";
//                $sql .= "WHERE actor_id = $id";
//
//                //execute the query
//                $result = mysqli_query($conn, $sql);
//                if(!$result)
//                {
//                    die("Unable to update row: " . mysqli_error());
//                } else {
//                    echo "Record updated!";
//                }




            }
        ?>
    </body>
</html>

<?php
    //close to db
    mysqli_close($conn);
?>