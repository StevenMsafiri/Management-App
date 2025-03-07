<?php

require_once "../models/Section.php";



class Sections
{

    private $sectionModel;

    public function __construct()
    {
        $this->sectionModel = new Section;
    }


    public function getAllSections()
    {

        $sections = $this->sectionModel->getAll();

        return $sections;
    }


    public function getOneSection($id)
    {

        $section = $this->sectionModel->getById($id);
        return $section;
    }

    public function getSectionByDepartment($id)
    {
        return $this->sectionModel->getByDepart($id);
    }

    public function deleteSection($id)
    {

        return $this->sectionModel->deleteById($id);
    }

    public function createSection($data)
    {
        return $this->sectionModel->createNew($data);
    }


    public function editSection($id, $data)
    {

        return $this->sectionModel->updateById($id, $data);
    }
}
