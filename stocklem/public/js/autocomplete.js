$(function () {

    // ======= FUNCION GENERAL PARA CADA CAMPO DE AUTOCOMPLETADO ======= //
    function initAutocomplete(config) {
        const {
            inputId,
            hiddenId,
            clearId,
            arrowId,
            sourceList
        } = config;

        let isOpen = false;

        $(`#${inputId}`).autocomplete({
            source: sourceList,
            minLength: 0,
            select: function (event, ui) {
                $(`#${hiddenId}`).val(ui.item.value);
                $(`#${inputId}`).val(ui.item.label);
                $(`#${clearId}`).show();
                return false;
            },
            open: function () {
                $(`#${arrowId}`).removeClass("fa-chevron-down").addClass("fa-chevron-up");
                isOpen = true;
            },
            close: function () {
                $(`#${arrowId}`).removeClass("fa-chevron-up").addClass("fa-chevron-down");
                isOpen = false;
            }
        });

        $(`#${inputId}`).on("click", function () {
            if (isOpen) {
                $(this).autocomplete("close");
            } else {
                $(this).autocomplete("search", $(this).val());
            }
        });

        const oldValue = $(`#${hiddenId}`).val();
        if (oldValue) {
            const match = sourceList.find(item => item.value == oldValue);
            if (match) {
                $(`#${inputId}`).val(match.label);
                $(`#${clearId}`).show();
            }
        }

        $(`#${clearId}`).on("click", function () {
            $(`#${inputId}`).val("").blur();
            $(`#${hiddenId}`).val("");
            $(this).hide();
            $(`#${arrowId}`).removeClass("fa-chevron-up").addClass("fa-chevron-down");
            isOpen = false;
        });

        $(`#${inputId}`).on("input", function () {
            if (!$(this).val()) {
                $(`#${clearId}`).hide();
            }
        });
    }

    // Inicializamos los autocompletados para cada campo
    initAutocomplete({
        inputId: "presentation_description",
        hiddenId: "presentation_id",
        clearId: "presentation_clear",
        arrowId: "presentation_arrow",
        sourceList: presentations
    });

    initAutocomplete({
        inputId: "category_name",
        hiddenId: "category_id",
        clearId: "category_clear",
        arrowId: "category_arrow",
        sourceList: categories
    });

    initAutocomplete({
        inputId: "supplier_name",
        hiddenId: "supplier_id",
        clearId: "supplier_clear",
        arrowId: "supplier_arrow",
        sourceList: suppliers
    });

    initAutocomplete({
        inputId: "unit_name",
        hiddenId: "unit_id",
        clearId: "unit_clear",
        arrowId: "unit_arrow",
        sourceList: units
    });
});