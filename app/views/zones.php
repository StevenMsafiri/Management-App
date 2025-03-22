<?php

include "../app/views/head.php";
include "../app/views/navbar.php";

?>

<div class="container mx-auto bg-white rounded-lg shadow p-6 mt-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">LIST OF ZONES</h2>
        <a href="<?= ROOT . 'section-create' ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Zone</a>
    </div>
    <table class="min-w-full leading-normal">
        <thead>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Zone ID
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Name
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Code
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Head of Zone
            </th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Modify
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($data['zones']):
            foreach ($data['zones'] as $zone) {
                echo '<tr>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">' . htmlspecialchars($zone['zone_id']) . '</td>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">' . htmlspecialchars($zone['zone_name']) . '</td>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">' . htmlspecialchars($zone['zone_code']) . '</td>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">' . htmlspecialchars($zone['head_of_zone']) . '</td>';
                echo '<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex justify-start items-center gap-4">
                           <a href="departments/update?id='.$zone['zone_id'].'" class="update-btn">
                              <img class="w-6 h-6" src="./assets/icons/icons8-update-64.png" alt="Update">
                           </a>
                           
                           <a href="departments/delete?id='.$zone['zone_id'].'" class="delete-btn">
                              <img class="w-6 h-6" src="./assets/icons/icons8-delete-48.png" alt="Delete">
                           </a>
                        </div>
                      </td>';
                echo '</tr>';
            }
        else:
            echo '<tr><td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">No departments found</td></tr>';
        endif;
        ?>
        </tbody>
    </table>
</div>
</body>
</html>