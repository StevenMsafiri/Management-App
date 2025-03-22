<?php

Class Position
{
    protected $connection;
    function __construct()
    {
        $this->connection = new Database();
        $this->connection->db_connect();
    }

    function getAllPositions()
    {
        $sql = "SELECT * FROM Positions";
        $result = $this->connection->read($sql);
        return $result;
    }
}