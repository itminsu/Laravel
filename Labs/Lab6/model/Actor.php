<?php

class Actor
{
    private $m_actorId;
    private $m_firstName;
    private $m_lastName;
    private $m_last_update;

    function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    }

    function __construct1($in_id)
    {
        $this->m_actorId = $in_id;
    }

    function __construct2($in_fname,$in_lname)
    {
        $this->m_firstName = $in_fname;
        $this->m_lastName = $in_lname;
    }

    function __construct3($in_id,$in_fname,$in_lname)
    {
        $this->m_actorId = $in_id;
        $this->m_firstName = $in_fname;
        $this->m_lastName = $in_lname;
    }

    public function __construct4($in_id,$in_fname,$in_lname,$in_lupdate)
    {
        $this->m_actorId = $in_id;
        $this->m_firstName = $in_fname;
        $this->m_lastName = $in_lname;
        $this->m_last_update = $in_lupdate;
    }

//    public function __construct($in_id,$in_fname=null,$in_lname=null,$in_lupdate=null)
//    {
//        $this->m_actorId = $in_id;
//        $this->m_firstName = $in_fname;
//        $this->m_lastName = $in_lname;
//        $this->m_last_update = $in_lupdate;
//    }
    public function getID()
    {
        return ($this->m_actorId);
    }

    public function setID($in_actorId)
    {
        $this->m_actorId = $in_actorId;
    }

    public function getFirstName()
    {
        return ($this->m_firstName);
    }
    
    public function setFirstName($in_firstName)
    {
        $this->m_firstName = $in_firstName;
    }

    public function getLastName()
    {
        return ($this->m_lastName);
    }
    
    public function setLastName($in_lastName)
    {
        $this->m_lastName = $in_lastName;
    }

    public function getLastUpdate()
    {
        return ($this->m_last_update);
    }
}

?>
