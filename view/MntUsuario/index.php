<?php
require_once "../../config/conexion.php";
if (isset($_SESSION["usu_id"])) {
?>
    <!DOCTYPE html>
    <html>
    <?php require_once "../MainHead/head.php"; ?>
    <title>SGI - Mantenimiento Usuario</title>
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
                                <h3>Mantenimiento Usuario</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Mantenimiento Usuario</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="box-typical box-typical-padding">
                    <button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
                    <table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Nombre</th>
                                <th style="width: 10%;">Apellido</th>
                                <th class="d-none d-sm-table-cell" style="width: 40%;">Correo</th>
                                <th class="d-none d-sm-table-cell" style="width: 5%;">Contraseña</th>
                                <th class="d-none d-sm-table-cell" style="width: 5%;">Rol</th>
                                <th class="text-center" style="width: 5%;"></th>
                                <th class="text-center" style="width: 5%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conexion = new PDO("mysql:host=localhost;dbname=sgi_helpdesk", "root", "");


                            $consulta = $conexion->prepare("SELECT * FROM tm_usuario");
                            $consulta->execute();


                            if ($consulta->rowCount() > 0) {

                                while ($usuario = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>{$usuario['usu_nom']}</td>";
                                    echo "<td>{$usuario['usu_ape']}</td>";
                                    echo "<td class='d-none d-sm-table-cell'>{$usuario['usu_correo']}</td>";
                                    echo "<td class='d-none d-sm-table-cell'>{$usuario['usu_pass']}</td>";
                                    echo "<td class='d-none d-sm-table-cell'>{$usuario['rol_id']}</td>";
                                    echo "<td class='text-center'><a href='editar.php?id={$usuario['usu_id']}'><i class='fa fa-edit'></i></a></td>";
                                    echo "<td class='text-center'><a href='eliminar.php?id={$usuario['usu_id']}'><i class='fa fa-trash'></i></a></td>";
                                    echo "</tr>";
                                }
                            } else {

                                echo "<tr><td colspan='7'>No se encontraron registros</td></tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
        <!-- Contenido -->

        <?php require_once "modalmantenimiento.php"; ?>

        <?php require_once "../MainJs/js.php"; ?>

        <script type="text/javascript" src="mntusuario.js"></script>

    </body>

    </html>
<?php
} else {
    $conectar = new Conectar();
    header("Location:" . $conectar->ruta() . "index.php");
}
?>