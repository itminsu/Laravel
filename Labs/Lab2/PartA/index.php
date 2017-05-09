<!DOCTYPE html>
<html>
    <head>
        <title>PHP Lab2 PartA</title>
    </head>
    <body>
        <!-- Step.1 (Create a funtion make output the text) -->
        <?php

            $textString = "Hello world!";

            function htagFuntion ($textString, $sizeNumber)
            {
                if ($sizeNumber > 0 && $sizeNumber <= 6) {
                    echo "<h$sizeNumber>";
                    echo $textString;
                    echo "</h$sizeNumber>";
                } else {
                    echo "Error! Please enter number 1 to 6";
                }
            }
            for ($i = 1; $i <= 7; $i++)
            {
                htagFuntion($textString, $i);
            }
        ?>
        </br>
        <hr/>
        <!-- Step.2 (Byval Byref)-->
        <?php
            function byval ($text)
            {
                $text = $text . "...blah";
                echo $text;
            }

            function byref (&$text)
            {
                $text = $text . "...blah";
                echo $text;
            }

            echo "B. $textString <br/>";
            echo "C. ";
            echo byval($textString) . "<br/>";
            echo "D. $textString <br/>";
            echo "E. ";
            echo byref($textString) . "<br/>";
            echo "F. $textString <br/><br/>";

        ?>
        <!-- Step.3 (Use global variable in a function -->
        <?php
            $personAge = 25;

            function gvFunction()
            {
                global $personAge;
                echo "I'm $personAge years old.";
            }

            gvFunction();
        ?>
    </body>
</html>



