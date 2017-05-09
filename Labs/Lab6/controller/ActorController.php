<?php

require_once('../model/ActorModel.php');

class ActorController
{
    public $model;
    
    public function __construct()
    {
        $this->model = new ActorModel();
    }
    
    public function displayAction()
    {
        $arrayOfActors = $this->model->getAllActors();

        include '../view/displayActors.php';
    }

    public function displayActionWithSearch($searchParam)
    {
        $arrayOfActors = $this->model->getAllActorsWithSearch($searchParam);

        include '../view/displayActors.php';
    }

    public function insertAction()
    {
        include '../view/addActor.php';
    }

    public function updateAction($actID)
    {
        $currentActor = $this->model->getActor($actID);

        include '../view/editActor.php';
    }

    public function commitInsertAction($fName,$lName)
    {
        $lastOperationResults = "";

        $currentActor = new Actor();

        $currentActor->setFirstName($fName);
        $currentActor->setLastName($lName);

        $lastOperationResults = $this->model->insertActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../view/displayActors.php';
    }

    public function commitUpdateAction($actID,$fName,$lName)
    {
        $lastOperationResults = "";

        $currentActor = $this->model->getActor($actID);

        $currentActor->setFirstName($fName);
        $currentActor->setLastName($lName);

        $lastOperationResults = $this->model->updateActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../view/displayActors.php';
    }

    public function commitDeleteAction($actID)
    {
        $lastOperationResults = "";

        $currentActor = new Actor();
        $currentActor->setID($actID);

        $lastOperationResults = $this->model->deleteActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../view/displayActors.php';
    }

}

?>
