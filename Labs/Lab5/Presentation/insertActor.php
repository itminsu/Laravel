<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Processing insert/update page</title>
    </head>
    <body>
        <?php
         
            $result = "";
            
            if(!empty($_POST['firstName']) && !empty($_POST['lastName']))
            {
                require("../Business/Actor.php");

                if(!empty($_POST['actorId']))
                {
                    $newActor = new Actor($_POST['actorId'], $_POST['firstName'],$_POST['lastName']);
                }
                else
                {
                    $newActor = new Actor($_POST['firstName'],$_POST['lastName']);
                }

                
                $result = $newActor->Save();
            }
            else 
            {
                $result = "Nothing to do!";
            }
        ?>
            <p><?php echo $result; ?> <a href="displayActors.php" >Back to Display page</a></p>
        </div>

    </body>
</html>
