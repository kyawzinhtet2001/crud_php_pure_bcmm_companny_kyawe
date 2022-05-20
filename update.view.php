<?php
    require_once "./authentication.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    
    <div class="container-md p-5" >
        <div class="h2 lh-lg p-2"> Update Record</div>
        <div class="h5 text-decoration-none p-2"> Please edit the input values and submit to update employee to database</div>
        <form action="update.php" method="post">
            <input type='hidden' name="id" value=<?php echo $data['id'] ?>>
            <div class="my-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" pattern="[a-zA-Z][a-zA-Z\s]*" id="name" placeholder="Name" class="form-control" value='<?php  $name=$data['name'];echo "$name";?>'>
                <?php 
                if (isset($error["name"]))
                echo "<p class='text-danger'>" .$error["name"].'</p>';
                ?>
            </div>
            <div class="my-2">
                <label for="address" class="form-label">Address</label>
                <textarea type="text" name="address" id="address" placeholder="Address" class="form-control" ><?php  echo trim($data['address'])?></textarea>
                <?php 
                if (isset($error["address"]))
                echo "<p class='text-danger'>" .$error["address"].'</p>';
                ?>
            </div>
            <div class="my-2">
                <label for="salary" class="form-label">Salary</label>
                <input type="text" name="salary" id="salary" placeholder="Salary" class="form-control" value=<?php  echo trim($data['salary'])?>>
                <?php 
                if (isset($error["salary"]))
                echo "<p class='text-danger'>" .$error["salary"].'</p>';
                ?>
            </div>
            <div class="my-2">
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                <input type="submit" name="submit" id="reset" value="Cancel" class="btn btn-light">
            </div>
        </form>
    </div>
</body>
</html>