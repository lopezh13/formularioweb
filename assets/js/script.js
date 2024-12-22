$(document).ready(function () {
    // Inicializar DataTable para la tabla
    $('#registrosTable').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' // Traducción al español
        },
        responsive: true
    });

    // Confirmación del formulario usando SweetAlert2
    $('#formulario').on('submit', function (e) {
        e.preventDefault();

        const form = this;

        Swal.fire({
            title: '¿Deseas registrar la información?',
            text: "Asegúrate de que los datos sean correctos.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, registrar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Registro exitoso',
                    text: 'Los datos han sido enviados correctamente.',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });

                setTimeout(() => {
                    form.submit();
                }, 2000);
            }
        });
    });

    // Controlar dinámicamente el atributo 'required'
    $('.toggle-required').on('change', function () {
        const targetField = $($(this).data('target'));
        if ($(this).is(':checked')) {
            targetField.attr('required', 'required');
        } else {
            targetField.removeAttr('required');
        }
    });
});
