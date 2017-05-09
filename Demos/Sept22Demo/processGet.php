<!DOCTYPE html>
<html>
    <head>
        <title>Process Page for Get</title>
    </head>
    <body>
        <h1>
        <?php
            echo "Hello, " . $_GET['firstName'] . " " . $_GET['lastName'];
        ?>
        </h1>
    </body>
</html>