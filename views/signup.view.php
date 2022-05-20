<?php 
    require_once './unloggedin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container-md">
        <div class="h2 py-3 px-2">Signup</div>
        <hr>
        <div class="h4 py-3 px-2"> Please fill your credential to create a account</div>
        <form class='p-2' action="./signup.php" method="post" id="form_signup">
            <div class="m-2">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="UserName" value="<?php if (isset($name)) echo $name; ?>" />
                <div class="text-danger" id="error-name">
                    <?php if (isset($error)) {
                        echo '' . $error["name"] . ' ';
                    }

                    ?>
                </div>
            </div>
            <div class="m-2">
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                <div class="text-danger" id="error-password"></div>
            </div>
            <div class="m-2">
                <label class="form-label" for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" />
                <div class="text-danger" id="error-confirm-password"></div>
            </div>
            <div class="m-2">
                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Sign Up" />
                <input type="reset" class="btn btn-primary" id="reset" value="Reset" />
            </div>
        </form>
        <div class="m-2"> Already have a account? <a href="./login.php" class='text-decoration-none'>Login here.</a> </div>

        <script>
            let name = document.getElementById('name');
            let password = document.getElementById('password');
            let confirm_password = document.getElementById('confirm_password');
            let signupform = document.getElementById("form_signup");

            signupform.onsubmit = (event) => {
                let name_value = name.value;
                let password_value = password.value;
                let confirm_password_value = confirm_password.value;
                console.log(name_value === "" || password_value === "" || password_value.length < 7 || confirm_password_value === "" || password_value !== confirm_password_value);
                if (name_value === "" || password_value === "" || password_value.length < 7 || confirm_password_value === "" || password_value !== confirm_password_value) {

                    if (name_value === "") {
                        let nameerror = document.getElementById("error-name");
                        name.className=""
                        nameerror.innerHTML = "Please Enter Name."
                    }
                    if (password_value === "") {
                        let nameerror = document.getElementById("error-password");
                        nameerror.innerHTML = "Please Enter Password."
                    } else if (password_value.length < 7) {
                        let nameerror = document.getElementById("error-password");
                        nameerror.innerHTML = "Password must be 6 characters."
                    }
                    if (confirm_password_value === "") {
                        let nameerror = document.getElementById("error-confirm-password");
                        nameerror.innerHTML = "Please Enter ConfirmPassword."
                    }else if (confirm_password_value !== "" && password_value !== confirm_password_value) {
                        // let passworderror = document.getElementById("error-password");
                        // passworderror.innerHTML = "Password not same with ConfirmPassword"
                        let password_confirmerror = document.getElementById("error-confirm-password");
                        password_confirmerror.innerHTML = "Password did not match."
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
            confirm_password.onkeyup = (event) => {
                if (event.target.value !== "") {
                    let nameerror = document.getElementById("error-confirm-password");
                    nameerror.innerHTML = ""
                }
            }

            let reset = document.getElementById("reset");
            reset.onclick = (e) => {
                e.preventDefault();
                name.value = "";
                password.value = "";
                confirm_password.value = "";
            }
        </script>
    </div>
</body>

</html>