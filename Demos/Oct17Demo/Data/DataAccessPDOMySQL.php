<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'aDataAccess.php';
class DataAccessPDOMySQL extends aDataAccess
{

    private $dbConnection;
    private $result;
    private $stmt;

    // aDataAccess methods
    public function connectToDB()
    {
        try
        {
            $this->dbConnection = new PDO("mysql:host=localhost;dbname=sakila","root","inet2005");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            die('Could not connect to the Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }

    public function selectCustomers($start,$count)
    {
       try
       {
           // ONE WAY OF DOING A PREPARED STATEMENT
           /*$this->stmt = $this->dbConnection->prepare('SELECT * FROM customer LIMIT ?,?');
           $this->stmt->bindParam(1, $start, PDO::PARAM_INT);
           $this->stmt->bindParam(2, $count, PDO::PARAM_INT);*/

           $this->stmt = $this->dbConnection->prepare('SELECT * FROM customer LIMIT :start, :count');
           $this->stmt->bindParam(':start', $start, PDO::PARAM_INT);
           $this->stmt->bindParam(':count', $count, PDO::PARAM_INT);

           $this->stmt->execute();
       }
       catch(PDOException $ex)
       {
           die('Could not select records from Sakila Database via PDO: ' . $ex->getMessage());
       }
    }
    

    public function fetchCustomers()
    {
       try
       {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
       }
       catch(PDOException $ex)
       {
           die('Could not retrieve from Sakila Database via PDO: ' . $ex->getMessage());
       }
    }
    
    public function fetchCustomerID($row)
    {
        return $row['customer_id'];
    }

    public function fetchCustomerFirstName($row)
    {
        return $row['first_name'];
    }

    public function fetchCustomerLastName($row)
    {
        return $row['last_name'];
    }
    
    public function insertCustomer($firstName,$lastName)
    {
        try
        {
            $this->stmt = $this->dbConnection->prepare('INSERT INTO customer(store_id,first_name,last_name,address_id) VALUES(1, :firstName, :lastName, 1)');
            $this->stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('Could not insert record into Sakila Database via PDO: ' . $ex->getMessage());
        }

    }
}

?>
