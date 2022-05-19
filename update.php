<?php
require "./connection.php";
require "./helper.php";
set_exception_handler("handle");
set_error_handler('handle');
function doGet(int $i)
{
    try {
        global $connection;

        // $id = check_id();
        // if ($id === false) {
        //     throw new Exception();
        // }
        $prepare = $connection->prepare("SELECT * FROM employee WHERE id=? ");
        // var_dump("ok");
        $prepare->bind_param("i", $i);

        if ($prepare->execute()) {
            // var_dump("ok");

            $result = $prepare->get_result();
            if (mysqli_num_rows($result) > 0) {
                // var_dump("ok");

                $data = mysqli_fetch_assoc($result);
                include_once "./update.view.php";
            }
        } else {
            throw new Exception();
        }

        mysqli_free_result($result);
        mysqli_close($connection);
    } catch (Exception $e) {
        throw new Exception();
    }
}

function doPost(int $id)
{
    /** 
     *  errors 
     *  Please enter a name 
     *  Please enter a address
     *  Please enter a salary ammount
     * 
     *  Plase enter a positive salary ammount 
     *  Please enter a valid name
     * */
    global $connection;
    try {
        
        if (isset($_POST['submit'])) {
            $name = filter_input(INPUT_POST, "name", FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[a-zA-Z][a-zA-Z\s]*/")));
            // $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
            $salary = filter_input(INPUT_POST, "salary", FILTER_VALIDATE_INT);
            $address = htmlspecialchars($_POST['address']);
            // var_dump(empty($name) || empty($address) || empty($salary) || !is_int($salary));
            // var_dump(empty($name));
            // var_dump($name);
            // var_dump( !is_int($salary));
            //  var_dump(preg_match_all("/[a-zA-Z][a-zA-Z\s]*/",$name));
            // die();
            if (empty($name) || empty($address) || empty($salary) || !is_int($salary) || !preg_match("/[a-zA-Z][a-zA-Z\s]*/", $name)) {
                // var_dump(!preg_match("/[a-zA-Z][a-zA-Z\s]*$/", $name) || $name === false);
                // die();

                if (empty($_POST['name'])) {
                    $error['name'] = "Please enter a name ";
                } elseif (!preg_match("/[a-zA-Z][a-zA-Z\s]*$/", $name) || $name === false) {
                    $error['name'] = "Please enter a valid name ";
                }
                if (empty($address)) {
                    $error['address'] = "Please enter a address ";
                }
                if (!is_int($salary)) {
                    $error['salary'] = "Please enter a positive salary ammount";
                } elseif (empty($salary)) {
                    $error['salary'] = "Please enter a salary ammount";
                } elseif ($salary < 0) {
                    $error['salary'] = "Please enter a positive salary ammount";
                }
                $data['id'] = $id;
                $data['salary'] = $salary;
                $data['address'] = $address;
                $data['name'] = $_POST['name'];
                include_once "./update.view.php";
                die();
            } elseif ($salary < 0) {
                $error['salary'] = "Please enter a positive salary ammount";
                $data['id'] = $id;
                $data['salary'] = $salary;
                $data['address'] = $address;
                $data['name'] = $_POST['name'];
                include_once "./update.view.php";
                die();
            }

            //elseif(!is_int($salary) || !is_string($name)){
            //     if(!is_int($salary)){
            //         $error['salary'] = "Please enter a positive salary ammount";
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

            $sql = "UPDATE employee SET name=?,address=?,salary=? WHERE id=?;";

            $prepare = $connection->prepare($sql);

            $prepare->bind_param('ssii', $name, $address, $salary,$id);
            if ($prepare->execute()) {
                var_dump("Reach here");
                // printf("%d Row inserted.\n", $prepare->affected_rows);
                mysqli_close($connection);
                // die();
                return "Location: index.php";
            } else {
                // header("Location : form.html ");
                echo mysqli_error($connection);
                mysqli_close($connection);
                die();
            }
        }
    } catch (Exception $e) {
        throw new Exception();
    }
}
try{
$id = check_id();
if ($id === false) {
    throw new Exception();
}
// var_dump($_SERVER);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = check_id();
    if ($id === false) {
        throw new Exception();
    }
    doGET($id);
} else {
    $id = check_id_post();
    if ($id === false) {
        throw new Exception();
    }
    var_dump($id);
    header(doPost($id));
}

}catch(Exception $e){
    throw new Exception();
}

