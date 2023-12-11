window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }

    $('#datatablesSimple')
    .DataTable(
            {
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "pagingType": "full_numbers",

                "language": {
                    "lengthMenu": "Mostrar _MENU_ Registros por pagina",
                    "zeroRecords": "No hay datos",
                    "info": "datos pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay datos disponibles",
                    "infoFiltered": "(filtrado por _MAX_ total registros)",
                    "sSearch": "Buscar",

                    "oPaginate": {
                        "sFirst": "Primero",
                        "sPrevious": "Anterior",
                        "sNext": "Siguiente",
                        "sLast": "Ultimo",

                    }
                }

            });

    
});
