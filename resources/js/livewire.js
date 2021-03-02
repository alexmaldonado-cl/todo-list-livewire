window.livewire.on('triggerDelete', dato_id => {
    Swal.fire({
        title: '¿Estás seguro de que deseas borrar este registro?',
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true,
    }).then((result) => {
        if (result.value) {
            window.livewire.emit('destroy',dato_id)
        }
    });
});
