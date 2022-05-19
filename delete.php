<?php

require "./connection.php";
require "./helper.php";
set_exception_handler("handle");
set_error_handler('handle');
function dodelete(int $i)
{
    $sql = "DELETE FROM employee WHERE id=?";
    global $connection;
    $prepare = $connection->prepare($sql);

    $prepare->bind_param("i", $i);

    if ($prepare->execute()) {
        header("Location: index.php");
    } else {
        throw new CustomException();
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
        throw new CustomException();
    }
}
