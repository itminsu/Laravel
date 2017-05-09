<!DOCTYPE html>
<html>
    <head>
        <title>Delete Actor</title>
    </head>
    <body>
        <h1>Delete Actor</h1>
            <form id="deleteActor" name="deleteActor" action="deleteactor.php" method="post">
                <p><label>Actor ID: <input type="text" id="actorID" name="actorID" value=""/></label></p>
                <input type="submit" id="submitButton" name="submitButton" value="Delete"/>
            </form>
        <?php

            if(!empty($_POST['actorID']))
            {

                $actorID = $_POST['actorID'];

                //possible validation here

                //connect to db
                $conn = mysqli_connect("localhost", "root", "inet2005", "sakila");//host , user, password, dbname
                if(!$conn)
                {
                    die("Unable to establish db connection: " . mysqli_connect_error());
                }
                //insert data to db

                $sql = "DELETE FROM actor WHERE actor_id = " . $actorID;

                //execute the query
                $result = mysqli_query($conn, $sql);
                if(!$result)
                {
                    die("Unable to delete row: " . mysqli_error());
                } else {
                    echo "Record deleted!";
                }



                //close to db
                mysqli_close($conn);

            }
        ?>
    </body>
</html>