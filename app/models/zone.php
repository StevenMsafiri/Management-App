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

    function getZone($zone_code){
        $sql = "SELECT * FROM Zones WHERE zone_code = :zone_code";

        return $this->connection->read($sql,array('zone_code'=>$zone_code));
    }

    function addZone($POST)
    {
        $sql = "INSERT INTO Zones(zone_code, zone_name, head_of_zone) VALUES(:zone_code, :zone_name, :head_of_zone)";

        $arr = [
            ':zone_code' => $POST['Code'],
        ':zone_name' => $POST['Name'],
        ':head_of_zone' => $POST['Supervisor_id']
        ];

        return $this->connection->write($sql, $arr);
    }

    function deleteZone($zone_code)
    {
        $sql = "DELETE FROM Zones WHERE zone_code = :zone_code";
        return $this->connection->write($sql,array('zone_code'=>$zone_code));
    }
    function editZone($POST)
    {
        $sql = "UPDATE Zones SET(zone_code = :zone_code, zone_name = :zone_name, head_of_zone =:head_of_zone) WHERE zone_code = :zone_code";

        $arr = [
            ':zone_code' => $POST['Code'],
            ':zone_name' => $POST['Name'],
            ':head_of_zone' => $POST['Supervisor_id']
        ];

        return $this->connection->write($sql, $arr);
    }
}
