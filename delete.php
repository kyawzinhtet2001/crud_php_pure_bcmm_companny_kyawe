<?php

require_once "./connection.php";
require_once "./helper.php";
set_exception_handler("handle");
set_error_handler('handle');
function dodelete(int $i)
{
    $sql = "DELETE FROM employee WHERE id=?";
    global $connection;
    $prepare = $connection->prepare($sql);
    var_dump("reached");
    $prepare->bind_param("i", $i);

    if ($prepare->execute()) {
        if($prepare->affected_rows>0){
        header("Location: index.php");
        }
        else{
            throw new Exception();
        }
    } else {
        throw new Exception();
    }
}


if (isset($_GET['choice'])) {
    if ($_GET['choice'] === 'yes') {
        $id = check_id();
        if ($id === false) {
            throw new CustomException();
        }
        dodelete($id);
    } else {
        header("Location: index.php");
    }
}
else{
    throw new Exception();
}
