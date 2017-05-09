<?php
require('../dbconn.php');
//?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Delete Actor</title>
    </head>
    <body>
    <?php
        //connect to db
        //$conn = mysqli_connect("127.0.0.1", "root", "inet2005", "sakila");
        //if (!$conn) {
        //    die("Could not connect to db: " . mysqli_connect_error());
        //}

        $conn = getSakilaDbConnection();
        if(!empty($_POST["delete_id"])) {

            $deleteSql = "DELETE FROM actor ";
            $deleteSql .= "WHERE actor_id=";
            $deleteSql .= $_POST["delete_id"];
            $deleteSql .= ";";

            $result = mysqli_query($conn, $deleteSql);
            if (!$result) {
                die("Unable to delete record: " . mysqli_error($conn));
            } else {
                echo "<h3>Successfully deleted " . mysqli_affected_rows($conn) . " record(s)</h3>";

                ?>
                <a href="listactor.php">Back to Actor List</a>
                <?php
            }
        }
        mysqli_close($conn);
        ?>

    </body>
</html>