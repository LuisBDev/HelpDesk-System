<?php
require_once "../../config/conexion.php";
if (isset($_SESSION["usu_id"])) {
?>
    <!DOCTYPE html>
    <html>
    <?php require_once "../MainHead/head.php"; ?>
    <title>SGI - Cambiar Perfil</title>
    </head>

    <body class="with-side-menu">

        <?php require_once "../MainHeader/header.php"; ?>

        <div class="mobile-menu-left-overlay"></div>

        <?php require_once "../MainNav/nav.php"; ?>

        <!-- Contenido -->
        <div class="page-content">
            <div class="container-fluid">

                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Cambiar Perfil</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Cambiar Perfil</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Inicio Cambio de Contraseña -->
                <div class="box-typical box-typical-padding">

                    <h5 class="m-t-lg with-border">Actualizar Contraseña</h5>

                    <div class="row">
                        <input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">

                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="exampleInput">Contraseña Antigua</label>
                                <input type="password" class="form-control" id="txtPassAntigua" name="txtpass" placeholder="Ingrese Contraseña Antigua">
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="exampleInput">Contraseña Nueva</label>
                                <input type="password" class="form-control" id="txtPassNueva" name="txtpassnew" placeholder="Ingrese Contraseña Nueva">
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <button id="btnActualizarPass" type="button" class="btn btn-rounded btn-inline btn-primary">Actualizar</button>
                        </div>
                    </div>

                </div>
                <!-- Fin Cambio de Contraseña -->

                <!-- Inicio Cambio de Correo -->
                <div class="box-typical box-typical-padding">

                    <h5 class="m-t-lg with-border">Actualizar Correo</h5>

                    <div class="row">
                        <input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">

                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="exampleInput">Correo Antiguo</label>
                                <input type="text" class="form-control" id="txtCorreoAntiguo" placeholder="Insertar Correo Antiguo">
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="exampleInput">Correo Nuevo</label>
                                <input type="text" class="form-control" id="txtCorreoNuevo" placeholder="Insertar Correo Actualizado">
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <button id="btnActualizarCorreo" type="button" class="btn btn-rounded btn-inline btn-primary">Actualizar</button>
                        </div>
                    </div>

                </div>
                <!-- Fin Cambio de Correo -->
            </div>
        </div>
        <!-- Contenido -->

        <?php require_once "../MainJs/js.php"; ?>

        <script type="text/javascript" src="mntperfil.js"></script>

    </body>

    </html>
<?php
} else {
    $conectar = new Conectar();
    header("Location:" . $conectar->ruta() . "index.php");
}
?>