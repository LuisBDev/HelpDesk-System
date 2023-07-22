<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {

$conexion = new PDO("mysql:host=localhost;dbname=sgi_helpdesk", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados por el formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    // Insertar los datos en la tabla tm_usuario
    $consultaInsertar = $conexion->prepare("INSERT INTO tm_usuario (usu_nom, usu_ape, usu_correo, usu_pass, rol_id) VALUES (?, ?, ?, ?, ?)");
    $consultaInsertar->execute([$nombre, $apellido, $correo, $contraseña, $rol]);

    // Redireccionar a la página que muestra la tabla actualizada
    header("Location: ../MntUsuario");
    exit();
}
?>
    <!DOCTYPE html>
    <html>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    <?php require_once("../MainHead/head.php"); ?>
    <title>SGI - Mantenimiento Usuario</title>
    </head>

    <body class="with-side-menu">

        <?php require_once("../MainHeader/header.php"); ?>

        <div class="mobile-menu-left-overlay"></div>

        <?php require_once("../MainNav/nav.php"); ?>

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
    <!-- Formulario para agregar un nuevo usuario -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required><br>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" required><br>

    <label for="correo">Correo:</label>
    <input type="email" name="correo" id="correo" required><br>

    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" id="contraseña" required><br>

    <label for="rol">Rol:</label>
    <input type="text" name="rol" id="rol" required><br>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
</div>
        </tbody>
    </table>
</div>


            </div>
        </div>
        <!-- Contenido -->

        <?php require_once("modalmantenimiento.php"); ?>

        <?php require_once("../MainJs/js.php"); ?>

        <script type="text/javascript" src="mntusuario.js"></script>

    </body>

    </html>
<?php
} else {
    $conectar = new Conectar();
    header("Location:" . $conectar->ruta() . "index.php");
}
?>