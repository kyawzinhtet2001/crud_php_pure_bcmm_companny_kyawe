<?php
    session_start();
    // var_dump($_SESSION);
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
        <div class="h2 lh-lg p-2"> Create Record</div>
        <div class="h5 text-decoration-none p-2"> Please fill this form and submit to add employee to database</div>
        <form action="create_employee.php" method="post">
            <div class="my-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" pattern="[a-zA-Z][a-zA-Z\s]*" class="form-control" value='<?php if(isset($_SESSION['input']['name'])) echo $_SESSION['input']['name']?>'>
                <?php 
                if (isset($_SESSION["error"]["name"]))
                echo "<p class='text-danger'>" .$_SESSION["error"]["name"].'</p>';
                ?>
            </div>
            <div class="my-2">
                <label for="address" class="form-label">Address</label>
                <textarea type="text" name="address" id="address" placeholder="Address" class="form-control" ><?php if(isset($_SESSION['input']['address'])) echo trim($_SESSION['input']['address'])?></textarea>
                <?php 
                if (isset($_SESSION["error"]["address"]))
                echo "<p class='text-danger'>" .$_SESSION["error"]["address"].'</p>';
                ?>
            </div>
            <div class="my-2">
                <label for="salary" class="form-label">Salary</label>
                <input type="text" name="salary" id="salary" placeholder="Salary" class="form-control" value=<?php if(isset($_SESSION['input']['salary'])) echo trim($_SESSION['input']['salary'])?>>
                <?php 
                if (isset($_SESSION["error"]["salary"]))
                echo "<p class='text-danger'>" .$_SESSION["error"]["salary"].'</p>';
                ?>
            </div>
            <div class="my-2">
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                <input type="submit" name="submit" id="reset" value="Cancel" class="btn btn-light">
            </div>
        </form>
    </div>
    <?php $_SESSION['error']=[];
        $_SESSION['input']=[];
    ?>
</body>
</html>