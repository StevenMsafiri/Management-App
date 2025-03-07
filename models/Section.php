<?php

include_once '../librariees/Database.php';

class Section
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAll()
    {

        $this->db->query("SELECT * FROM Sections");

        return $this->db->resultSet();
    }

    public function getByDepart($id)
    {

        $this->db->query("SELECT * FROM Sections WHERE department_id = :id");
        $this->db->bind(':id', $id);

        return $this->db->resultSet();
    }

    public function getById($id)
    {

        $this->db->query("SELECT * FROM Sections WHERE sect_id = :id");
        $this->db->bind(':id', $id);

        return $this->db->Single();
    }

    public function createNew($data)
    {

        $sql = "INSERT INTO Sections(section_name, description, department_id, section_head) VALUES(:d_name, :d_description, :d_id, :supervisor)";

        $this->db->query($sql);

        $this->db->bind(':d_name', $data['name']);
        $this->db->bind(':d_description', $data['description']);
        $this->db->bind('d_zone', $data['zone']);

        return $this->db->execute();
    }



    public function updateById($id, $data)
    {

        $sql = "UPDATE Departments SET section_name = :d_name, description = :d_description, department_id = :d_id, section_head = :supervisor";

        $this->db->query($sql);

        $this->db->bind(':d_name', $data['name']);
        $this->db->bind(':d_description', $data['description']);
        $this->db->bind('d_zone', $data['department_id']);
        $this->db->bind('supervisor', $data['section_head']);

        return $this->db->execute();
    }

    public function deleteById($id)
    {

        $query = "DELETE FROM Sections WHERE sect_id = :id";
        $this->db->query($query);

        $this->db->bind(':id', $id);


        return $this->db->execute();
    }
}
