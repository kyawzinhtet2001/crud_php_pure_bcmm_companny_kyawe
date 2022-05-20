<?php
// session_start();

require_once './unloggedin.php';


require "./helper.php";
function doGet()
{
    include_once './views/login.view.php';
}

function doPost()
{
    require_once "connection.php";

    $name = htmlspecialchars($_POST["name"]);
    $password = htmlspecialchars($_POST['password']);
    $mmpassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM user WHERE name=?;";
    $prepare = $connection->prepare($sql);
    $prepare->bind_param("s", $name);
    if ($prepare->execute()) {

        $result = $prepare->get_result();
        if (mysqli_num_rows($result) > 0) {
            $assoc = mysqli_fetch_assoc($result);
            if (password_verify($password, $assoc["password"])) {
                session_regenerate_id();
                login($assoc['name']);
                return "Location: index.php";
            } else {
                $error = [
                    "password" => "Password is invalid",
                ];
                include_once "./views/login.view.php";
                die();
            }
        } else {
            $error = [
                "name" => "Username is invalid",
            ];
            include_once "./views/login.view.php";
            die();
        }
    }
}


if (strtolower($_SERVER['REQUEST_METHOD']) === "post") {

    header(doPost());
} else {
    doGet();
}
