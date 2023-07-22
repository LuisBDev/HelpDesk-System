<?php
if(isset($_POST['salir'])) {
    // Realiza aquí las acciones necesarias para cerrar la sesión o finalizar la aplicación

    // Redirige a una página de despedida o a donde lo necesites
    header("Location: index.php");
    exit();
}
?>
