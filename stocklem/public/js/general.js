$(document).ready(function () {
    const dataTableOptions = {
        pageLength: 10,
        lengthChange: false,
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
    };

    $('#table_data').DataTable(dataTableOptions);
});

