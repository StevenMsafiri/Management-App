<?php

Class Zone {

    private $connection;
    function __construct()
    {
        $this->connection = new Database();
        $this->connection->db_connect();

    }

    function  getAllZones()
    {
        $sql = "SELECT * FROM Zones";

        $result = $this->connection->read($sql);

        return $result;

    }

    function  getJSON()
    {
        $sql = "SELECT * FROM Zones";

        $result = $this->connection->read($sql);

        return json_encode($result);

    }
}
