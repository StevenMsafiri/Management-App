<?php

require_once "../librariees/Database.php";

class Department{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAll(){

        $this->db->query("SELECT * FROM Departments");
        
        return $this->db->resultSet();

    }

    public function getById($id){

        $this->db->query("SELECT * FROM Departments WHERE dept_id = :id");
        $this->db->bind(':id', $id);

        return $this->db->Single();

    }

    public function getByzone($zone){

        $this->db->query("SELECT * FROM Departments WHERE zone = :d_zone");
        $this->db->bind(':d_zone', $zone);

        return $this->db->resultSet();

    }

    public function createNew($data){

        $sql = "INSERT INTO Departments(department_name, description, zone, head_of_dept) VALUES(:d_name, :d_description, :d_zone, :d_head)";

        $this->db->query($sql);

        $this->db->bind(':d_name', $data['name']);
        $this->db->bind(':d_description', $data['description']);
        $this->db->bind('d_zone', $data['Zone']);
        $this->db->bind('d_head', intval($data['Supervisor']));

        return $this->db->execute();
    }



    public function updateById($id, $data){

        $sql = "UPDATE Departments SET department_name = :d_name, description = :d_description, zone = :d_zone, head_of_dept = :d_head WHERE dept_id = :id";

        $this->db->query($sql);

        $this->db->bind(':id', intval($id));
        $this->db->bind(':d_name', $data['name']);
        $this->db->bind(':d_description', $data['description']);
        $this->db->bind('d_zone', $data['Zone']);
        $this->db->bind('d_head', intval($data['Supervisor']));

        return $this->db->execute();

    }

    public function deleteById($id){

        $query = "DELETE FROM Departments WHERE dept_id = :id";
        $this->db->query($query);
    
        $this->db->bind(':id', $id);
    

        return $this->db->execute();
        
    }
}