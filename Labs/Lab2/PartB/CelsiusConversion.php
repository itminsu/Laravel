<!DOCTYPE html>
<html>
    <head>
        <title>Celsius Conversion</title>
        <style>
            table tr th {border:1px solid black; background-color:gray;}
            table tr td {border:1px solid black;}
            td.grayCol {background-color:gray;}
        </style>
    </head>
    <body>
        <!-- Step.2 -->
        <a href="./FahrenheitConversion.php">FahrenheitConversion</a>
        <table>
            <tr>
                <th>Celsius</th>
                <th>Fahrenheit</th>
            </tr>
                <?php
                    for($celsius = 0; $celsius <= 100; $celsius++) {
                        $fahren = round($celsius * (9/5) + 32);

                        $css = "";
                        if($celsius % 2  == 1) { // odd number
                            $css = "class='grayCol'";
                        }else{
                            $css = "";
                        }
                ?>

                <tr>
                    <td <?php echo $css ?>>
                        <?php echo $celsius ?>
                    </td>
                    <td <?php echo $css ?>>
                        <?php echo $fahren ?>
                    </td>
                </tr>

                <?php
                    }
                ?>
        </table>
    </body>
</html>