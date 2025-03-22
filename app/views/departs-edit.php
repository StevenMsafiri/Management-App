<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?=$data['page_title']?></title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        input, select,textarea {
            border: 1px solid #d1d5db;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        }
    </style>
</head>

<div class="bg-gray-100 p-8   text-gray-900 ">
<div class="bg-white w-7/12 mx-auto p-8 rounded-lg shadow-md">
        <div class=" flex flex-row justify-between items-center mb-4">
            <div class="text-2xl font-semibold text-gray-800 text-center">Update department</div>
            <a class="text-gray-600 hover:text-gray-800" href="<?=ROOT.'departments'?>">X</a>
        </div>
        <form method = "POST" class="space-y-4">
            <?php $department = $data['department'][0]?>
            <input type="hidden" name="id" value="<?php echo ($department['dept_id'])?>">
                <div>
                    <label  class="text-sm font-medium text-gray-700 block" for="name:"> Name:</label>
                    <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3"
                           value="<?php echo htmlspecialchars($department['department_name'])?>">

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4"">
                    <div>
                        <label class="text-sm font-medium text-gray-700 block"  for="Zone">Zone:</label>
                        <select name="Zone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3"  id="zone">
                        <option> Select a Zone </option>
                        <?php
                        if (!empty($data['zones'])) {
                            foreach ($data['zones'] as $zone) {
                                echo '<option value="' . htmlspecialchars($zone['zone_code']).'"';
                                if($zone['zone_code'] === $department['zone'])
                                {
                                   echo 'selected';
                                }
                                   echo '>'. htmlspecialchars($zone['zone_name']) . '</option>';

                        }
                    }
                        ?>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700 block"  for="Supervisor:">Reporting to:</label>
                        <select name="Supervisor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3" id="pos">
                        <option> Select Head of Department </option>
                        <?php
                        if (!empty($data['employees'])) {
                            foreach ($data['employees'] as $employee) {
                                echo '<option value="' . htmlspecialchars($employee['employee_id']).'"';
                                if($employee['employee_id'] === $department['head_of_dept'])
                                {
                                     echo 'selected';
                                }

                                   echo '>' . htmlspecialchars($employee['f_name']) ." " .htmlspecialchars($employee['l_name']) . '</option>';

                              }
                        }
                        ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label  class="text-sm font-medium text-gray-700 block" for="description:">Description</label>
                    <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 px-3"
                              id=""><?php echo htmlspecialchars($department['description'])?></textarea>
                </div>

                <div class="form-actions">
                    <div class="flex justify-end space-x-2">
                        <button type="submit" id="create-btn"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Update
                        </button>
                        <button type="reset"
                                class="bg-gray-300 hover:bg-gray-400 py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Reset
                        </button>
                    </div>
                </div>
        </form>
   </div>
</body>

</html>