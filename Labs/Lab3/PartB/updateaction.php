<?php
//require('../dbconn.php');
//?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Update Actor</title>
        <style>
            table { table-border: collapse; }
            th, td { border: 2px solid black; }
        </style>
    </head>
    <body>
    <?php
        //connect to db
        $conn = mysqli_connect("127.0.0.1", "root", "inet2005", "sakila");
        if (!$conn) {
            die("Could not connect to db: " . mysqli_connect_error());
        }

        if(!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["actor_id"])) {

            $updateSql = "UPDATE actor SET ";
            $updateSql .= " first_name=";
            $updateSql .= "'" . $_POST["firstName"] . "'";
            $updateSql .= ", last_name=";
            $updateSql .= "'" . $_POST["lastName"] . "'";
            $updateSql .= " WHERE actor_id=";
            $updateSql .= $_POST["actor_id"] . ";";

            $result = mysqli_query($conn, $updateSql);

            if(!$result) {
                die("Unable to update record: ". mysqli_error($conn));
            }else {
                echo "<h3>Successfully updated " . mysqli_affected_rows($conn) . " record(s)</h3>";
                ?>

                <a href="listactor.php">Back to Actor List</a>
                <?php
            }
            mysqli_close($conn);
        }
        ?>
    </body>
</html>