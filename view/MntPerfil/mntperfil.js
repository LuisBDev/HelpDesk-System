$(document).on("click", "#btnActualizarPass", function () {

    let txtPassAntigua = $('#txtPassAntigua').val();
    let txtPassNueva = $('#txtPassNueva').val();

    let usu_id = $('#usu_id').val();


    if (txtpass.length == 0 || txtpassnew.length == 0) {
        swal("HelpDesk", "Rellene todos los campos!", "error")
    }
    else if (txtpass !== usu_pass) {
        swal("HelpDesk", "Las contraseñas no coinciden!", "error")
    }
    else {
        $.post("../../controller/usuario.php?op=password", { usu_id: usu_id, usu_pass: txtpassnew }, function (data) {
            swal("HelpDesk", "Contraseña actualizada!!", "success")
        });
    }
});

$(document).on("click", "#btnActualizarCorreo", function () {

    let usu_id = $('#usu_id').val();

    $.post("../../controller/usuario.php?op=get_user_correo", { usu_id: usu_id }, function (data) {
        data = JSON.parse(data);
        let correo = data.usu_correo;


        let txtCorreo = $('#txtCorreoAntiguo').val();

        if (txtCorreo === correo) {

            let txtCorreoNuevo = $('#txtCorreoNuevo').val();
            $.post("../../controller/usuario.php?op=actualizar_correo", { usu_id: usu_id, usu_correo: txtCorreoNuevo }, function (data) {

            });

            swal("HelpDesk", "Correo actualizado!!", "success");
        } else {
            swal("HelpDesk", "El correo antiguo no coincide!!", "error")
        }


    });







});


