$(document).ready(function () {
    // Verificar si existe la tabla con ID específico
    if ($('#table_active_inactive').length) {
        // Obtener el índice de la columna estado desde un atributo data
        var statusColumnIndex = $('#table_active_inactive').data('status-column') || 4;
        
        // Inicializar DataTable con configuración personalizada
        $('#table_active_inactive').DataTable({
            pageLength: 10,
            lengthChange: false,
            dom: 'Bfrtip',
            order: [[statusColumnIndex, 'asc']], // Ordenar por columna ESTADO
            buttons: [
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-sucess mt-2 ml-1 btn-sm custom-excel-btn',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                }
            ],
            language: {
                paginate: {
                    previous: "Anterior",
                    next: "Siguiente"
                },
                search: "Buscar:",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty: "",
                emptyTable: "No existen registros"
            }
        });
    }
});