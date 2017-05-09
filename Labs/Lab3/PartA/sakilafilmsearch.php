<?php
//require('../dbconn.php');
//?>

<?php
    //connect to db
    $conn = mysqli_connect("127.0.0.1", "root", "inet2005", "sakila");
    if (!$conn) {
        die("Could not connect to db: " . mysqli_connect_error());
    }
    //define the query
    $searchText = $_POST["searchText"];
    if(!empty($searchText)) {
        $sql = "SELECT * FROM film WHERE description LIKE '%$searchText%'";
        $result = mysqli_query($conn, $sql);
        if(!$result) {
            die("Could not retrieve records from databases:" . mysqli_error($conn));
        }
    }
?>

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
        <table>
            <thead>
            <tr>
                <th>Film</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php

            //loop through the data
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>" ;
                echo "<td>" . $row['description'] . "</td>";
                echo "</tr>";
            }

            //db close
            mysqli_close($conn);
            ?>
            </tbody>
        </table>
        <form id="searchForm" name="searchForm" action="sakilafilmsearch.php" method="post">
            <p><label>Search: <input type="text" id="searchText" name="searchText" value=""/></label></p>
            <p><input type="submit" id="submitButton" name="submitButton" value="Submit Query" /></p>
        </form>
    </body>
</html>