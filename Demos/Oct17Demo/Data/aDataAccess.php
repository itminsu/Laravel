<?php

// So, which database implementation will we use??
//require_once '../Data/DataAccessMySQLi.php';
//require_once '../Data/DataAccessPDOMySQL.php';
require_once '../Data/DataAccessPDOSQLite.php';

abstract class aDataAccess
{
    private static $m_DataAccess;

    public static function getInstance()
    {
        // singleton
        if(self::$m_DataAccess == null)
        {
            //self::$m_DataAccess = new DataAccessMySQLi();
            //self::$m_DataAccess = new DataAccessPDOMySQL();
            self::$m_DataAccess = new DataAccessPDOSQLite();
        }
        return self::$m_DataAccess;
    }

    public abstract function connectToDB();

    public abstract function closeDB();

    public abstract function selectCustomers($start,$count);

    public abstract function fetchCustomers();
    
    public abstract function fetchCustomerID($row);

    public abstract function fetchCustomerFirstName($row);

    public abstract function fetchCustomerLastName($row);
    
    public abstract function insertCustomer($firstName,$lastName);
}
?>
