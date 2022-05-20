<?php
    require_once "./helper.php";
    // require_once "./authentication.php";
    set_error_handler("handle");
    set_exception_handler('handle');
    $connection = mysqli_connect("localhost","root","","demo1");
    
    if($connection ===false){
        die("Error");
    }

