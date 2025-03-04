<?php

class Position{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll(){

        $this->db->query("SELECT * FROM Positions");

        return $this->db->resultSet();
    }
}