<?php

session_start();

if(isset($_SESSION["logged_in"])){
    // throw new Exception();
    header("Location: index.php");
}