<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="stylesheet" href="dist/assets/css/login/login.css">
    <link rel="icon" href="dist/assets/img/login/icon.png" type="image/png">
    <title>Polleria | Franco Chicken </title>
</head>

<body>
    <div class="container">
        <form id="form-login">
            <h1 class="text-center">Bienvenido</h2>
                <div id="mensaje" class="mensaje">
                    <span>Complete los campos con los datos correspondientes</span>
                </div>
                <div class="input-group">
                    <label class="label">Correo Electronico</label>
                    <input autocomplete="off" name="email" id="email" class="input" type="email">
                    <div></div>
                </div>

                <div class="input-group">
                    <label class="label">Contraseña</label>
                    <input autocomplete="off" name="password" id="password" class="input" type="password">
                    <div></div>
                </div>

                <button id="btnIngresar">Ingresar </button>
        </form>
    </div>

    <!-- Jquery -->
    <script src="dist/assets/vendors/jquery/jquery.min.js"></script>
    <!-- En realidad es para el redirecionamiento -->
    <script src="dist/assets/js/global/login/redirect.js"></script>
    <!-- Controller: login.js -->
    <script src="dist/assets/js/global/login/login.js"></script>
</body>

</html>
