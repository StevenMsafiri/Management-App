<?php

Class Exports extends Controller {

    function excel(): void
    {
        if(isset($_GET['export']))
        {
            if($_GET['export'] == 'employee')
            {
              $export_data = $this->loadModel("employee");
              $export_values = $export_data->getAllEmployees();

              export_excel($export_values);
            }
            if($_GET['export'] == 'department')
            {
                $export_data = $this->loadModel("department");
                $export_values = $export_data->getAllDepartments();
                export_excel($export_values);
            }
            if($_GET['export'] == 'section')
            {
                $export_data = $this->loadModel("section");
                $export_values = $export_data->getAllSections();
                export_excel($export_values);
            }
        }
    }
}
