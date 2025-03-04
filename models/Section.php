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

        $sql = "INSERT INTO Sections(department_name, description, zone) VALUES(:d_name, :d_description, :d_zone)";

        $this->db->query($sql);

        $this->db->bind(':d_name', $data['name']);
        $this->db->bind(':d_description', $data['description']);
        $this->db->bind('d_zone', $data['zone']);

        return $this->db->execute();
    }



    public function updateById($id, $data)
    {

        $sql = "UPDATE Departments SET department_name = :d_name, description = :d_description, zone = :d_zone";

        $this->db->query($sql);

        $this->db->bind(':d_name', $data['name']);
        $this->db->bind(':d_description', $data['description']);
        $this->db->bind('d_zone', $data['zone']);

        return $this->db->execute();
    }

    public function deleteById($id)
    {

        $query = "DELETE FROM Departments WHERE id = :id";
        $this->db->query($query);

        $this->db->bind(':id', $id);


        return $this->db->execute();
    }
}
