<?php

require_once '../model/Customer.php';
require_once '../model/Address.php';

//require_once '../model/data/MySQLiActorDataModel.php';
require_once '../model/data/PDOMySQLActorDataModel.php';

class CustomerModel 
{
    private $m_DataAccess;
    
    public function __construct()
    {
        //$this->m_DataAccess = new MySQLiActorDataModel();
        $this->m_DataAccess = new PDOMySQLActorrDataModel();
    }
    
    public function __destruct()
    {
        // not doing anything at the moment
    }
            
    public function getAllCustomers()
    {
        $this->m_DataAccess->connectToDB();
        
        $arrayOfActorObjects = array();
        
        $this->m_DataAccess->selectActors();
        
        while($row =  $this->m_DataAccess->fetchActors())
        {
            $currentActor = new Customer($this->m_DataAccess->fetchActorID($row),
                    $this->m_DataAccess->fetchActorFirstName($row),
                    $this->m_DataAccess->fetchActorLastName($row));
            
            $arrayOfActorObjects[] = $currentActor;
        }
        
        $this->m_DataAccess->closeDB();
        
        return $arrayOfActorObjects;
    }
    
    public function getActor($actID)
    {
        $this->m_DataAccess->connectToDB();
        
        $this->m_DataAccess->selectActorById($actID);
        
        $record =  $this->m_DataAccess->fetchActors();
        

        $fetchedActor = new Customer($this->m_DataAccess->fetchActorID($record),
            $this->m_DataAccess->fetchActorFirstName($record),
            $this->m_DataAccess->fetchActorLastName($record));

        $this->m_DataAccess->closeDB();
        
        return $fetchedActor;
    }
    
     public function updateActor($actorToUpdate)
    {
        $this->m_DataAccess->connectToDB();
        
        $recordsAffected = $this->m_DataAccess->updateActor($actorToUpdate->getID(),
                $actorToUpdate->getFirstName(),
                $actorToUpdate->getLastName());
        
        return "$recordsAffected record(s) updated succesfully!";
    }
}

?>
