<?php


    require_once "./connection.php";
    require_once "./helper.php";
    set_exception_handler("handle");
set_error_handler('handle');
    $id=check_id();
    if($id===false){
        throw new Exception();
    }
    $prepare=$connection->prepare("SELECT * FROM employee WHERE id=? ");

    $prepare->bind_param("i",$id);

    if($prepare->execute()){
        $result=$prepare->get_result();
        if(mysqli_num_rows($result)>0){
            $i=mysqli_fetch_assoc($result);
            include_once "./detail.view.php";
        }else{
            throw new Exception();
        }
    }else{
        throw new Exception();
    }

    mysqli_free_result($result);
    mysqli_close($connection);

    