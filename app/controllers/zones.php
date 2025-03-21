<?php

Class Zones extends Controller
{
    function index()
    {
        $data['page_title'] = "Zones";

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $zones = $this->loadModel('zone');
        $data['zones'] = $zones->getAllZones();

        $this->view("zones", $data);
    }

    function create()
    {
        $data['page_title'] = "Add Zone";
        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $zones = $this->loadModel('zone');
        $data['zones'] = $zones->getAllZones();

        $this->view("zones-create", $data);
    }

    function update()
    {
        $data['page_title'] = "Update Zone";

        $employees = $this->loadModel('employee');
        $data['employees'] = $employees->getAllEmployees();

        $zones = $this->loadModel('zone');
        $data['zone'] = $zones->getZoneById($_GET['id']);

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['zone_id'])) {
            $zone_id = $_POST['zone_id'];

            $result = $zones->updateZone($zone_id);
            if ($result) {
                header('Location:' .ROOT.'/zones');
                exit();
            }


        }

        $this->view("zones-update", $data);

    }

    function delete()
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($POST['zone_id']))
        {
            $zone_id = $POST['zone_id'];

            $zones = $this->loadModel('zone');
            $result = $zones->deleteZone($zone_id);
            if($result)
            {
                header('Location:' .ROOT.'/zones');
                exit();
            }
        }
    }
}
