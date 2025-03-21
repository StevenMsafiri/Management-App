<?php

Class Section extends Database

{
    function getAllSections()
    {
        $sql = "SELECT * FROM Sections";

        return $this->read($sql);

    }

    function getSection($department_id){
        $sql = "SELECT * FROM Sections WHERE department_id = :department_id";

        return $this->read($sql,array('department_id'=>$department_id));
    }

    function addSection($section)
    {
        $sql = "INSERT INTO Sections (section_name, description,  department_id, section_head) VALUES (:section_name, :desciption, :department_id, :section_head)";

        $arr = array(':section_name' => $section['section_name'],
            ':description' => $section['description'],
            ':department_id' => $section['department_id'],
        ':section_head' => $section['section_head']);

        return $this->write($sql,$arr);
    }

    function editSection($section)
    {
        $sql ="UPDATE Sections SET section_name = :section_name, description = :description, department_id = :department_id, section_head = :section_head WHERE sect_id = :id";

        $arr = array(':section_name' => $section['section_name'],
            ':description' => $section['description'],
            ':department_id' => $section['department_id'],
            ':section_head' => $section['section_head'],
            ':id' => $section['sect_id']);
    }

    function deleteSection($section_id)
    {
        $sql = "DELETE FROM Sections WHERE sect_id = :id";
        $arr = array(':id' => $section_id);
        return $this->write($sql,$arr);
    }
}
