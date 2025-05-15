document.addEventListener('DOMContentLoaded', function() {
    // Confirmar antes de eliminar
    document.querySelectorAll('a[href*="remove"]').forEach(link => {
        link.addEventListener('click', function(e) {
            if (!confirm('¿Seguro que quieres eliminar este producto?')) {
                e.preventDefault();
            }
        });
    });
});

