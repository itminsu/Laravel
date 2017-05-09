<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
    $params = '';
    if(!empty($_POST["searchField"]))
    {
        $params = $_POST["searchField"];
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Display Actors</title>
        <style type="text/css">
            table
            {
                border: 1px solid purple;
            }
            th, td
            {
                border: 1px solid red;
            }
        </style>
    </head>
    <body>
        <h1>Current Actors</h1>
        <form id="searchForm" name="searchForm" action="displayActors.php" method="post">
            <input type="text" id="searchField" name="searchField" value="<?php echo $params ?>">
            <button type="submit" id="btnSearch">Search</button>
        </form>
        <table>
            <thead>
            <tr>
                <td>Actor ID</td>
                <td>First Name</td>
                <td>Last Name</td>
            </tr>
            </thead>
            <tbody>
            <?php
                require("../Business/Actor.php");
                $arrayOfActors = Actor::retrieveSome(0,25, $params);
                if(!empty($arrayOfActors))
                    {
                            foreach($arrayOfActors as $actor):

                                    ?>
                                    <tr>
                                        <td><?php echo $actor->getID(); ?></td>
                                        <td><?php echo $actor->getFirstName(); ?></td>
                                        <td><?php echo $actor->getLastName(); ?></td>
                                        <td>
                                            <a href="editActorForm.php?actorId=<?php echo $actor->getID() ?>">EDIT</a>
                                            <a href="deleteActor.php?actorId=<?php echo $actor->getID() ?>">DEL</a>
                                        </td>
                                    </tr>
                                <?php
                            endforeach;
                    }
                                        ?>
            </tbody>
        </table>
        <a href="newActorForm.html">Add Actor</a>
    </body>
</html>
