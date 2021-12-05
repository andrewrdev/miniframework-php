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

            $this->conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        } catch (PDOException $e) {
            echo 'Falha na conexão com o banco de dados';
        }
    }

    /*
    |------------------------------------------------------------------------------------------------------------------
    | Close
    |------------------------------------------------------------------------------------------------------------------
    */

    public function close()
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

        $this->close();

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

        $this->close();
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

        $this->close();
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

        $this->close();
    }
}
