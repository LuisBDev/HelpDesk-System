$(document).on("click", "#btnactualizar", function () {
    let txtpass = $('#txtpass').val();
    let txtpassnew = $('#txtpassnew').val();
    let usu_id = $('#usu_id').val();

    if (txtpass.length == 0 || txtpassnew.length == 0) {
        swal("HelpDesk", "Rellene todos los campos!", "error")
    }
    else if (txtpass !== txtpassnew) {
        swal("HelpDesk", "Las contraseñas no coinciden!", "error")
    }
    else {
        $.post("../../controller/usuario.php?op=password", { usu_id: usu_id, usu_pass: txtpassnew }, function (data) {
            swal("HelpDesk", "Contraseña actualizada!!", "success")
        });
    }
});

