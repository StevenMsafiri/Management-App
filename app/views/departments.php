<?php

include "../app/views/head.php";
include "../app/views/navbar.php";

?>

<div class="container mx-auto bg-white rounded-lg shadow p-6 mt-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">DEPARTMENTS</h2>
        <a href="departments/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Department</a>
    </div>
    <table class="min-w-full leading-normal">
        <thead>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Department ID
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Name
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Description
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Zone
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Manager
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Modify
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($data['departments']):
            foreach ($data['departments'] as $department) {
                echo '<tr>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">' . htmlspecialchars($department['dept_id']) . '</td>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">' . htmlspecialchars($department['department_name']) . '</td>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">' . htmlspecialchars($department['description']) . '</td>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">' . htmlspecialchars($department['zone']) . '</td>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">' . htmlspecialchars($department['head_of_dept']) . '</td>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex justify-start items-center gap-4">
                           <a href="departments/update?id='.$department['dept_id'].'" class="update-btn">
                              <img class="w-6 h-6" src="./assets/icons/icons8-update-64.png" alt="Update">
                           </a>
                           
                           <a href="departments/delete?id='.$department['dept_id'].'" class="delete-btn">
                              <img class="w-6 h-6" src="./assets/icons/icons8-delete-48.png" alt="Delete">
                           </a>
                        </div>
                      </td>';
                echo '</tr>';
            }
        else:
            echo '<tr><td colspan="6" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">No departments found</td></tr>';
        endif;
        ?>
        </tbody>
    </table>
</div>
</body>
</html>