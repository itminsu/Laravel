<!DOCTYPE HTML>
<html>
    <head>
        <title>built-in functions</title>
    </head>
    <body>
        <h1>This page was rendered in PHP version
            <?php
            echo phpversion();
            ?>
        </h1>
        <hr/>
        <h1>This page was rendered in ZEND version
            <?php
            echo zend_version();
            ?>
        </h1>
        <hr/>
        <h1>The "default mimetype" value from the php.ini file is
            <?php
            echo ini_get("default_mimetype");
            ?>
        </h1>
    </body>
</html>