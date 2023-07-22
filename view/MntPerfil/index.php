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

                <div class="box-typical box-typical-padding">
                    <p>
                        Desde esta ventana podra generar una nueva contraseña.
                    </p>

                    <h5 class="m-t-lg with-border">Ingresar Información</h5>

                    <div class="row">
                        <input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">

                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="exampleInput">Cambiar Contraseña</label>
                                <input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="Ingrese Contraseña">
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="exampleInput">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="txtpassnew" name="txtpassnew" placeholder="Ingrese Contraseña">
                            </fieldset>
                        </div>

                        <div class="col-lg-12">
                            <button id="btnactualizar" type="button" class="btn btn-rounded btn-inline btn-primary">Actualizar</button>
                        </div>
                    </div>

                </div>
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