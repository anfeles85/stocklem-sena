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
