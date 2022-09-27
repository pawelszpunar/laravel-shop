$(function () {
    $('.delete').click(function () {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        Swal.fire({
            title: confirm_delete_title,
            text: confirm_delete_text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: confirm_button_text,
            cancelButtonText: cancel_button_text
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: deleteUrl + $(this).data("id"),
                    //data: { id: $(this).data("id") }
                })
                .done(function (msg) {
                    //alert( "Data Saved: " + msg );
                    window.location.reload();
                })
                .fail(function (msg) {
                    console.log(msg);
                    Swal.fire({
                        icon: 'error',
                        //title: 'Oops...',
                        text: fail_text
                    })
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    cancel_title,
                    cancel_text,
                    'error'
                )
            }
        })
    });
});
