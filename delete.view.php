<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Are you sure delete</title>
</head>

<body>
    <?php
        if(isset($_GET['id']))
            $id=$_GET['id'];
        else
            throw new Exception();
    ?>
    <div class="container">
        <p class='p-3 h1'>
            Delete Record
        </p>
        <form method="get" action="delete.php">
        <p class='p-3 bg-danger'> 
            <div class="text-danger">Are you sure to delete this record?</div>
            <button class="btn btn-danger" name="choice" value="yes">Yes</button>
            <button class="btn btn-primary" name="choice" value="no">No</button>
            <input type='hidden' name="id" value=<?php echo $id;   ?>>
        </p>
        </form>
    </div>
</body>

</html>