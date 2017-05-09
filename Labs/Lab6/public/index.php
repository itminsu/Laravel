<?php

require_once '../controller/ActorController.php';

$actorController = new ActorController();
if(isset($_GET['idInsert']))
{
    $actorController->insertAction();
}
elseif (isset($_GET['idUpdate']))
{
    $actorController->updateAction($_GET['idUpdate']);
}
elseif (isset($_POST['InsertBtn']))
{
    $actorController->commitInsertAction($_POST['firstName'],$_POST['lastName']);
}
elseif (isset($_POST['UpdateBtn']))
{
    $actorController->commitUpdateAction($_POST['editActId'],$_POST['firstName'],$_POST['lastName']);
}
elseif (isset($_GET['idDelete']))
{
    $actorController->commitDeleteAction($_GET['idDelete']);
}
elseif (isset($_POST['searchField']))
{
    $actorController->displayActionWithSearch($_POST['searchField']);
}
else
{
    $actorController->displayAction();
}

?>
