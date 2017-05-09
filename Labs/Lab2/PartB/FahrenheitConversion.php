<!DOCTYPE html>
<html>
    <head>
        <title>Fahrenheit Conversion</title>
        <style>
            td, th {
                border: 2px solid black;
            }
        </style>
    </head>
    <body>
        <?php
            //Step.1 - 1
            for($fahren = 0; $fahren <= 100; $fahren++)
            {
                $celsius = ($fahren - 32) * 5 / 9;
                echo "$fahren degree(s) fahrenheit equals ";
                echo round($celsius);
                echo " degrees Celsius. <br/>";
            }
        ?>
        <hr/>
        <!-- Step.1 - 2-->
        <table>
            <tr>
                <th>Farenheit</th>
                <th>Celsius</th>
            </tr>
            <?php
            for($fahren = 0; $fahren <= 100; $fahren++)
            {
                $celsius = ($fahren - 32) * 5 / 9;
                ?>

                <tr>
                    <td><?php echo $fahren ?></td>
                    <td><?php echo round($celsius) ?></td>
                </tr>
            <?php
                // end for loop
            }
            ?>
         </table>
    </body>
</html>