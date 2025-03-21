<?php

include "../app/views/head.php";
include "../app/views/navbar.php";

?>

<div class="w-11/12 mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">LIST OF STAFF</h2>
        <a class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md transition duration-300"
           href="employees/create" id="create-btn">Add Employee</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Second
                    Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Birth
                    Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Qualification</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Zone
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Department</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Section
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Reporting To</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of
                    Employment</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <?php
            if (!empty($data['employees'])) {
                foreach ($data['employees'] as $row) {
                    echo "<tr class='hover:bg-gray-50'>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['employee_id']) . "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['f_name']) . "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['s_name']) . "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['l_name']) . "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['birth_date']) . "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['qualification']) . "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>";
                    foreach ($data['zones'] as $zone) {
                        if ($row['zone_code'] === $zone['zone_code']) {
                            echo htmlspecialchars($zone['zone_name']);
                            break;
                        }
                    }
                    echo "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>";
                    foreach ($data['departments'] as $department) {
                        if ($row['department_id'] === $department['dept_id']) {
                            echo htmlspecialchars($department['department_name']);
                            break;
                        }
                    }
                    echo "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>";
                    foreach ($data['sections'] as $section) {
                        if ($row['section_id'] === $section['sect_id']) {
                            echo htmlspecialchars($section['section_name']);
                            break;
                        }
                    }
                    echo "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['position']) . "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>";
                    foreach ($data['employees'] as $employee) {
                        if ($employee['employee_id'] === $row['reporting_to']) {
                            echo htmlspecialchars($employee['f_name'] . " " . $employee['l_name']);
                        }
                    }
                    echo "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['employed_date']) . "</td>";
                    echo "<td class='px-6 py-4 whitespace-nowrap'>";
                    echo "<div class='flex justify-evenly'>";
                    echo "<a name='update-btn' href='employees/update?id=" . htmlspecialchars($row['employee_id']) . "' class='update-btn'>";
                    echo "<img class='w-6 h-6' src='./assets/icons/icons8-update-64.png' alt='Update'>";
                    echo "</a>";
                    echo "<a href='employees/delete?employee_id=" . htmlspecialchars($row['employee_id']) . "' class='clear-btn'>";
                    echo "<img class='w-6 h-6' src='./assets/icons/icons8-delete-48.png' alt='Delete'>";
                    echo "</a>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='13' class='px-6 py-4 whitespace-nowrap text-center'>No employees found</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>