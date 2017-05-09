<?php
//require('../dbconn.php');
//?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Update Form for Actor</title>
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

        if(!empty($_POST["update_id"])) {

            $selectSql = "SELECT actor_id, first_name, last_name FROM actor ";
            $selectSql .= "WHERE actor_id=";
            $selectSql .= $_POST["update_id"];

            $result = mysqli_query($conn, $selectSql);
            if (!$result) {
                die("Unable to select record for updating: " . mysqli_error($conn));
            } else {
                $row = mysqli_fetch_row($result);
                ?>
                <form id="updateForm" name="updateForm" action="updateaction.php" method="post">
                    <p><input type="hidden" id="actor_id" name="actor_id" value="<?php echo $row[0]?>"/></p>
                    <p>First Name: <input type="text" id="firstName" name="firstName" value="<?php echo $row[1]?>" /></p>
                    <p>Last Name: <input type="text" id="lastName" name="lastName" value="<?php echo $row[2]?>"/></p>
                    <p>
                        <input type="submit" id="update" name="update" value="Update"/>
                        <input type="button" id="ButtonBack" name="ButtonBack" value="Back" onclick="javascript:location.href='listactor.php'"/>
                    </p>
                </form>
                <?php
            }
        }

        mysqli_close($conn); // close database connection
    ?>

</body>
</html>