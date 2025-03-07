<?php

require_once '../librariees/Database.php';

class Employeee
{

    private $db;

    public function __construct()
    {

        $this->db = new Database;
    }


    public function getEmployeeById($employeee_id)
    {

        $this->db->query('SELECT * FROM Employees WHERE employee_id = :id');
        $this->db->bind(':id', $employeee_id);

        return $this->db->Single();
    }


    public function getAllEmployee()
    {
        $this->db->query("SELECT * FROM Employees");
        return $this->db->resultSet();
    }

    public function updateEmployee($id, $data)
    {
        $this->db->query("DROP zone_code FROM Employees  WHERE id = $id");
        $this->db->execute();
        $query = "UPDATE Employees SET f_name = :first_name, s_name = :second_name, 
                      l_name = :last_name, birth_date = :birthdate, qualification = :qualification, zone_code = :zonecode,
                      department_id = :department, section_id = :section, position = :position,
                      employed_date = :date_of_employment,reporting_to = :supervisor WHERE employee_id = :id";

        $this->db->query($query);

        $this->db->bind(':id', intval($id));
        $this->db->bind(':first_name', $data['Firstname']);
        $this->db->bind(':second_name', $data['Second-name']);
        $this->db->bind(':last_name', $data['Lastname']);
        $this->db->bind(':qualification', $data['Qualification']);
        $this->db->bind(':birthdate', $data['Birthdate']);
        $this->db->bind(':zonecode', $data['Zone']);
        $this->db->bind(':department', intval($data['Department']));
        $this->db->bind(':section', intval($data['Section']));
        $this->db->bind(':position', $data['Position']);
        $this->db->bind(':employed_date', $data['Employed-date']);
        $this->db->bind(':supervisor', intval($data['Supervisor']));

        return $this->db->execute();
    }

    public function deleteEmployee($id)
    {
        $query = "DELETE FROM Employees WHERE employee_id = :id";
        $this->db->query($query);

        $this->db->bind(':id', $id);


        return $this->db->execute();
    }

    public function createEmployee($data)
    {
        $query = "INSERT INTO Employees (f_name, s_name, l_name, qualification, birth_date, zone_code, 
                  department_id, section_id, position,employed_date, reporting_to)


                  VALUES (:first_name, :second_name, :last_name, :qualification, :birthdate, :zonecode, 
                :department, :section, :position, :employed_date, :supervisor)";

        $this->db->query($query);

        $this->db->bind(':first_name', $data['Firstname']);
        $this->db->bind(':second_name', $data['Second-name']);
        $this->db->bind(':last_name', $data['Lastname']);
        $this->db->bind(':qualification', $data['Qualification']);
        $this->db->bind(':birthdate', $data['Birthdate']);
        $this->db->bind(':zonecode', $data['Zone']);
        $this->db->bind(':department', intval($data['Department']));
        $this->db->bind(':section', intval($data['Section']));
        $this->db->bind(':position', $data['Position']);
        $this->db->bind(':employed_date', $data['Employed-date']);
        $this->db->bind(':supervisor', intval($data['Supervisor']));

        return $this->db->execute();
    }
}
