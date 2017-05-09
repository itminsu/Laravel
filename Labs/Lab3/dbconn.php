<?php
    function getSakilaDbConnection() {
        //connect to db
        $conn = mysqli_connect("127.0.0.1", "root", "inet2005", "sakila");//host , user, password, dbname
        if(!$conn)
        {
            die("Unable to establish db connection: " . mysqli_connect_error());
        }
        return $conn;
    }
?>