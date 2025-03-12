
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/eforms.css">
    <title>Create Section</title>
</head>
<body>
<div class="container-reg">
    <form method="POST">
        <div class="form-info">
        <div class="input-box">
            <label for="name:">Name:</label>
            <input type="text" name="name" >
        </div>

        <div class="input-box">
            <label for="description"> Description</label>
            <textarea name="description" id=""></textarea>
        </div>

        <div class="input-box">
            <label for="department_id:">Department:</label>
            <select name="department_id" id=""></select>
        </div>

        <div class="input-box">
            <label for="supervisor:"> Head of Section:</label>
            <select name="supervisor" id=""></select>
        </div>


        <div class="input-box" id="btn">
            <button type="submit" id="save-btn" class="btn">Create</button>
        </div>

        </div>


    </form>
</div>