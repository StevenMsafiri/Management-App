<?php

Class department
{
    public $connection;
    function __construct(){
        $this->connection = new Database();
        $this->connection->db_connect();
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
        $sql = "INSERT INTO Departments (department_name, description, zone, head_of_dept ) VALUES (?, ?,?, ?)";

        $this->connection->write($sql, $POST);
    }

    function editDepartment($POST)
    {
        $sql = "UPDATE Departments SET department_name = ?, description = ?, zone = ?, head_of_dept WHERE department_id = ?";
        $this->connection->write($sql, $POST);

    }
    function deleteDepartment($department_id)
    {
        $sql = "DELETE FROM Departments WHERE department_id = ?";
        $this->connection->write($sql, $department_id);
    }

    function  getDepartmentByZone($zone)
    {
        $sql = "SELECT * FROM Departments WHERE zone = ?";
        $result = $this->connection->read($sql, array($zone));
        return $result;
    }

}