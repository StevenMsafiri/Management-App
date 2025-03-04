<?php

require_once "../models/Department.php";


class Departments
{

    private $departmentModel;

    public function __construct()
    {
        $this->departmentModel = new Department();
    }


    public function getAllDepartments()
    {

        $departments = $this->departmentModel->getAll();

        return $departments;
    }


    public function getDepartmentsByZone($zone)
    {

        return $this->departmentModel->getByzone($zone);
    }


    public function getOneDepartment($id)
    {

        $department = $this->departmentModel->getById($id);
        return $department;
    }

    public function deleteDepartment($id)
    {

        return $this->departmentModel->deleteById($id);
    }

    public function createDepartment($data)
    {
        return $this->departmentModel->createNew($data);
    }


    public function editDepartment($id, $data)
    {

        return $this->departmentModel->updateById($id, $data);
    }

    public function processForm($postData, $isUpdate = false)
    {
        $data = [
            'dept_id' => isset($postData['id']) ? trim($postData['id']) : null, // Ensure 'id' exists
            'name' => trim($postData['name']),
            'description' => trim($postData['description']),
            'department_head' => trim($postData['Supervisor']),
            'zone_code' => trim($postData['Zone'])
        ];

        if (empty($data['name']) || empty($data['description']) || empty($data['department_head']) || empty($data['zone_code'])) {

            return false;
        }

        if ($isUpdate) {
            return $this->editDepartment($data['dept_id'], $data);
        } else {
            return $this->createDepartment($data);
        }
    }
}
