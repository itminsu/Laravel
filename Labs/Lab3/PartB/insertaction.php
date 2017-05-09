<?php
//require('../dbconn.php');
//?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Insert & Display Actor List</title>
        <style>
            table { table-border: collapse; }
            th, td { border: 2px solid black; }
        </style>
    </head>
    <body>
        <a href="listactor.php">Go to List</a>
        <?php
            //connect to db
            $conn = mysqli_connect("127.0.0.1", "root", "inet2005", "sakila");
            if (!$conn) {
                die("Could not connect to db: " . mysqli_connect_error());
            }

            if(!empty($_POST["firstName"]) && !empty($_POST["lastName"])) {

                $sql = "INSERT INTO actor (first_name, last_name) VALUES('";
                $sql.= $_POST["firstName"];
                $sql.= "','";
                $sql.= $_POST["lastName"];
                $sql.= "');";

                $result = mysqli_query($conn, $sql);
                if(!$result) {
                    die("Unable to insert record: ". mysqli_error($conn));
                }else {

                    $select_sql = "SELECT * FROM actor ORDER BY actor_id DESC;";
                    $result = mysqli_query($conn, $select_sql);

                    if(!$result){
                        die("Unable to get record list. ". mysqli_error($conn));
                    }else{
                        ?>

                        <table>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["actor_id"] ?></td>
                                        <td><?php echo $row["first_name"] ?></td>
                                        <td><?php echo $row["last_name"] ?></td>
                                        <td><?php echo $row["last_update"] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                            <?php

                    }
                }

                            mysqli_close($conn);
            }
                            ?>
    </body>
</html>