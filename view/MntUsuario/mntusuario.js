var tabla;

function init() {
    $("#usuario_form").on("submit", function (e) {
        guardaryeditar(e);
    });
    $("#usuario_form_clave").on("submit", function (e) {
        guardaryeditarClave(e);
    });
    $("#usuario_form_nuevo").on("submit", function (e) {
        guardaryeditarNuevo(e);
    });


}

function guardaryeditar(e) {
    e.preventDefault();
    let formData = new FormData($("#usuario_form")[0]);

    let usu_pass = $('#usu_pass').val();
    formData.append('usu_pass', usu_pass); // Agregar usu_pass al formData


    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            console.log(datos);
            $('#usuario_form')[0].reset();
            $("#modalmantenimiento").modal('hide');
            $('#usuario_data').DataTable().ajax.reload();

            swal({
                title: "HelpDesk!",
                text: "Completado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}


function guardaryeditarNuevo(e) {
    e.preventDefault();
    let formData = new FormData($("#usuario_form_nuevo")[0]);

    let usu_pass = formData.get('usu_pass');
    formData.append('usu_pass', usu_pass); // Agregar usu_pass al formData


    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            console.log(datos);
            $('#usuario_form_nuevo')[0].reset();
            $("#modalcrearnuevo").modal('hide');
            $('#usuario_data').DataTable().ajax.reload();

            swal({
                title: "HelpDesk!",
                text: "Completado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}



$(document).ready(function () {
    tabla = $('#usuario_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ajax": {
            url: '../../controller/usuario.php?op=listar',
            type: "post",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();
});

function editar(usu_id) {
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/usuario.php?op=mostrar", { usu_id: usu_id }, function (data) {
        data = JSON.parse(data);
        $('#usu_id').val(data.usu_id);
        $('#usu_nom').val(data.usu_nom);
        $('#usu_ape').val(data.usu_ape);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_pass').val(data.usu_pass);
        $('#rol_id').val(data.rol_id).trigger('change');
    });

    $('#modalmantenimiento').modal('show');
}

function editarclave(usu_id) {
    $('#mdltitulo').html('Editar Clave');

    $.post("../../controller/usuario.php?op=mostrar", { usu_id: usu_id }, function (data) {
        data = JSON.parse(data);
        $('#usu_id').val(data.usu_id);

        // Mostrar el modal después de cargar los datos
        $('#modalclave').modal('show');

        // Esperar al clic del botón con ID btnModalClave
        let btnModalClave = document.getElementById('btnModalClave');
        let promise = new Promise(function (resolve) {
            btnModalClave.addEventListener('click', function () {
                resolve();
            });
        });


        promise.then(function () {
            let usu_pass = $('#usu_pass').val();

            if (usu_pass.trim() == '') {

                swal({
                    title: "HelpDesk!",
                    text: "Ingrese una clave.",
                    type: "error",
                    confirmButtonClass: "btn-danger"
                });

                return;
            }
            $.post("../../controller/usuario.php?op=update_user_pass", { usu_id: usu_id, usu_pass: usu_pass }, function (data) {
                $('#usuario_form_clave')[0].reset();
                $("#modalclave").modal('hide');
                $('#usuario_data').DataTable().ajax.reload();

                swal({
                    title: "HelpDesk!",
                    text: "Clave Cambiada!",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            });
        });
    });
}



function eliminar(usu_id) {
    swal({
        title: "HelpDesk",
        text: "Esta seguro de Eliminar el registro?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
        function (isConfirm) {
            if (isConfirm) {
                $.post("../../controller/usuario.php?op=eliminar", { usu_id: usu_id }, function (data) {

                });

                $('#usuario_data').DataTable().ajax.reload();

                swal({
                    title: "HelpDesk!",
                    text: "Registro Eliminado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            }
        });
}

$(document).on("click", "#btnnuevo", function () {
    $('#mdltitulo').html('Nuevo Registro');
    $('#usuario_form_nuevo')[0].reset();
    // $('#modalmantenimiento').modal('show');
    $('#modalcrearnuevo').modal('show');

});

init();