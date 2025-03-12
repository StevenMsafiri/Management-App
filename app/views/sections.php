
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css//header.css">
    <link rel="stylesheet" href="./css//read.css">
    <title>Staffs</title>
</head>

<body>
    <?php

    use controllers\Sections;

    include "./partials/nav.php";
    include_once "../controllers/Sections.php";

    $sectionsController = new Sections;


    $sections = $sectionsController->getAllSections();

    
    ?>
    <div class="container-staff">
    <h2>Department Sections</h2>
    <a href="./section-create.php" id="create-btn">Add Section</a>  
    <br>
     
        <table class="table">
            <thead>
                <tr>
                    <th>Section ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Department</th>
                    <th>Head of Section</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($sections as $row){

                    echo "
                    <tr>
                    <td>$row[sect_id]</td>
                    <td>$row[section_name]</td>
                    <td>$row[description]</td>
                    <td>$row[department_id]</td>
                    <td>$row[head_of_section]</td>
                    <td><a href=''><img src='./icons/icons8-update-64.png'></a>
                    <a href=''><img src='./icons/icons8-delete-48.png'></a></td>
                     </tr>";
                   
                    
                }
                ?>



        </table>
    </div>

</body>

</html>