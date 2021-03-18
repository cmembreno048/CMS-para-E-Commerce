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

    let editor = document.getElementById('editor');
    if (editor) {
        editor_Init(editor);
    }

    let blog_image = document.getElementById('blog_image');

    if (blog_image) {
        blog_image.addEventListener('change', function() {
            readImage(this);
        });
    }


});
// function to initialize
function editor_Init(field) {
    CKEDITOR.replace(field, {
        toolbar: [
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo'] },
            { name: 'basicstyles', items: ['Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'Link', 'Unlink', 'Blockquote'] },
            { name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source'] },
        ]
    });
}


function readImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img_pbl').removeClass("hide");
            $('#img_pbl').attr('src', e.target.result); // Renderizamos la imagen
        }
        reader.readAsDataURL(input.files[0]);
    }
}