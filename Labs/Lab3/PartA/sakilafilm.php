<?php
//require('../dbconn.php');
//?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Sakila Film List</title>
        <style>
            table { table-border: collapse; }
            th, td { border: 2px solid black; }
        </style>
    </head>
    <body>
        <h1>Sakila Film List</h1>
        <table>
            <thead>
                <tr>
                    <th>Film</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //connect to db
                $conn = mysqli_connect("127.0.0.1", "root", "inet2005", "sakila");
                if (!$conn) {
                    die("Could not connect to db: " . mysqli_connect_error());
                }

                //define the query
                $result = mysqli_query($conn, "SELECT * FROM film LIMIT 0,10;");
                if(!$result) {
                    die("Could not retrieve records: " . mysqli_error($conn));
                }
                    //display the data


                    //loop through the data
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "</tr>";
                    }

                    //db close
                    mysqli_close($conn);

                ?>

            </tbody>
        </table>
    </body>
</html>