<?php

Class Department
{
    public $connection;
    function __construct(){
        $this->connection = new Database();
    }

    function getAllDepartments()
    {
        $sql = "SELECT * FROM Departments";

        $result = $this->connection->read($sql);
        return $result;
    }

    function getDepartment($department_id)
    {
        $sql = "SELECT * FROM Departments WHERE department_id = ?";

        $result = $this->connection->read($sql, array($department_id));
        return $result;
    }

    function addDepartment($POST)
    {
        $sql = "INSERT INTO Departments (department_name, ) VALUES (?)";
    }
}