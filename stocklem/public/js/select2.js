$(document).ready(function () {
    $('.js-example-placeholder-single').select2({
        placeholder: "Seleccione",
        allowClear: true,
        language: {
            noResults: function () {
                return "No se encontraron resultados";
            },
            searching: function () {
                return "Buscando...";
            }
        }
    });
});