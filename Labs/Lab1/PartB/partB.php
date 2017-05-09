<?php date_default_timezone_set("Canada/Atlantic") ?>

<!DOCTYPE html>
<html>
    <head>
        <title>PartB</title>
    </head>
    <body>
        <!-- Step.1 - 2 (Mixing PHP and HTML) -->
        <?php
            echo "<h1>Greetings from Lab1</h1>";
        ?>
        <!-- Step.1 - 5 -->
        <p>
            I'm Minsu who second year student in NSCC. </br>
            I hope to be good programmer. </br>
            Practice makes perfect.
        </p>
        <!-- Step.1 - 6 -->
        <?php
            echo "<h3>";
            echo "It is a " . date("Y/m/d g:h:i A");
            echo "</h3>";
        ?>
        <!-- Step.2 (String Variable) -->
        <?php
            $myName = "Minsu";
            echo $myName;
        ?>
        </br>
        </br>
        <!-- Step.3 (Concatenation Operator) -->
        <?php
            $smallerString =  "My name is " . $myName . ".";
            echo $smallerString;
        ?>
        </br>
        </br>
        <!-- Step.4 (Arithmetic Operators) -->
        <?php
            // Step.4 - a
            $val1 = 32;
            $val2 = 14;
            $val3 = 83;
            $result = ($val1 * $val2) + $val3;
            echo "A. (32 * 14) + 83 = " . $result;
            echo "</br>";
            // Step.4 - b
            $val1 = 1024;
            $val2 = 128;
            $val3 = 7;
            $result = ($val1/$val2) - $val3;
            echo "B. (1024 / 128) - 7 = " . $result;
            echo "</br>";
            // Step.4 - c
            $val1 = 769;
            $val2 = 6;
            $result = $val1 % $val2;
            echo "C. The remainder of 769 divided by 6 is " . $result;
        ?>
        </br>
        </br>
        <!-- Step.5 (Use a loop) -->
        <?php
            for($i = 10; $i > 0; $i--)
            {
                echo $i . "...";
            }
            echo "Blast Off";
        ?>
        </br>
        </br>
        <!-- Step.6 (Use a Array) -->
        <?php
            $colors = array("Oragne",
                            "Green",
                            "Purple",
                            "Orange",
                            "Red",
                            "Lilac",
                            "Scalet"
                            );
            for($i = 0; $i < 7; $i++) // for loop
            {
                echo $colors[$i] . "</br>";
            }

            echo "</br>";

        foreach($colors as $color)// foreach loop
            {
                echo $color . "</br>";
            }

            echo "</br>";

        foreach($colors as $colorIndex => $colorName) // other way foreach
            {
                echo  "Index$colorIndex has a $colorName.</br>";
            }

        ?>
    </body>
</html>

<?php
