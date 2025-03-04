<?php

class Database
{



    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'staff_management';


    public $dbh;
    public $stmt;
    public $error;


    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8mb4';
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        try {

            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {

            $this->error = $e->getMessage();
            die("No connection established" . $this->error);
        }
    }

    // prepares a statement with a query
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {

        if (is_null($type)) {
            if (is_int($value)) {

                $type = PDO::PARAM_INT;
            } elseif (is_bool($value)) {

                $type = PDO::PARAM_BOOL;
            } elseif (is_null($value)) {

                $type = PDO::PARAM_NULL;
            } else {

                $type = PDO::PARAM_STR;
            }
        }

        if ($this->stmt) {

            $this->stmt->bindValue($param, $value, $type);
        } else {

            die("Error, Statement not prepared");
        }
    }

    // execute the the prepare qeury
    public function execute()
    {
        try {

            return $this->stmt->execute();
        } catch (PDOException $e) {
            echo "Failed" . $e->getMessage();
        }
    }


    // retrieves an array of objects

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchall();
    }

    //retrives a single object
    public function Single()
    {
        $this->execute();
        $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
