<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'data/iActorDataModel.php';
class MySQLiActorDataModel implements iActorDataModel
{

    private $dbConnection;
    private $result;

    // iCustomerDataAccess methods
    public function connectToDB()
    {
         $this->dbConnection = @new mysqli("localhost","root", "inet2005","sakila");
         if (!$this->dbConnection)
         {
               die('Could not connect to the Sakila Database: ' .
                        $this->dbConnection->connect_errno);
         }
    }

    public function closeDB()
    {  
        $this->dbConnection->close();
    }

    public function selectActors()
    {

        $selectStatement = "SELECT * FROM actor";
        $selectStatement .= " ORDER BY actor_id DESC";
        $selectStatement .= " LIMIT 0,25;";

       $this->result = @$this->dbConnection->query($selectStatement);
       if(!$this->result)
       {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
       }

    }
    
    public function selectActorById($actID)
    {
        $selectStatement = "SELECT * FROM actor";
        $selectStatement .= " WHERE actor.actor_id = $actID;";

       $this->result = @$this->dbConnection->query($selectStatement);
       if(!$this->result)
       {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
       }
    }

    public function selectActorsWithSearch($searchParam)
    {
        $selectStatement = "SELECT * FROM actor";
        $selectStatement = " WHERE last_name like '$searchParam%' OR first_name like '$searchParam%'";
        $selectStatement .= " ORDER BY actor_id DESC";
        $selectStatement .= " LIMIT 0,25;";

        $this->result = @$this->dbConnection->query($selectStatement);
        if(!$this->result)
        {
            die('Could not retrieve records from the Sakila Database: ' .
                $this->dbConnection->error);
        }

    }

    public function fetchActors()
    {
       if(!$this->result)
       {
               die('No records in the result set: ' .
                       $this->dbConnection->error);
       }
       return $this->result->fetch_array();
    }

    public function updateActor($custID,$first_name,$last_name)
    {
       $updateStatement = "UPDATE customer";
       $updateStatement .= " SET first_name = '$first_name',last_name='$last_name'";
       $updateStatement .= " WHERE customer_id = $custID;";
       $this->result = @$this->dbConnection->query($updateStatement);
       if(!$this->result)
       {
               die('Could not update records in the Sakila Database: ' .
                       $this->dbConnection->error);
       }
       
       return $this->dbConnection->affected_rows;
    }

    public function insertActor($first_name,$last_name)
    {
        $insertStatement = "INSERT INTO actor( first_name, last_name) ";
        $insertStatement .= " VALUES('$first_name','$last_name');";
        $this->result = @$this->dbConnection->query($insertStatement);
        if(!$this->result)
        {
            die('Could not update records in the Sakila Database: ' .
                $this->dbConnection->error);
        }

        return $this->dbConnection->affected_rows;
    }

    public function deleteActor($actorId)
    {
        $deleteStatement = "DELETE FROM actor";
        $deleteStatement .= " WHERE actor_id = $actorId;";
        $this->result = @$this->dbConnection->query($deleteStatement);
        if(!$this->result)
        {
            die('Could not update records in the Sakila Database: ' .
                $this->dbConnection->error);
        }

        return $this->dbConnection->affected_rows;
    }
    
    public function fetchActorID($row)
    {
       return $row['customer_id'];
    }

    public function fetchActorFirstName($row)
    {
       return $row['first_name'];
    }

    public function fetchActorLastName($row)
    {
       return $row['last_name'];
    }

    public function fetchLastUpdate($row)
    {
        return $row['last_update'];
    }
}

?>
