<?php date_default_timezone_set("America/Halifax") ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Today's Date Page</title>
    </head>
    <body>
        <h1>Today's date is
            <?php
                echo date("Y/m/d")
            ?>
        </h1>
        <hr/>
        <h1>Today's date and time is
            <?php
                echo date("Y/m/d h:i:s A")
            ?>
        </h1>
        <hr/>
        <h1>This page's timezone is currently set to
            <?php
            echo date_default_timezone_get()
            ?>
        </h1>
    </body>
</html>