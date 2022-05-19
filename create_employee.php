<?php
session_start();

/** 
 *  errors 
 *  Please enter a name 
 *  Please enter a address
 *  Please enter a salary ammount
 * 
 *  Plase enter a positive salary ammount 
 *  Please enter a valid name
 * */
function dowork()
{
    require_once "./connection.php";
    if (isset($_POST['submit'])) {

        if($_POST['submit']=="Cancel"){
            header("Location: index.php");
            die();
        }

        $name = filter_input(INPUT_POST, "name", FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[a-zA-Z][a-zA-Z\s]*/")));

        $salary = filter_input(INPUT_POST, "salary", FILTER_VALIDATE_INT);
        $address = htmlspecialchars($_POST['address']);
        // var_dump(empty($name) || empty($address) || empty($salary) || !is_int($salary));
        // var_dump(empty($name));
        // var_dump($name);
        // var_dump( !is_int($salary));
        //  var_dump(preg_match_all("/[a-zA-Z][a-zA-Z\s]*/",$name));
        // die();
        if (empty($name) || empty($address) || empty($salary) || !is_int($salary) || !preg_match("/[a-zA-Z][a-zA-Z]*/", $name)) {
            // var_dump(!preg_match("/[a-zA-Z][a-zA-Z\s]*$/", $name) || $name === false);
            // die();

            if (empty($_POST['name'])) {
                $_SESSION['error']['name'] = "Please enter a name ";
            } elseif (!preg_match("/[a-zA-Z][a-zA-Z\s]*$/", $name) || $name === false) {
                $_SESSION['error']['name'] = "Please enter a valid name ";
            }
            if (empty($address)) {
                $_SESSION['error']['address'] = "Please enter a address ";
            }
            if (!is_int($salary)) {
                $_SESSION['error']['salary'] = "Please enter a positive salary ammount";
            } elseif (empty($salary)) {
                $_SESSION['error']['salary'] = "Please enter a salary ammount";
            } elseif ($salary < 0) {
                $_SESSION['error']['salary'] = "Please enter a positive salary ammount";
            }
            $_SESSION['input']['salary'] = $salary;
            $_SESSION['input']['address'] = $address;
            $_SESSION['input']['name'] = $_POST['name'];
            return "Location: form.view.php ";
        } elseif ($salary < 0) {
            $_SESSION['error']['salary'] = "Please enter a positive salary ammount";
            $_SESSION['input']['salary'] = $salary;
            $_SESSION['input']['address'] = $address;
            $_SESSION['input']['name'] = $_POST['name'];
            return "Location: form.view.php ";
        }

        //elseif(!is_int($salary) || !is_string($name)){
        //     if(!is_int($salary)){
        //         $_SESSION['error']['salary'] = "Please enter a positive salary ammount";
        //     }elseif ($salary < 0) {
        //         $_SESSION['error']['salary'] = "Please enter a positive salary ammount";
        //     }

        //     if(is_int($name)){
        //         $_SESSION['error']['name'] = "Please enter a valid name ";
        //     }
        //     $_SESSION['input']['salary']=$salary;
        //     $_SESSION['input']['address']=$address;
        //     $_SESSION['input']['name']=$_POST['name'];
        //     return "Location: form.view.php ";
        // } 

        $sql = "insert into employee(name,address,salary) values(?,?,?);";

        $prepare = $connection->prepare($sql);

        $prepare->bind_param('ssi', $name, $address, $salary);
        if ($prepare->execute()) {
            var_dump("Reach here");
            return "Location: index.php";
        } else {
            // header("Location : form.html ");
            echo mysqli_error($connection);
        }
    }
}



header(dowork());
