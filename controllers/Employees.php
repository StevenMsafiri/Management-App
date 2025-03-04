<?php

require_once '../models/Employee.php';
require_once '../helpers/session_helper.php';

class Employees
{

    private $employeeModel;

    public function __construct()
    {

        $this->employeeModel = new Employeee;
    }

    public function read()
    {



        $employee_list = $this->employeeModel->getAllEmployee();
        return $employee_list;
    }


    public function readOne($id)
    {
        $employee = $this->employeeModel->getEmployeeById($id);
        return $employee;
    }

    public function edit($id, $data)
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $data['f_name']) || $data['s_name'] || $data['l_name']) {
            flash("update", "Invalid name(s)");
        }


        if (
            empty($data['f_name']) || empty($data['l_name']) || $data['s_name'] || $data['qualification'] || $data['birth_date']
            || $data['zone_code'] || $data['department_id'] || $data['section_id'] || $data['position'] || $data['reporting_to'] || $data['date_of_employment']
        ) {

            flash("update", "Please fill in all inputs");
        }
        $edit_employeee = $this->employeeModel->updateEmployee($id, $data);

        return $edit_employeee;
    }

    public function create($data)
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $data['f_name']) || $data['s_name'] || $data['l_name']) {
            flash("create", "Invalid name(s)");
            redirect("../views/employee-create.php");
        }

        if (
            empty($data['f_name']) || empty($data['l_name']) || $data['s_name'] || $data['qualification'] || $data['birth_date']
            || $data['zone_code'] || $data['department_id'] || $data['section_id'] || $data['position'] || $data['reporting_to'] || $data['date_of_employment']
        ) {

            flash("create", "Please fill in all inputs");
            redirect("../views/employee-create.php");
        }

        $new_employee = $this->employeeModel->createEmployee($data);

        return $new_employee;
    }

    public function processForm($postData, $isUpdate = false)
    {


        $data = [
            'employee_id' => isset($postData['id']) ? trim($postData['id']) : null, // Ensure 'id' exists
            'f_name' => trim($postData['Firstname']),
            's_name' => trim($postData['Second-name']),
            'l_name' => trim($postData['Lastname']),
            'qualification' => trim($postData['Qualification']),
            'birth_date' => trim($postData['Birthdate']),
            'zone_code' => trim($postData['Zone']),
            'department_id' => trim($postData['Department']),
            'section_id' => trim($postData['Section']),
            'position' => trim($postData['Position']),
            'reporting_to' => trim($postData['Supervisor']),
            'date_of_employment' => trim($postData['Employed-date'])
        ];


        if ($isUpdate) {
            return $this->edit($data['employee_id'], $data);
        } else {
            return $this->create($data);
        }
    }


    public function deleteEmployeeById($id)
    {

        return $this->employeeModel->deleteEmployee($id);
    }
}
