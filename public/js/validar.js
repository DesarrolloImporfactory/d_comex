$(document).ready(function () {
    $(document).on('click', '#sub', function (e) {
        e.preventDefault();
        $("#alert").html("");
        var text1 = $("#producto").val();
        var text2 = $("#marca").val();
        var text3 = $("#subpartida").val();
        var text4 = $("#ruc").val();
        var text5 = $("#nave").val();
        var text6 = $("#linea").val();
        var text7 = $("#embarcador").val();
        var text8 = $("#refrendo").val();
        var text9 = $("#agente_afianzado").val();
        var text10 = $("#almacen").val();

        var cont = 0;
        if (text1 == "") {
            cont++;
        }
        if (text2 == "") {
            cont++;
        }
        if (text3 == "") {
            cont++;
        }
        if (text4 == "") {
            cont++;
        }
        if (text5 == "") {
            cont++;
        }
        if (text6 == "") {
            cont++;
        }
        if (text7 == "") {
            cont++;
        }
        if (text8 == "") {
            cont++;
        }
        if (text9 == "") {
            cont++;
        }
        if (text10 == "") {
            cont++;
        }

        if (cont == 10) {
            iziToast.error({
                title: 'Error',
                message: 'Complete almenos un campo',
            });
            $("#alert").append(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Alerta!</strong> Es importante que almenos completes un campo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                `);
        } else {
            // $("#preloader").modal("show");
            let timerInterval
            Swal.fire({
                title: 'Buscando coincidencias!',
                html: 'Buscando en <b></b> registros.',
                timer: 9000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
            $("#alert").html("");
            $("#formFiltros").submit();
        }
    });

});