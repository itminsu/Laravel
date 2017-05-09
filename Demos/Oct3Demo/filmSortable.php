<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th><a href="filmSortable.php?sort=name">Title</a></th>
                <th><a href="filmSortable.php?sort=desc">Description</a></th>
                <th><a href="filmSortable.php?sort=rate">Rental Rate</a></th>
            </tr>
        <?php
            $db = mysqli_connect("localhost","root", "inet2005","sakila");
            if (!$db)
            {
                    die('Could not connect to the Sakila Database: ' . mysqli_connect_error());
            }


            $sql = "SELECT * FROM film";
            if(!empty($_GET['sort']))
            {
                switch($_GET['sort'])
                {
                    case 'name':
                        $sql .= " ORDER BY title ASC";
                         break;
                    case 'desc':
                        $sql .= " ORDER BY description ASC";
                         break;
                    case 'rate':
                        $sql .= " ORDER BY rental_rate ASC";
                         break;
                    default:
                        $sql .= " ORDER BY film_id ASC";
                         break;
                }
            }
            $sql .= " LIMIT 0,50;";

            $result = mysqli_query($db,$sql);
            if(!$result)
            {
                    die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
            }
            while ($row = mysqli_fetch_assoc($result))
            {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>". $row['description'] . "</td>";
                    echo "<td>". $row['rental_rate'] . "</td>";
                    echo "</tr>";
            }

            mysqli_close($db);
        ?>
        </table>
    </body>
</html>
