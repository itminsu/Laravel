<?php

require_once('../model/Address.php');

class Customer
{
    private $m_customerId;
    private $m_firstName;
    private $m_lastName;
    private $m_address;
    
    
    public function __construct($in_id,$in_fname,$in_lname,$in_address)
    {
        $this->m_customerId = $in_id;
        $this->m_firstName = $in_fname;
        $this->m_lastName = $in_lname;
        $this->m_address = $in_address;
    }
    
    public function getID()
    {
        return ($this->m_customerId);
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
    
    public function getAddress()
    {
        return ($this->m_address);
    }

}

?>
