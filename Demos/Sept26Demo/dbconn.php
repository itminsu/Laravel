<?php
function getSakilaDbConnection()
{
    //connect to db
    $conn = mysqli_connect("127.0.0.1", "root", "inet2005", "sakila");
    if (!$conn) {
        die("Could not connect to db: " . mysqli_connect_error());
    }
    return $conn;
}
?>