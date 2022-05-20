<?php

    require_once "connection.php";

    function search(string $key){
        $key.="%";
        // var_dump($key);
        global $connection;
        $sql="SELECT * FROM demo1.employee where name like ?";
        $prepare=$connection->prepare($sql);
        $prepare->bind_param("s",$key);
        if($prepare->execute()){
            $result=$prepare->get_result();
            if(mysqli_num_rows($result)>0){
                $arr=mysqli_fetch_all($result,MYSQLI_ASSOC);
                $json=json_encode($arr);
                return $json;
            }else{
                header("HTTP1.1 404 NOT FOUND");
                die();
            }
            
        }
        else{
            throw new Exception();
        }
    }

// header("Content-Type: application/json");
$key=htmlspecialchars($_REQUEST["key"]);
// var_dump($key);

echo search($key);
die();