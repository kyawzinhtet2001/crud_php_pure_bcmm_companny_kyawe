<?php

    session_start();
    // set_error_handler("handle");
    // set_exception_handler('handle');
    if(!isset($_SESSION["logged_in"])){
        // throw new Exception();
        header("Location: login.php");
    }//else{
    //     // var_dump($_SESSION['logged_in']);
    //     // die();
    // }