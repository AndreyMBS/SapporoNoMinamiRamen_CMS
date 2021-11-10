<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="public/images/Logo.png" />
    <link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="public/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="public/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="public/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="public/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="public/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="public/css/util.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

</head>

<body>
    <div class="container-login100" style="background-image: url('../public/images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="POST" action="?controlador=Login&accion=ingresar">
                <span class="login100-form-title p-b-37">
                    Sign In
                </span>
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
                    <input class="input100" type="text" name="username" placeholder="username">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <input class="input100" type="password" name="pass" placeholder="password">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Sign In
                    </button>
                </div>
                <div class="text-center">
                    <a href="#" class="txt2 hov1">
                        Registrar nuevo
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
    <script src="public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="public/vendor/animsition/js/animsition.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/vendor/select2/select2.min.js"></script>
    <script src="public/vendor/daterangepicker/moment.min.js"></script>
    <script src="public/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="public/vendor/countdowntime/countdowntime.js"></script>
    <script src="public/js/main.js"></script>

</body>

</html>