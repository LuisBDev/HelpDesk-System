<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="font-icon-close-2"></i>
                    </button>
                    <h4 class="modal-title" id="mdltitulo"></h4>
                </div>
                <form method="post" id="usuario_form">
                    <div class="modal-body">
                        <input type="hidden" id="usu_id" name="usu_id">

                        <div class="form-group">
                            <label class="form-label" for="usu_nom">Nombre</label>
                            <input type="text" class="form-control" id="usu_nom" name="usu_nom" placeholder="Ingrese Nombre" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="usu_ape">Apellido</label>
                            <input type="text" class="form-control" id="usu_ape" name="usu_ape" placeholder="Ingrese Apellido" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="usu_correo">Correo Electronico</label>
                            <input type="email" class="form-control" id="usu_correo" name="usu_correo" placeholder="test@test.com" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="usu_pass">Contraseña Encriptada</label>
                            <input type="text" class="form-control" id="usu_pass" name="usu_pass" placeholder="************" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="rol_id">Rol</label>
                            <select class="select2" id="rol_id" name="rol_id">
                                <option value="1">Usuario</option>
                                <option value="2">Soporte</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" name="action" id="btnModalGuardar" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<script>
    // Función para verificar si la contraseña está encriptada con password_hash
    function isPasswordHashed(password) {
        return password.startsWith("$2y$") || password.startsWith("$2a$") || password.startsWith("$2b$");
    }

    // Evento click del botón de guardar
    document.getElementById("btnModalGuardar").addEventListener("click", function(event) {
        var passwordInput = document.getElementById("usu_pass");
        var passwordValue = passwordInput.value;

        // Verificar si la contraseña está encriptada
        if (isPasswordHashed(passwordValue)) {
            event.preventDefault(); // Evitar el envío del formulario
            // Mostrar mensaje de error con SweetAlert
            swal("Error", "No se permite guardar contraseñas encriptadas.", "error");
        }
    });
</script>