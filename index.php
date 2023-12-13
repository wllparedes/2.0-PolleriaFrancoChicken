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
    <div class="wrapper">
        <form id="form-login">
            <h1>Bienvenido</h1>
            <div id="mensaje" class="mensaje">
                <span>Complete los campos con los datos correspondientes</span>
            </div>
            <div class="input-box">
                <input autocomplete="off" name="email" id="email" type="email" placeholder="Correo electronico">
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input autocomplete="off" name="password" id="password" type="password" placeholder="Contraseña">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <button id="btnIngresar" class="btn">Ingresar</button>
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