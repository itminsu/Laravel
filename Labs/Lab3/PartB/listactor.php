<?php
//require('../dbconn.php');
//?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Display Actor List</title>
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

            $select_sql = "SELECT * FROM actor";
            $select_sql .= " ORDER BY actor_id desc";
            $select_sql .= " limit 0, 10";
            $result = mysqli_query($conn, $select_sql);

            if(!$result){
                die("Unable to get record list: ". mysqli_error($conn));
            }else{
                ?>
                <a href="insertform.html">Go to Insert Form</a>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
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
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
                <form id="deleteForm" name="deleteForm" action="deleteaction.php" method="post">
                    <p>ID to Delete: <input type="text" id="delete_id" name="delete_id" required="required"/></p>
                    <p><input type="submit" id="delete" name="delete" value="Delete"/></p>
                </form>

                <form id="updateForm" name="updateForm" action="updateform.php" method="post">
                    <p>ID to Update: <input type="text" id="update_id" name="update_id" required="required"/></p>
                    <p><input type="submit" id="update" name="update" value="Update"/></p>
                </form>

                <?php

            }

            mysqli_close($conn);

        ?>
    </body>
</html>