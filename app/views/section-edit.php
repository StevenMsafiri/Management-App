<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/eforms.css">
    <title>Upadate Staffs</title>
</head>
<body>
<div class="container-reg">
    <form method="POST">
        <div class="title">Update employee <span><input type="hidden" name="id" value="<?php echo $sId?>"></span></div>
        <br>
        <div class="form-info">
        <div class="input-box">
            <label for="name:">name:</label>
            <input type="text" name="name" value="<?php echo $name?>" >

        <div class="input-box">
            <label for="description"> Description</label>
            <textarea name="description" id=""></textarea>
        </div>

        </div>
        <div class="input-box">
            <label for="department:">Department:</label>
            <select name="department" > </select>
        </div>

        <div class="input-box">
            <label for="supervisor:"> Head of Section:</label>
            <select name="department" > </select>
        </div>


        <div class="input-box" id="btn">
            <button type="submit" id="save-btn" class="btn">Save</button>
            <a href="./read_sections.php" id="cancel-btn" class="btn"> Cancel </a>
        </div>

        </div>


    </form>
</div>
</body>
</html>
