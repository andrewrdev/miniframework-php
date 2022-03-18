<?php

namespace src\classes;

use PDO;
use PDOException;

class Database
{
    private $connection;

    // -----------------------------------------------------------------------------------------------------------------
    
    // -----------------------------------------------------------------------------------------------------------------
    private function connect()
    {
        try 
        {
            $this->connection = new PDO
            (
                'mysql:host=' . DB_HOST . ';' .
                'dbname=' . DB_NAME . ';' .
                'charset=' . DB_CHARSET,
                DB_USER,
                DB_PASSWORD
            );

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_PERSISTENT, true);

        } catch (PDOException $e) {
            if (DEBUG_MODE) 
            {
                echo 'Database Connection Error: ' . $e->getMessage();
            }
        }
    }
    // -----------------------------------------------------------------------------------------------------------------

    // -----------------------------------------------------------------------------------------------------------------
    public function select($query, $params = null)
    {
        try 
        {
            $this->connect();

            $conn = $this->connection;
            $results = null;

            $stmt = $conn->prepare($query);

            if (!isset($params) && empty($params))
            {
                $stmt->execute();
            } else
            {
                $stmt->execute($params);
            }

            if ($stmt->rowCount() > 0)
            {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            $this->connection = null;

            return $results;

        } catch (PDOException $e) 
        {
            if (DEBUG_MODE)
            {
                echo 'ERROR ON SELECT DATA: ' . $e->getMessage();
            }
        }
    }
    // -----------------------------------------------------------------------------------------------------------------

    // -----------------------------------------------------------------------------------------------------------------
    public function execute($query, $params = null)
    {
        try 
        {
            $this->connect();

            $conn = $this->connection;

            $stmt = $conn->prepare($query);

            if (!isset($params) && empty($params))
            {
                $stmt->execute();
            } else
            {
                $stmt->execute($params);
            }

            $this->connection = null;

        } catch (PDOException $e) 
        {
            if (DEBUG_MODE)
            {
                echo 'ERROR ON EXECUTE QUERY: ' . $e->getMessage();
            }
        }
    }
    // -----------------------------------------------------------------------------------------------------------------

    // -----------------------------------------------------------------------------------------------------------------
}
