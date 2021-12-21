<?php

namespace src\classes;

use PDO;
use PDOException;

class Database
{

    private $conn;

    /*
    |------------------------------------------------------------------------------------------------------------------
    | Connect
    |------------------------------------------------------------------------------------------------------------------
    */

    public function connect()
    {
        try {
            $this->conn = new PDO(

                "mysql:" .
                "host=" . DB_HOST . ";" .
                "dbname=" . DB_NAME . ";" .
                "charset=" . DB_CHARSET,
                DB_USER,
                DB_PASSWORD,
                array(PDO::ATTR_PERSISTENT => true)

            );

            // Debug
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            echo 'Connection Error';
        }
    }

    /*
    |------------------------------------------------------------------------------------------------------------------
    | Close Connection
    |------------------------------------------------------------------------------------------------------------------
    */

    public function closeConnection()
    {
        $this->conn = null;
    }

    /*
    |------------------------------------------------------------------------------------------------------------------
    | SELECT
    |------------------------------------------------------------------------------------------------------------------
    */

    public function select($sql, $params = null)
    {

        $this->connect();

        $results = null;

        try {

            if (!empty($params)) {

                $stmt = $this->conn->prepare($sql);
                $stmt->execute($params);
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {

                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {

            return false;
        }

        $this->closeConnection();

        return $results;
    }

    /*
    |------------------------------------------------------------------------------------------------------------------
    | INSERT
    |------------------------------------------------------------------------------------------------------------------
    */

    public function insert($sql, $params = null)
    {

        $this->connect();

        try {

            if (!empty($params)) {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($params);
            } else {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
            }
        } catch (PDOException $e) {

            return false;
        }

        $this->closeConnection();
    }

    /*
    |------------------------------------------------------------------------------------------------------------------
    | UPDATE
    |------------------------------------------------------------------------------------------------------------------
    */

    public function update($sql, $params = null)
    {

        $this->connect();

        try {

            if (!empty($params)) {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($params);
            } else {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
            }
        } catch (PDOException $e) {

            return false;
        }

        $this->closeConnection();
    }

    /*
    |------------------------------------------------------------------------------------------------------------------
    | DELETE
    |------------------------------------------------------------------------------------------------------------------
    */

    public function delete($sql, $params = null)
    {

        $this->connect();

        try {

            if (!empty($params)) {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($params);
            } else {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
            }
        } catch (PDOException $e) {

            return false;
        }

        $this->closeConnection();
    }
}
