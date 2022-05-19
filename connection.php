<?php
    // require_once "./helper.php";
    // set_error_handler("handle");
    $connection = mysqli_connect("localhost","root","","demo1");
    
    if($connection ===false){
        die("Error");
    }

