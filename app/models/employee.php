<?php
Class employee
{
    private $connection;
    function  __construct()
    {
        $this->connection = new Database();
        $this->connection->db_connect();
    }
    function addEmployee($POST)
    {
        $sql = "INSERT INTO Employees (f_name, s_name,l_name, qualification, birth_date, zone_code, department_id, section_id, position, employed_date, reporting_to)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->connection->write($sql, $_POST);

    }

    function deleteEmployee($employee_id)
    {
        $sql = "DELETE FROM Employees WHERE id = ?";
        $this->connection->write($sql, $employee_id);
    }

    function editEmployee($POST)
    {
        $sql = "UPDATE Employees SET f_name = ?, s_name = ?, l_name = ?, qualification = ?, birth_date = ? zone_code = ?,
                department_id = ?, section_id = ?, position = ?, employed_date = ?, reporting_to = ? WHERE employee_id = ?";
        $this->connection->write($sql, $_POST);
    }

    function getEmployee($employee_id)
    {
        $sql = "SELECT * FROM Employees WHERE employee_id = ?";


        $result = $this->connection->read($sql, $employee_id);
        return $result;
    }

    function  getAllEmployees()
    {
        $sql = "SELECT * FROM Employees";
        echo  "here";
        $result = $this->connection->read($sql);
        echo "there";
        return $result;
    }
    function getEmployeesByDepartment($department_id)
    {
        $sql = "SELECT * FROM Employees WHERE department_id = ?";
        $result = $this->connection->read($sql, $department_id);
        return $result;
    }

    function getEmployeesByPosition($position)
    {
        $sql = "SELECT * FROM Employees WHERE position = ?";
        $result = $this->connection->read($sql, $position);
        return $result;
    }

    function getEmployeesByZone($zone)
    {
        $sql = "SELECT * FROM Employees WHERE zone_code = ?";
        $result = $this->connection->read($sql, $zone);
        return $result;
    }
}