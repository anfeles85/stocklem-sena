/**
 * Ventana de confirmación para eliminar por id
 * @param {*} id 
 */
function removeId(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡Esta acción no se puede deshacer!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('form-delete-' + id).submit();
        }
    });
}

/**
 * Ventana de confirmación para eliminar permanentemente
 * @param {*} id 
 */
function removePermanently(id) {
    Swal.fire({
        title: '⚠️ ADVERTENCIA DE ELIMINACIÓN PERMANENTE',
        html: '<div style="text-align: left;">' +
              '<b style="color: #d33; font-size: 1.1em;">Esta acción es IRREVERSIBLE y tendrá las siguientes consecuencias:</b><br><br>' +
              '<ul style="margin: 0;">' +
              '<li>El registro será eliminado <b>PERMANENTEMENTE</b></li>' +
              '<li><b style="color: #d33;">Todos los registros relacionados en otras tablas también serán eliminados</b></li>' +
              '<li>Los datos NO se podrán recuperar una vez eliminados</li>' +
              '</ul><br>' +
              '<b>¿Estás completamente seguro de que deseas continuar?</b>' +
              '</div>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '⚠️ Sí, eliminar permanentemente',
        cancelButtonText: 'No, cancelar',
        allowOutsideClick: false,
        focusCancel: true,
        customClass: {
            popup: 'swal-wide'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('form-delete-' + id).submit();
        }
    });
}

function showSuccess(message) {
    Swal.fire({
        icon: 'success',
        title: 'Exito',
        text: message,
        showConfirmButton: false,
        timer: 2000
    })
}
function showError(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: message,
        showConfirmButton: false,
        timer: 2000
    })
}
