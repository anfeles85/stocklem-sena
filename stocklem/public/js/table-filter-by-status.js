$(document).ready(function () {
    // Inicializar DataTable con configuración personalizada para personas
    $('#table_active_inactive').DataTable({
        pageLength: 10,
        lengthChange: false,
        dom: 'Bfrtip',
        order: [[4, 'asc']], // Ordenar por columna ESTADO (índice 4) ascendente
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
});