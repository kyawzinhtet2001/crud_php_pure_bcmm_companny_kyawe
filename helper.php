<?php
/**
 * @return int|false
 */
function check_id(){
     $id= filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
     return $id;
}

/**
 * @return int|false
 */
function check_id_post(){
    $id= filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
    return $id;
}

function handle($e){
    header("Location: error.view.php");
}