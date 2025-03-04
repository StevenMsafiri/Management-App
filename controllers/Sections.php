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

    public function processForm($postData, $isUpdate = false)
    {
        $data = [
            'dept_id' => isset($postData['id']) ? trim($postData['id']) : null, // Ensure 'id' exists
            'name' => trim($postData['name']),
            'description' => trim($postData['description']),
            'section_head' => trim($postData['supervisor']),
            'department' => trim($postData['depart'])
        ];

        if (empty($data['name']) || empty($data['supervisor'])) {

            return false;
        }

        if ($isUpdate) {
            return $this->editSection($data['dept_id'], $data);
        } else {
            return $this->createSection($data);
        }
    }
}
