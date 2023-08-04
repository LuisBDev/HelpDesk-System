$(document).on("click", "#btnActualizarPass", function () {

    let usu_id = $('#usu_id').val();

    let txtPass = $('#txtPassAntigua').val();
    let txtPassNueva = $('#txtPassNueva').val();

    $.post("../../controller/usuario.php?op=get_user_pass", { usu_id: usu_id }, function (data) {
        data = JSON.parse(data);
        let usu_pass = data.usu_pass;

        if (txtPass.length == 0 || txtPassNueva.length == 0) {
            swal("HelpDesk", "Rellene todos los campos!!", "error");
        }
        else if (txtPass !== usu_pass) {
            swal("HelpDesk", "La contraseña antigua no coincide !!", "error");
        }
        else {
            $.post("../../controller/usuario.php?op=update_user_pass", { usu_id: usu_id, usu_pass: txtPassNueva }, function (data) {
                swal("HelpDesk", "Contraseña Actualizada !!", "success");
            })
        }
    })
    $('#txtPassAntigua').val("")
    $('#txtPassNueva').val("");


});

$(document).on("click", "#btnActualizarCorreo", function () {

    let usu_id = $('#usu_id').val();
    let txtCorreo = $('#txtCorreoAntiguo').val();
    let txtCorreoNuevo = $('#txtCorreoNuevo').val();

    if (txtCorreo.length == 0 || txtCorreoNuevo.length == 0) {
        swal("HelpDesk", "Rellene todos los campos!", "error");
        return;
    }


    $.post("../../controller/usuario.php?op=get_user_correo", { usu_id: usu_id }, function (data) {
        data = JSON.parse(data);
        let txtCorreoAntiguo = data.usu_correo;

        if (txtCorreo === txtCorreoAntiguo) {

            $.post("../../controller/usuario.php?op=actualizar_correo", { usu_id: usu_id, usu_correo: txtCorreoNuevo }, function (data) {

            });

            swal("HelpDesk", "Correo actualizado!!", "success");
            $('#txtCorreoAntiguo').val('');
            $('#txtCorreoNuevo').val('');
        } else {
            swal("HelpDesk", "El correo antiguo no coincide!!", "error")
        }


    });

});


