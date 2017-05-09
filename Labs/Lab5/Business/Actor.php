<?php

require_once '../Business/iBusinessObject.php';
require_once '../Data/aDataAccess.php';

class Actor implements iBusinessObject
{
    private $m_actorId;
    private $m_firstName;
    private $m_lastName;

//    function __construct()
//    {
//        $args_list = func_get_args();
//        $numargs = func_num_args();
//        if (method_exists($this,$func='__construct'.$numargs)) {
//            call_user_func_array(array($this,$func),$args_list);
//        }
//    }

//    function __construct1($arg1)
//    {
//        $this->m_actorId = $arg1;
//    }

//    function __construct2($arg1,$arg2)
//    {
//        $this->m_firstName = $arg1;
//        $this->m_lastName = $arg2;
//    }
//
//    function __construct3($arg1,$arg2,$arg3)
//    {
//        $this->m_firstName = $arg1;
//        $this->m_lastName = $arg2;
//        $this->m_actorId = $arg3;
//    }

    function __construct($arg1, $arg2, $arg3 = null)
    {

        $this->m_firstName = $arg1;
        $this->m_lastName = $arg2;
        $this->m_actorId = $arg3;
    }

//    $x = new Actor("Minsu", "Lee", 25);

    public function setActorId($actorId)
    {

    }
    public function getID()
    {
        return ($this->m_actorId);
    }
    
    public function getFirstName()
    {
        return ($this->m_firstName);
    }

    public function getLastName()
    {
        return ($this->m_lastName);
    }

    public static function retrieveSome($start,$count,$params)
    {
        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->selectActors($start,$count, $params);

        while($row = $myDataAccess->fetchActors())
        {
            $currentActor = new self($myDataAccess->fetchActorFirstName($row),
                $myDataAccess->fetchActorLastName($row));
            $currentActor->m_actorId = $myDataAccess->fetchActorID($row);
            $arrayOfActorObjects[] = $currentActor;
        }

        $myDataAccess->closeDB();
        if(isset($arrayOfActorObjects))
            return $arrayOfActorObjects;
        else
            return null;
    }

    public static function retrieveOne($actorId)
    {
        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->selectActor($actorId);

        $row = $myDataAccess->fetchActors();

        $currentActor = new self($myDataAccess->fetchActorID($row), $myDataAccess->fetchActorFirstName($row),
                $myDataAccess->fetchActorLastName($row));

        $myDataAccess->closeDB();

        return $currentActor;
    }
    
    public function save()
    {
        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        if(empty($this->m_actorId))
        {
            $recordsAffected = $myDataAccess->insertActor($this->m_firstName,$this->m_lastName);
        }else
        {
            $recordsAffected = $myDataAccess->updateActor($this->m_actorId,$this->m_firstName,$this->m_lastName);
        }

        $myDataAccess->closeDB();

        return "$recordsAffected row(s) affected!";
        
    }

    public static function delete($id)
    {

        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $recordsAffected = $myDataAccess->deleteActor($id);

        $myDataAccess->closeDB();

        return "$recordsAffected row(s) deleted!";

    }
}

?>
