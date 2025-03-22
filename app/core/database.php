<?php

Class Database
{
    public  function db_connect(){
        try
        {
            $string = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $db = new PDO($string, DB_USER, DB_PASSWORD);
            return $db;
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function read($query, $data = [])
    {
        $DB = $this->db_connect();
        $stmt = $DB->prepare($query);

        if (count($data) > 0) {
            $check = $stmt->execute($data);
        } else {
            $stmt = $DB->query($query);
            $check = ($stmt) ? 1 : 0;
        }

        if ($check) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function write($query, $data = [])
    {
        $DB = $this->db_connect();
        $stmt = $DB->prepare($query);

        if (count($data) > 0) {
            $check = $stmt->execute($data);
        } else {
            $stmt = $DB->query($query);
            $check = ($stmt) ? 1 : 0;
        }

        return $check ? true : false;
    }

}
