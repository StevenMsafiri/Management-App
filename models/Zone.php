<?php

class Zone{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll(){

        $this->db->query("SELECT * FROM Zones");

        return $this->db->resultSet();
    }
}