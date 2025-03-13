<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $data['page_title']?></title>
</head>
    <body class="bg-gray-100 text-gray-900">
        <div class="w-11/12 mx-auto mt-20 bg-white p-8">
            <div class="flex justify-between items-baseline my-6">
            <h2 class="text-3xl text-gray-600 font-bold">LIST OF STAFFS</h2>
            <a class="bg-blue-300 p-2 mr-2" href="employees/create" id ="create-btn">Add Employee</a>
            </div>
           <div class="overflow-auto shadow">
               <table class="w-full">
                   <thead class="bg-blue-400 py-4">
                   <tr>
                       <th class="text-left py-4">ID</th>
                       <th class="text-left py-4">First Name</th>
                       <th class="text-left py-4">Second Name</th>
                       <th class="text-left py-4">Last Name</th>
                       <th class="text-left py-4">Birth Date</th>
                       <th class="text-left py-4">Qualification</th>
                       <th class="text-left py-4">Zone</th>
                       <th class="text-left py-4">Department</th>
                       <th class="text-left py-4">Section</th>
                       <th class="text-left py-4">Position</th>
                       <th class="text-left py-4">Reporting to</th>
                       <th class="text-left py-4">Date of Employment</th>
                       <th class="text-left py-4">Action</th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php
                   if (!empty($data['employees'])) {
                       foreach ($data['employees'] as $row) {
                           echo "
                            <tr class='bg-cyan-200 my-2'>
                            <td class = 'py-2'> $row[employee_id]</td>
                            <td class = 'py-2'> $row[f_name]</td>
                            <td class = 'py-2'>$row[s_name]</td>
                            <td class = 'py-2'> $row[l_name]</td>
                            <td class = 'py-2'> $row[birth_date]</td>
                            <td class = 'py-2'> $row[qualification]</td>
                            <td class = 'py-2'>";

                           foreach($data['zones'] as $zone){
                               if($row['zone_code'] === $zone['zone_code']){
                                   echo $zone['zone_name'];
                                   break;
                               }
                           }

                           echo "</td>
                            <td class = 'py-2'>";
                           foreach($data['departments'] as $department){
                               if($row['department_id'] === $department['dept_id']){
                                   echo $department['department_name'];
                                   break;
                               }
                           }
                           echo "</td>

                            <td class = 'py-2'> ";
                           foreach($data['sections'] as $section){
                               if($row['section_id'] === $section['sect_id']){
                                   echo $section['section_name'];
                                   break;
                               }
                           }
                           echo
                           "</td>
                            <td class = 'py-2'> $row[position]</td>
                            <td class = 'py-2'>";
                           foreach ($data['employees'] as $employee) {
                               if ($employee['employee_id'] === $row['reporting_to']) {
                                   echo $employee['f_name'] . " " . $employee['l_name'];
                               }
                           }
                           echo "</td>
                            <td class = 'py-2'> $row[employed_date]</td>
                            <td class = 'py-2'>
                            <div class=' flex justify-evenly'>
                            <a name='update-btn' href='employees/update?id=$row[employee_id]' class='update-btn'>
                            <img class='w-8' src='./assets/icons/icons8-update-64.png'>
                            </a>
                                 <a  name='delete' href='employees?employee_id=$row[employee_id]' class='clear-btn'>
                                 <img class='w-8' src='./assets/icons/icons8-delete-48.png'>
                                 </a>
                            </div> 
                            </td>
                            </tr>
                            </tbody>";
                       }
                   } else {
                       echo "<tr><td colspan='13'>No employees found</td></tr>";
                   }
                   ?>
               </table>
           </div>
        </div>

    </body>

</html>