<?php
require_once "connection.php";
require_once "./authentication.php";

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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="company_logo.png"  width=100 height=50/> Welcome from our site</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mb-2 mb-lg-0 ms-auto">
                        
                        
                        <li class="nav-item dropdown ">
                            <a class="nav-link btn btn-primary px-4 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                                <?php

                                // var_dump($_SESSION);
                                    if(isset($_SESSION["logged_in_name"])){
                                        echo $_SESSION["logged_in_name"];
                                    }
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                    
                </div>
            </div>
        </nav>
    </header>
    <div class="container ">
        <h1 class="p-2 py-4"> Employee Details
            <hr>
        </h1>
        <input type="text" id="search" placeholder="please enter some name to search" class="float-start form-control w-50">
        <a href="./form.view.php" class='btn btn-success float-end my-3 '>Create Employee</a>
        <table class="table  table-responsive table-striped" id="table">
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
                echo "<tbody id='tbody'>";
                while ($array = mysqli_fetch_assoc($result)) {
                    echo "<tr name='row'>";
                    echo "<td name='name'>" . $array['name'] . "</td>";
                    echo "<td>" . $array['address'] . "</td>";
                    echo "<td>" . $array['salary'] . "</td>";
                    $id = $array['id'];
                    echo "<td>
                    <a href='./detail.php?id=$id' data-bs-toggle='tooltip' title='detail'><i class='bi bi-eye'></i></a>
                    <a href='./update.php?id=$id' data-bs-toggle='tooltip' title='Edit'><i class='bi bi-pencil'></i></a>
                    <a href='./delete.view.php?id=$id' data-bs-toggle='tooltip' title='Remove'><i class='bi bi-trash'></i></a>
                    </td>";
                    echo "</tr>";
                }
                echo "</tbody>";
            } else {
                echo "<p class='h1'>No rows</p>";
            }
            ?>
        </table>
        
        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })

            document.getElementById("search").onkeyup = (event) => {
                // console.log($('#search').val().trim());
                if (event.target.value) {
                    search();

                }
                // console.log(event.target.value);
                let name_cols = document.getElementsByName("name");
                for (let name of name_cols) {
                    name.parentElement.className = "";
                }
                // console.log("running")
                let textbox = document.getElementById("search");
                textbox.className += "float-start form-control w-50";
            }


            function search() {
                $.ajax({
                    url: "search.php",
                    method: "get",
                    contentType: "application/json",
                    data: {
                        'key': $('#search').val(),
                    },
                    success: (data) => {
                        let name_cols = document.getElementsByName("name");
                        // console.log(name_cols.length);
                        // console.log(data);
                        if (!data) {
                            let textbox = document.getElementById("search");
                            textbox.className += " bg-warning";
                            return;
                        }
                        let col = JSON.parse(data);
                        // console.log(col);
                        if (col.length !== 0) {
                            let textbox = document.getElementById("search");
                            textbox.className = "float-start form-control w-50";
                            for (let name of name_cols) {
                                for (let key of col) {
                                    // console.log(key.name);
                                    if (name.innerHTML === key.name) {
                                        name.parentElement.className = "bg-warning";
                                    }
                                }
                            }
                        }



                    },
                    error: (e) => {

                    }
                })
            }
        </script>
    </div>
    <footer class='text-center alert alert-success text-black'>
            2022 all right recevied <a href="#" class='text-decoration-none'>Brycen Myanmar Co.Ltd</a> 
        </footer>
</body>

</html>