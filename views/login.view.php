<?php 
    require_once './unloggedin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container-md">
        <div class="h2 px-4 py-3">Login

        </div>
        <hr>
        <div class="h4 py-1 px-4"> Please fill your credential to login</div>
        <form class='p-2' action="./login.php" method="post" id="login">
            <div class="m-2">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="UserName" value="<?php if (isset($name)) echo $name; ?>" />
                <div class="text-danger" id="error-name">
                    <?php if (isset($error["name"])) {
                        echo '' . $error["name"] . '';
                    }
                    ?>
                </div>
            </div>
            <div class="m-2">
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php if (isset($password)) echo $password; ?>" />
                <div class="text-danger" id="error-password">
                    <?php if (isset($error["password"])) {
                        echo '' . $error["password"] . ' ';
                    }
                    ?>
                </div>
            </div>
            <div class="m-2">
                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Login" />
                <input type="reset" id="reset" class="btn btn-primary" value="Reset" />
            </div>
        </form>
        <div class="m-2"> Don't have account? <a href="./signup.php" class='text-decoration-none'>Sign up now.</a>
        </div>
    </div>
    <script>
        let name = document.getElementById('name');
        let password = document.getElementById('password');
        let signupform = document.getElementById("login");

        signupform.onsubmit = (event) => {
            let name_value = name.value;
            let password_value = password.value;
            // event.preventDefault();
            if (name_value === "" || password_value === "") {
                if (name_value === "") {
                    let nameerror = document.getElementById("error-name");
                    nameerror.innerHTML = "Please Enter Name";
                }
                if (password_value === "") {
                    let nameerror = document.getElementById("error-password");
                    nameerror.innerHTML = "Please enter Password."
                }
                event.preventDefault();
            }
        }

        name.onkeyup = (event) => {
            if (event.target.value !== "") {
                let nameerror = document.getElementById("error-name");
                nameerror.innerHTML = ""
            }
        }
        password.onkeyup = (event) => {
            if (event.target.value !== "") {
                let nameerror = document.getElementById("error-password");
                nameerror.innerHTML = ""
            }
        }

        let reset = document.getElementById("reset");
        reset.onclick = (e) => {
            e.preventDefault();
            name.value = "";
            password.value = "";
        }
    </script>
</body>

</html>