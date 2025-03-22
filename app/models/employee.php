<?php
Class Employee
{
    private $connection;
    function  __construct()
    {
        $this->connection = new Database();
        $this->connection->db_connect();
    }
    function addEmployee($POST)
    {
        $sql = "INSERT INTO Employees (f_name, s_name,l_name, qualification, birth_date, zone_code, department_id, section_id, position, reporting_to, employed_date)
                VALUES (:f_name, :s_name, :l_name, :qualification, :birth_date, :zone_code, :dept_id, :sect_id,:position ,:supervisor, :employed_date)";

        $arr = [':f_name' =>$POST['Firstname'],
            ':s_name' =>$POST['Second-name'],
            ':l_name' =>$POST['Lastname'],
            ':qualification' =>$POST['Qualification'],
            ':birth_date' =>$POST['Birthdate'],
            ':zone_code' =>$POST['Zone'],
            ':dept_id' =>$POST['Department'],
            ':sect_id' =>$POST['Section'],
            ':position' =>$POST['position'],
            ':supervisor' =>$POST['Supervisor'],
            ':employed_date' =>$POST['Employed-date']];

        return $this->connection->write($sql, $arr);
    }

    function deleteEmployee($employee_id)
    {

        $sql = "DELETE FROM Employees WHERE employee_id = :employee_id";
        $arr = [':employee_id' => $employee_id];
        return $this->connection->write($sql, $arr);
    }

    function editEmployee($POST)
    {
        $sql = "UPDATE Employees SET f_name = :f_name, s_name = :s_name, l_name = :l_name, qualification = :qualification, birth_date = :birth_date, zone_code = :zone_code,
                department_id = :dept_id, section_id = :sect_id, position = :position, reporting_to = :supervisor, employed_date = :employed_date WHERE employee_id = :employee_id";

        $arr = [
            ':f_name' =>$POST['Firstname'],
            ':s_name' =>$POST['Second-name'],
            ':l_name' =>$POST['Lastname'],
            ':qualification' =>$POST['Qualification'],
            ':birth_date' =>$POST['Birthdate'],
            ':zone_code' =>$POST['Zone'],
            ':dept_id' =>$POST['Department'],
            ':sect_id' =>$POST['Section'],
            ':position' =>$POST['position'],
            ':supervisor' =>$POST['Supervisor'],
            ':employed_date' =>$POST['Employed-date'],
            ':employee_id' => $POST['id']];

        return $this->connection->write($sql, $arr);
    }

    function getEmployee($employee_id)
    {
        $sql = "SELECT * FROM Employees WHERE employee_id = :employee_id limit 1";

        $arr = ['employee_id' => $employee_id];

        $result = $this->connection->read($sql, $arr);
        return $result;
    }

    function  getAllEmployees()
    {
        $sql = "SELECT * FROM Employees";

        $result = $this->connection->read($sql);
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