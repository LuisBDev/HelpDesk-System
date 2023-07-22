<?php
if(isset($_POST['submit'])) {
    $correo = $_POST['user_correo'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sgi_helpdesk";

    $conn = new mysqli($servername, $username, $password, $dbname);

     // Verificar la conexión
     if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Insertar el correo en otra tabla
    $sql = "INSERT INTO solicitud_recuperacion (correo) VALUES ('$correo')";

    if ($conn->query($sql) === TRUE) {
        echo "El correo se ha guardado correctamente.";
    } else {
        echo "Error al guardar el correo: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
