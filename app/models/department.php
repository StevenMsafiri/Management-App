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

        return $this->connection->read($sql);
    }

    function getDepartment($department_id)
    {
        $sql = "SELECT * FROM Departments WHERE dept_id = :id";

         return $this->connection->read($sql, array(':id' => $department_id) );
    }

    function addDepartment($POST)
    {
        $sql = "INSERT INTO Departments (department_name, description, zone, head_of_dept ) VALUES (:name, :description, :zone, :head_of_dept)";

        $arr = [
            ':name' => $POST['name'],
            ':description' => $POST['description'],
            ':zone' => $POST['zone'],
            ':head_of_dept' => $POST['head_of_dept']
        ];

        $this->connection->write($sql, $arr);
    }

    function editDepartment($POST)
    {
        $sql = "UPDATE Departments SET department_name = :name, description = :description, zone = :zone, head_of_dept = :head_of_dept WHERE department_id = :id";

        $arr = [
            ':name' => $POST['name'],
            ':description' => $POST['description'],
            ':zone' => $POST['zone'],
            ':head_of_dept' => $POST['head_of_dept'],
            ':id' => $POST['id']
        ];
        return $this->connection->write($sql, $arr);

    }
    function deleteDepartment($department_id)
    {
        $sql = "DELETE FROM Departments WHERE department_id = :id";
        return $this->connection->write($sql, array(':id' => $department_id));
    }

    function  getDepartmentByZone($zone)
    {
        $sql = "SELECT * FROM Departments WHERE zone = :zone";
        return $this->connection->read($sql, array(':zone' => $zone));

    }

}