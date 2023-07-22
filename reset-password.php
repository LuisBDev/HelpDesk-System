<?php
require_once "config/conexion.php";

?>

<!DOCTYPE html>
<html>

<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema de Gestión de Incidencias</title>

    <link href="public/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="public/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="public/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="public/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="public/img/favicon.png" rel="icon" type="image/png">
    <link href="public/img/favicon.ico" rel="shortcut icon">


    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">

                <form class="sign-box" action="validar_correo.php" method="POST" id="login_form">

                    <header class="sign-title">Recuperar contraseña</header>

                    <div class="form-group">
                        <input type="text" id="user_correo" name="user_correo" class="form-control" placeholder="E-Mail" pattern=".*@.*" title="El correo electrónico debe contener '@'" required />
                    </div>


                    <div class="form-group">
                        <div class="float-right reset">
                            <a href="recordad-correo.html">No recuerdo mi correo</a>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <input type="hidden" name="enviar" class="form-control" value="si">
                                <button type="submit" name="submit" class="btn btn-rounded">Enviar</button>
                            </div>
                            <div class="col-auto">
                                <button tpye="submit" name="salir" class="btn btn-rounded">Salir</button>
                            </div>
                        </div>
                    </div>



                </form>
                <form method="POST" action="salir.php">

                </form>
            </div>
        </div>
    </div><!--.page-center-->


</body>

</html>