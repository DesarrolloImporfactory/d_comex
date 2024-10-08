@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
   
@stop

@section('content')
    <div class="row">
        <div class="card border-light mt-3">
            <div class="card-header">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6">
                                <h1 class="m-0"><b>BUSCADOR</b></h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item active">Home</li>
                                    <li class="breadcrumb-item "><a href="#">Buscador</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header">
                <div class="container-fluid">
                    <form action="" id="formFiltros">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="label border p-2 bg-dark text-light rounded mb-2"><i
                                        class="fa-solid fa-magnifying-glass"></i> PERIODO DE BÚSQUEDA</div>
                                <div class="ml-2 mr-2">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">OPERACION:</label>
                                                <x-adminlte-select2 name="operacion" enable-old-support>
                                                    <option value="import">Importaciones</option>
                                                    <option value="export">Exportaciones</option>
                                                </x-adminlte-select2>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">AÑO:</label>
                                                <x-adminlte-select2 name="periodo" enable-old-support>
                                                    <option value="">Seleccione un periodo...</option>
                                                    <option value="" disabled>2020 - proximamente</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                </x-adminlte-select2>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">DESDE:</label>
                                                <x-adminlte-select2 name="desde" enable-old-support>
                                                    <option value="">TODAS</option>
                                                    @foreach ($meses as $item)
                                                        <option value="{{ $item->id }}">{{ $item->mes }}</option>
                                                    @endforeach
                                                </x-adminlte-select2>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">HASTA:</label>
                                                <x-adminlte-select2 name="hasta" enable-old-support>
                                                    <option value="">TODAS</option>
                                                    @foreach ($meses as $item)
                                                        <option value="{{ $item->id }}">{{ $item->mes }}</option>
                                                    @endforeach
                                                </x-adminlte-select2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 mt-3">
                                <div class="label border p-2 bg-dark text-light rounded mb-2"><i
                                        class="fa-solid fa-magnifying-glass"></i>CRITERIOS DE BÚSQUEDA</div>
                                <div class="ml-2 mr-2 mt-4">
                                    <div class="form-group">
                                        <div class="row has-search">
                                            <input type="hidden" class="form-control" id="producto" name="producto">
                                            <div class="col-md-4"><label for="">PRODUCTO:</label></div>
                                            <div class="col-md-8"><span
                                                    class="fa fa-search form-control-feedback"></span><input type="text"
                                                    class="form-control" id="productoView" name="productoView"
                                                    placeholder="ingresar el producto o la descripción.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row has-search">
                                            <div class="col-md-4"><label for="">MARCA:</label></div>
                                            <div class="col-md-8"><span
                                                    class="fa fa-search form-control-feedback"></span><input type="text"
                                                    class="form-control" id="marca" name="marca">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row has-search">
                                            <div class="col-md-4"><label for="">PARTIDA ARANCELARIA:</label>
                                            </div>
                                            <div class="col-md-8"><span
                                                    class="fa fa-search form-control-feedback"></span><input type="text"
                                                    class="form-control" id="subpartida" name="arancelDesc">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row has-search">
                                            <input type="hidden" class="form-control" id="ruc" name="ruc">
                                            <div class="col-md-4"><label for="">IMPORTADOR/RUC:</label></div>
                                            <div class="col-md-8"><span
                                                    class="fa fa-search form-control-feedback"></span><input type="text"
                                                    class="form-control" id="rucView" name="rucView">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row has-search">
                                            <div class="col-md-4"><label for="">NAVE:</label></div>
                                            <div class="col-md-8"><span
                                                    class="fa fa-search form-control-feedback"></span><input
                                                    type="text" class="form-control" id="nave" name="nave"
                                                    placeholder=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row has-search">
                                            <div class="col-md-4"><label for="">EMPRESA DE TRANSPORTE/AGENCIA
                                                    DE
                                                    CARGA:</label></div>
                                            <div class="col-md-8"><span
                                                    class="fa fa-search form-control-feedback"></span><input
                                                    type="text" class="form-control" id="linea" name="linea">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row has-search">
                                            <div class="col-md-4"><label for="">EMBARCADOR:</label></div>
                                            <div class="col-md-8"><span
                                                    class="fa fa-search form-control-feedback"></span><input
                                                    type="text" class="form-control" id="embarcador"
                                                    name="embarcador"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row has-search">
                                            <div class="col-md-4"><label for="">REFRENDO:</label></div>
                                            <div class="col-md-8"><span
                                                    class="fa fa-search form-control-feedback"></span><input
                                                    type="text" class="form-control" id="refrendo" name="refrendo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row has-search">
                                            <div class="col-md-4"><label for="">AGENTE DE ADUANA:</label>
                                            </div>
                                            <div class="col-md-8"><span
                                                    class="fa fa-search form-control-feedback"></span><input
                                                    type="text" class="form-control" id="agente_afianzado"
                                                    name="agente_afianzado">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row has-search">
                                            <div class="col-md-4"><label for="">ALMACEN:</label></div>
                                            <div class="col-md-8"><span
                                                    class="fa fa-search form-control-feedback"></span><input
                                                    type="text" class="form-control" id="almacen" name="almacen">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-5 mt-3">
                                <div class="label border p-2 bg-dark text-light rounded mb-2"><i
                                        class="fa-solid fa-filter"></i> FILTRO DE BÚSQUEDA</div>
                                <div class="ml-2 mr-2 mt-3">
                                    <div class="form-group">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i> ADUANA:
                                        <x-adminlte-select2 name="distrito" id="aduanas">
                                            <option value="">TODAS</option>
                                            @foreach ($aduanas as $item)
                                                <option value="{{ $item->distrito }}">{{ $item->id }} -
                                                    {{ $item->distrito }}
                                                </option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>
                                    <div class="form-group">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i> VIA DE TRANSPORTE:

                                        <x-adminlte-select2 name="iva" id="via">
                                            <option value="">TODAS</option>
                                            @foreach ($vias as $item)
                                                <option value="{{ $item->via }}">{{ $item->id }} -
                                                    {{ $item->via }}
                                                </option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>
                                    <div class="form-group">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i> PAIS DE ORIGEN:

                                        <x-adminlte-select2 name="pais_origen" id="pais_origen">
                                            <option value="">TODAS</option>
                                            @foreach ($paises as $item)
                                                <option value="{{ $item->pais_origen }}">{{ $item->id }} -
                                                    {{ $item->pais_origen }}
                                                </option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>
                                    <div class="form-group">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i> PAIS DE EMBARQUE:
                                        <x-adminlte-select2 name="pais_embarque">
                                            <option value="">TODAS</option>
                                            @foreach ($paisEmbarques as $item)
                                                <option value="{{ $item->nombre_pais }}">{{ $item->id }} -
                                                    {{ $item->nombre_pais }}
                                                </option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>
                                    <div class="form-group">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i> PUERTO DE EMBARQUE:
                                        <x-adminlte-select2 name="ciudad_embarque">
                                            <option value="">TODAS</option>
                                            @foreach ($ciudadEmbarques as $item)
                                                <option value="{{ $item->ciudad_embarque }}">{{ $item->id }} -
                                                    {{ $item->ciudad_embarque }}</option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>
                                    <div class="form-group">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i> REGIMEN:
                                        <x-adminlte-select2 name="regimen">
                                            <option value="">TODAS</option>
                                            @foreach ($regimens as $item)
                                                <option value="{{ $item->regimen }}">{{ $item->cod_regimen }} -
                                                    {{ $item->regimen }}
                                                </option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>
                                    <div class="form-group">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i> INCOTERM:
                                        <x-adminlte-select2 name="incoterm" id="incoterm">
                                            <option value="">TODAS</option>
                                            @foreach ($incoterms as $item)
                                                <option value="{{ $item->incoterm }}">{{ $item->id }} -
                                                    {{ $item->incoterm }}
                                                </option>
                                            @endforeach
                                        </x-adminlte-select2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" id="chart"
                                        class="btn btn-primary btn-flat btn-block mt-2">
                                        <i class="fa-solid fa-chart-simple"></i> GRÁFICAS
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" id="search" class="btn btn-danger btn-flat btn-block mt-2">
                                        <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i> BUSCAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Recomendaciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="text-align: justify;">La búsqueda excede el límite de registros, será mejor seguir cualquiera
                        de los siguientes parámetros para garantizar la fluides en visualización de resultados y experiencia
                        de usuario. </p>
                    <ul>
                        <li>Filtrar por rango de meses, ejemplo: de Enero a Mayo.</li>
                        <li>Ingresar un criterio de búsqueda adicional, ejemplo: producto, marca, ruc, etc.</li>
                        <li>Ingresar un filtro de búsqueda adicional.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '#search', function(e) {
            e.preventDefault();
            $("#formFiltros").attr('action', '{{ route('admin.consulta.create') }}');
            $("#formFiltros").submit();
        });
        $(document).on('click', '#chart', function(e) {
            e.preventDefault();
            $("#formFiltros").attr('action', '{{ route('admin.charts.create') }}');
            $("#formFiltros").submit();
        });
    </script>
    <script src="{{ asset('js/validar.js') }}"></script>
    <script>
        $(document).ready(function() {
            if ({{ Session::has('alert') }})
                $("#alert").modal('show');
        });
    </script>
    <script>
        $("#productoView").autocomplete({
            source: 'search/producto',
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                $("#producto").val(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
        $("#marca").autocomplete({
            source: 'search/marca',
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $("#marca").val(ui.item.label);
            }
        });
        $("#rucView").autocomplete({
            source: 'search/ruc',
            minLength: 3,
            select: function(event, ui) {
                event.preventDefault();
                $("#ruc").val(ui.item.id) //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
        $("#nave").autocomplete({
            source: 'search/nave',
            minLength: 1,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
        $("#linea").autocomplete({
            source: 'search/linea',
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
        $("#embarcador").autocomplete({
            source: 'search/embarcadorConsigne',
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
        $("#refrendo").autocomplete({
            source: 'search/refrendo',
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
        $("#agente_afianzado").autocomplete({
            source: 'search/agenteAfianzado',
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
        $("#almacen").autocomplete({
            source: 'search/almacen',
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });

        $("#subpartida").autocomplete({
            source: 'search/subpartida',
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
    </script>

@stop
