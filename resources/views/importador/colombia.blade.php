<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Importador Masivo Colombia</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class="bg-gray-100 min-h-screen w-full grid place-content-center">

    <div class="absolute top-5 left-5">
        <a href="https://infoaduana.imporsuit.app/home" class="text-blue-500 text-sm"><i class='bx bx-arrow-back'></i>
            Volver</a>
    </div>

    <div>
        <img src="https://tiendas.imporsuitpro.com/b_co.png" alt="Colombia Compra" class="w-32 mx-auto mb-4">
    </div>


    <div class="bg-white py-16 px-5 rounded shadow-lg max-w-md w-full">
        <span class="text-2xl font-bold text-center block mb-4">Importador Masivo</span>

        <!-- Mostrar mensajes de éxito -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mostrar mensajes de error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="subir" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="anio" class="block mb-2">Año</label>
            <select name="anio" class="block w-full border border-gray-300 p-2 rounded mb-4">
                <option value="2024">2024</option>
            </select>
            <label for="file" class="block mb-2">Archivo Excel</label>
            <input type="file" name="file"
                accept=".xls, .xlsx, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                class="block w-full border border-gray-300 p-2 rounded mb-4">
            <button type="submit" class="bg-blue-500 text-white w-full px-4 py-2 rounded">Importar</button>
        </form>

        <script>
            document.querySelector('#subir').addEventListener('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                // Mostrar mensaje de que se está subiendo el archivo
                Swal.fire({
                    title: 'Subiendo archivo',
                    text: 'Por favor espere...',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch('/importador', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        if (response.redirected) {
                            window.location.href = response.url;
                        } else {
                            Swal.close();
                            window.location.reload();
                        }
                    })
                    .catch(error => {
                        Swal.close(); // Cerrar SweetAlert2 en caso de error
                        Swal.fire({
                            title: 'Error',
                            text: 'Ocurrió un error al procesar el archivo.',
                            icon: 'error'
                        });
                        console.error('Error:', error);
                    });
            });
        </script>
    </div>
</body>

</html>
