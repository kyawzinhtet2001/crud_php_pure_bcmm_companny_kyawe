<?php

    function doGet(){
        include_once './views/signup.view.php';
    }

    function doPost(){
        require_once("./connection.php");
        echo "ok";
        $name=htmlspecialchars($_POST["name"]);
        $password=htmlspecialchars($_POST['password']);
        
        $confirm_password=htmlspecialchars($_POST['confirm_password']);

        if($password !== $confirm_password){
            header("Location: signup.php");
        }
        $password=password_hash($password,PASSWORD_BCRYPT);
        $sql="insert into user(name,password) values(?,?);";
       
        $prepare=$connection->prepare($sql);
        var_dump("reach_here");
        $prepare->bind_param("ss",$name,$password);
        if($prepare->execute()){
            if($prepare->affected_rows>0){
                return "Location: login.php";
            }
            else{
               
                // return "Location: signup.php";
            }
        }elseif(mysqli_errno($connection)=== 1062){
            $error=[
                "name"=> "username is already exists",
            ];
            include_once("./views/signup.view.php");
            die();
        }

        
    }

if(strtolower($_SERVER['REQUEST_METHOD'])==="post"){
    header(doPost());
}
else{
    doGet();
}