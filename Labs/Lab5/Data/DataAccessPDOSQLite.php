<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'aDataAccess.php';
class DataAccessPDOSQLite extends aDataAccess
{
    private $dbConnection;
    private $result;
    private $stmt;

    // aDataAccess methods
    public function connectToDB()
    {
        try
        {
            $this->dbConnection = new PDO("sqlite:/home/inet2005/PhpstormProjects/Lee-Minsu-w0293156/Labs/Lab5/Data/db/mydb.sqlite");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            die('Could not connect to the SQLite Database via PDO: ' . $ex->getMessage());
        }
    }

    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }

    public function selectActors($start,$count,$params)
    {
        try
        {
            if(!empty($params))
            {
                $this->stmt = $this->dbConnection->prepare('SELECT * FROM actor WHERE first_name like :params OR last_name like :$params ORDER BY actor_id DESC LIMIT :start, :count');
                $params = "%".$params."%";
                $this->stmt->bindParam(':params', $params, PDO::PARAM_STR);
            }else {
                $this->stmt = $this->dbConnection->prepare('SELECT * FROM actor ORDER BY actor_id DESC LIMIT :start, :count');
            }

            $this->stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $this->stmt->bindParam(':count', $count, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from SQLite Database via PDO: ' . $ex->getMessage());
        }

    }

    public function selectActor($actorId)
    {
        try
        {
            $this->stmt = $this->dbConnection->prepare('SELECT * FROM actor WHERE actor_id = :actorId');
            $this->stmt->bindParam(':actorId', $actorId, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from Sakila Database via PDO: ' . $ex->getMessage());
        }

    }


    public function fetchActors()
    {
        try
        {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('Could not retrieve from SQLite Database via PDO: ' . $ex->getMessage());
        }

    }

    public function fetchActorID($row)
    {
        return $row['actor_id'];
    }

    public function fetchActorFirstName($row)
    {
        return $row['first_name'];
    }

    public function fetchActorLastName($row)
    {
        return $row['last_name'];
    }

    public function insertActor($firstName,$lastName)
    {
        try
        {
            $this->stmt = $this->dbConnection->prepare('INSERT INTO actor(first_name,last_name) VALUES(:firstName, :lastName)');
            $this->stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('Could not insert record into SQLite Database via PDO: ' . $ex->getMessage());
        }
    }

    public function updateActor($actorId,$firstName,$lastName)
    {
        try
        {
            $this->stmt = $this->dbConnection->prepare('UPDATE actor SET first_name= :firstName , last_name= :lastName WHERE actor_id= :actorId');
            $this->stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $this->stmt->bindParam(':actorId', $actorId, PDO::PARAM_INT);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('Could not update record into SQLite Database via PDO: ' . $ex->getMessage());
        }
    }

    public function deleteActor($actorId)
    {
        try
        {
            $this->stmt = $this->dbConnection->prepare('DELETE FROM actor WHERE actor_id= :actorId');
            $this->stmt->bindParam(':actorId', $actorId, PDO::PARAM_INT);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('Could not delete record into SQLite Database via PDO: ' . $ex->getMessage());
        }
    }
}

?>
