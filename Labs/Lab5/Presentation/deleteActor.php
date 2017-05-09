<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Processing delete page</title>
    </head>
    <body>
        <?php
         
            $result = "";
            
            if(!empty($_GET['actorId']))
            {
                require("../Business/Actor.php");

//                $newActor = new Actor($_GET['actorId']);
//
//                $result = $newActor->delete();

                $result = Actor::delete($_GET['actorId']);
            }
            else 
            {
                $result = "Nothing to do!";
            }
        ?>
        <p><?php echo $result; ?> <a href="displayActors.php">Back to Display page</a></p>
    </body>
</html>
