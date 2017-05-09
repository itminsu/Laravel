<?php

require_once('../model/CustomerModel.php');

class CustomerController 
{
    public $model;
    
    public function __construct()
    {
        $this->model = new CustomerModel();
    }
    
    public function displayAction()
    {
        $arrayOfCustomers = $this->model->getAllCustomers();

        include '../view/displayCustomers.php';
    }

    public function updateAction($custID)
    {
        $currentCustomer = $this->model->getCustomer($custID);

        include '../view/editCustomer.php';
    }

    public function commitUpdateAction($custID,$fName,$lName)
    {
        $lastOperationResults = "";

        $currentCustomer = $this->model->getCustomer($custID);

        $currentCustomer->setFirstName($fName);
        $currentCustomer->setLastName($lName);

        $lastOperationResults = $this->model->updateCustomer($currentCustomer);

        $arrayOfCustomers = $this->model->getAllCustomers();

        include '../view/displayCustomers.php';
    }


}

?>
