<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="modalclave" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <br>
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="font-icon-close-2"></i>
                    </button>


                    <h5>Editar Clave </h5>
                </div>

                <form method="post" id="usuario_form_clave">
                    <div class="modal-body"> <!-- Agrega esta clase al cuerpo del modal para estilizarlo -->

                        <input type="hidden" id="usu_id" name="usu_id">

                        <div class="form-group"> <!-- Agrega la clase "mb-4" para agregar margen inferior -->
                            <label class="form-label" for="usu_pass">Introducir Contraseña</label>
                            <input type="text" class="form-control" id="usu_pass" name="usu_pass" placeholder="************" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" name="action" id="btnModalClave" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>