<!DOCTYPE html>
<html>
    <head>
        <title>Add title here...</title>
        <style>
            td, th {
                border: 2px solid blue;
                padding: 5px;
                    }
            table {
                border-collapse: collapse;
                    }
            th {
                background-color: black;
                color: white;
                }

        </style>
    </head>
    <body>
        <table>
            <h1>Add heading here...</h1>

            <tr>
                <th>Pounds</th>
                <th>Kilos</th>
            </tr>

            <?php
            //generate dynamic table
            //use a loop to generate rest of the rows
            for($pounds = 10; $pounds <= 100; $pounds+=10) {

                $kilos = round($pounds / 2.2, 2);

            ?>

            <tr>
                <th><?php echo $pounds ?></th>
                <th><?php echo $kilos ?></th>
            </tr>

            <?php
                // end for loop
                }
            ?>
        </table>
    </body>
</html>