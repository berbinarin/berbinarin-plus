@vite("resources/js/app.js")

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<!-- Initialize DataTables -->
<script>
$(document).ready(function() {
    $('table.display').DataTable({
        responsive: true,
    });
});
</script>

<!-- Other existing scripts -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let successMessage = @json(session('success'));
    let errorMessage = @json(session('error'));

    if (successMessage) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: successMessage,
            showConfirmButton: false,
            timer: 3000
        });
    }

    if (errorMessage) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: errorMessage,
            showConfirmButton: false,
            timer: 3000
        });
    }
</script>

<script>
    document.querySelectorAll('.delete-button').forEach((button) => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const formId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Hapus Data',
                text: 'Apakah anda yakin menghapusnya?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm-' + formId).submit();
                    // Swal.fire({
                    //     title: 'Terhapus',
                    //     text: 'Data responden telah dihapus',
                    //     icon: 'success',
                    //     confirmButtonColor: '#3085d6',
                    //     confirmButtonText: 'Oke',
                    // });
                }
            });
        });
    });
</script>
