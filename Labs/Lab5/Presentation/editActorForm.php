<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
$actor;
if(!empty($_GET['actorId']))
{
    require("../Business/Actor.php");
    $actorId = $_GET["actorId"];
    $actor = Actor::retrieveOne($actorId);
}
else
{
    $result = "Nothing to do!";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Actor Form</title>
    </head>
    <body>
        <h1>Edit Actor</h1>
        <form id="form1" name="form1" method="post" action="insertActor.php">
            <fieldset>
                <input type="hidden" id="actorId" name="actorId" value="<?php echo $actor->getID(); ?>" />
                <label>First Name </label><input type="text" id="firstName" name="firstName" value="<?php echo $actor->getFirstName(); ?>">
                <label>Last Name </label><input type="text" id="lastName" name="lastName" value="<?php echo $actor->getLastName(); ?>">
                <button type="submit">Submit</button>
                <a href="displayActors.php">Cancel</a>
            </fieldset>
        </form>
    </body>
</html>
