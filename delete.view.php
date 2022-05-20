<?php
    require_once "./authentication.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Are you sure delete</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_GET['id']))
        $id = $_GET['id'];
    else
        throw new Exception();
    ?>
    <div class="container">
        <p class='p-3 h1'>
            Delete Record
        </p>
        <form method="get" action="delete.php">
            <div class='p-3 alert-danger alert'>
                <div class="text-danger">Are you sure to delete this record?</div>
                <button class="btn btn-danger" name="choice" value="yes">Yes</button>
                <button class="btn btn-primary" name="choice" value="no">No</button>
                <input type='hidden' name="id" value=<?php echo $id;   ?>>
            </div>
        </form>
    </div>
</body>

</html>