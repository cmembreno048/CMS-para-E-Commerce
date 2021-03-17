document.addEventListener("DOMContentLoaded", function(event) {

    let url = "https://cdn.ingelmec.smartappshn.com/platform/";

    $('#table_id').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [{
                extend: 'excelHtml5',
                title: 'Report de usuarios Excel',
                messageTop: 'Usuarios registrados en ingelmec',
            },
            {
                extend: 'pdfHtml5',
                title: 'Reporte de usuarios',
                messageTop: 'Usuarios registrados en ingelmec',
            }
        ],
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Elementos",
            "infoEmpty": "Mostrando 0 to 0 de 0 Documentos",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Documentos",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});