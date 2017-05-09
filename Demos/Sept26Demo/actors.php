<?php require('dbconn.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sakila Actor List</title>
    <style>
        table { table-border: collapse; }
        th, td { border: 2px solid black; }
    </style>
</head>
<body>
<h1>Sakila Actor List</h1>
<table>
    <thead>
    <tr>
        <th>first name</th>
        <th>last name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //connect to db
    $conn = getSakilaDbConnection();

    //define the query
    $result = mysqli_query($conn, "SELECT * FROM actor"); // LIMIT 0,10");
    if(!$result) {
        die("Could not retrieve records: " . mysqli_error($conn));
    }
    //display the data


    //loop through the data
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>" . $row['first_name'] . "</td>" ;
        echo "<td>" . $row['last_name'] . "</td>";
        echo "</tr>";
    }

    //close the connection
    mysqli_close($conn);
    ?>
    </tbody>
</table>
<?php include("footer.html") ?>
</body>
</html>