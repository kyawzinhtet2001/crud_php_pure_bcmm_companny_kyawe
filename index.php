<?php
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container ">
        <h1> Employee Details <hr> </h1>
        <a href="./form.view.php" class='btn btn-success float-end my-3 '>Create Employee</a>
        <table class="table table-active table-responsive table-striped">
            <?php
            $sql = 'Select * from employee;';
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<thead>";
                echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Address</th>";
                echo "<th>Salary</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
                
                while ($array = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $array['name'] . "</td>";
                    echo "<td>" . $array['address'] . "</td>";
                    echo "<td>" . $array['salary'] . "</td>";
                    $id=$array['id'];
                    echo "<td>
                    <a href='./detail.php?id=$id' ><img src='./eye.svg' alt='detail' title='detail' class='' /></a>
                    <a href='./update.php?id=$id' ><img src='./edit.svg' alt='edit' title='edit' class='' /></a>
                    <a href='./delete.view.php?id=$id' ><img src='./delete.svg' alt='delete' title='delete' class='' /></a>
                    </td>";
                    echo "</tr>";
                }
                
            } else {
                echo "<p class='h1'>No rows</p>";
            }
            ?>
        </table>
            
    </div>
</body>

</html>