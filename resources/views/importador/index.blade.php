<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Importador Masivo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen w-full grid place-content-center">
    <div class="bg-white py-16 px-5 rounded shadow-lg max-w-md w-full">
        <span class="text-2xl font-bold text-center block mb-4">Importador Masivo</span>

        <!-- Mostrar mensajes de éxito -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mostrar mensajes de error -->
        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('importador.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="anio" class="block mb-2">Año</label>
            <select name="anio" class="block w-full border border-gray-300 p-2 rounded mb-4">
               {{--  @for($i = 2020; $i <= date('Y'); $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor --}}
                <option value="2024">2024</option>
            </select>
            <label for="file" class="block mb-2">Archivo Excel</label>
            <input type="file" name="file" accept=".xls, .xlsx, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" class="block w-full border border-gray-300 p-2 rounded mb-4">
            <button type="submit" class="bg-blue-500 text-white w-full px-4 py-2 rounded">Importar</button>
        </form>
    </div>
</body>
</html>
