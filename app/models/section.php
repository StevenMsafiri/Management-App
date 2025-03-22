<?php

Class Section extends Database

{
    function getAllSections()
    {
        $sql = "SELECT * FROM Sections";

        return $this->read($sql);

    }

    function getSection($section_id){
        $sql = "SELECT * FROM Sections WHERE sect_id = :sect_id";

        return $this->read($sql,array('sect_id'=>$section_id));
    }

    function addSection($section)
    {
        show($section);
        $sql = "INSERT INTO Sections (section_name, description,  department_id, section_head) VALUES (:section_name, :description, :department_id, :section_head)";

        $arr = array(':section_name' => $section['name'],
            ':description' => $section['description'],
            ':department_id' => $section['department'],
        ':section_head' => $section['supervisor']);

        return $this->write($sql,$arr);
    }

    function editSection($section)
    {
        $sql ="UPDATE Sections SET section_name = :section_name, description = :description, department_id = :department_id, section_head = :section_head WHERE sect_id = :id";

        $arr = array(':section_name' => $section['name'],
            ':description' => $section['description'],
            ':department_id' => $section['department'],
            ':section_head' => $section['supervisor'],
            ':id' => $section['sect_id']);

        return $this->write($sql, $arr);
    }

    function deleteSection($section_id)
    {
        $sql = "DELETE FROM Sections WHERE sect_id = :id";
        $arr = array(':id' => $section_id);
        return $this->write($sql,$arr);
    }
}
