<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/data/iActorDataModel.php';
class PDOMySQLCustomerDataModel implements iCustomerDataModel
{

    private $dbConnection;
    private $result;
    private $stmt;

    // iCustomerDataAccess methods
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

    public function selectCustomers()
    {
        // hard-coding for first ten rows
        $start = 0;
        $count = 10;

        $selectStatement = "SELECT * FROM customer";
        $selectStatement .= " LEFT JOIN address ON customer.address_id = address.address_id";
        $selectStatement .= " LIMIT :start,:count;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );
            $this->stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $this->stmt->bindParam(':count', $count, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from Sakila Database via PDO: ' . $ex->getMessage());
        }

    }
    
    public function selectCustomerById($custID)
    {
        $selectStatement = "SELECT * FROM customer";
        $selectStatement .= " LEFT JOIN address ON customer.address_id = address.address_id";
        $selectStatement .= " WHERE customer.customer_id = :custID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':custID', $custID, PDO::PARAM_INT);

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
    
    public function updateCustomer($custID,$first_name,$last_name)
    {
        $updateStatement = "UPDATE customer";
        $updateStatement .= " SET first_name = :firstName,last_name=:lastName";
        $updateStatement .= " WHERE customer_id = :custID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($updateStatement);
            $this->stmt->bindParam(':firstName', $first_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $last_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':custID', $custID, PDO::PARAM_INT);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from Sakila Database via PDO: ' . $ex->getMessage());
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

    
    public function fetchAddressID($row)
    {
        return $row['address_id'];
    }

    public function fetchAddress1($row)
    {
        return $row['address'];
    }

    public function fetchAddress2($row)
    {
        return $row['address2'];
    }
}

?>
