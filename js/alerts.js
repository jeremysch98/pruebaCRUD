const flashdata = $('.flash-data').data('flashdata');

switch (flashdata) {
    case 1:
        Swal.fire({
            icon: 'success',
            title: 'Completado',
            text: 'Persona registrada exitosamente.',
        })
        break;
    case 2:
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ya existe una persona con el mismo DNI.',
        })
        break;
    case 3:
        Swal.fire({
            icon: 'success',
            title: 'Completado',
            text: 'Persona modificada exitosamente.',
        })
        break;
    case 4:
        Swal.fire({
            icon: 'warning',
            title: 'Cuidado',
            text: 'Ingrese un DNI válido',
        })
        break;
    case 5:
        Swal.fire({
            icon: 'warning',
            title: 'Cuidado',
            text: 'Ingrese un celular válido',
        })
        break;
    case 6:
        Swal.fire({
            icon: 'success',
            title: 'Completado',
            text: 'Persona eliminada correctamente.',
        })
        break;
}