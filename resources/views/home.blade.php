@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    @if (Session::has('mensaje'))
        <script>
            iziToast.show({
                title: 'Hey',
                message: '{{ Session::get('mensaje') }}'
            });
        </script>
    @endif
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
                    <form action="{{ route('admin.consulta.create') }}" id="formFiltros">
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
                                                <x-adminlte-select2 name="operacion">
                                                    <option value="">Importaciones</option>
                                                    <option value="" disabled>Exportaciones</option>
                                                </x-adminlte-select2>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">AÑO:</label>
                                                <x-adminlte-select2 name="periodo">
                                                    <option value="">Seleccione un periodo...</option>
                                                    <option value="" disabled>2020 - proximamente</option>
                                                    <option value="" disabled>2021 - proximamente</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                </x-adminlte-select2>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">DESDE:</label>
                                                <x-adminlte-select2 name="desde">
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
                                                <x-adminlte-select2 name="hasta">
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
                                                    class="form-control" id="productoView" name="productoView">
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
                                        <input type="text" name="distrito" id="aduanas" value=""
                                            class="form-control" placeholder="Buscar por ciudad">
                                    </div>
                                    <div class="form-group">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i> VIA DE TRANSPORTE:
                                        <input type="text" name="iva" id="via" class="form-control"
                                            placeholder="Tipo de via, ejem: Maritimo">
                                    </div>
                                    <div class="form-group">
                                        <i class="fa-regular fa-circle-xmark text-danger"></i> PAIS DE ORIGEN:
                                        <input type="text" name="pais_origen" id="pais_origen" value=""
                                            class="form-control" placeholder="Buscar por pais">
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
                                        <input type="text" name="incoterm" id="incoterm" value=""
                                            class="form-control" placeholder="Buscar por tipo, ejem: CPT">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" form="formFiltros" id="sub"
                                            class="btn btn-danger btn-flat btn-block mt-2">
                                            <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i> REALIZAR BÚSQUEDA
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Header
                </div>
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                          <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                      </div>
                </div>
                <div class="card-footer">
                    Footer
                </div>
            </div>
        </div>
    </div> --}}
    <script src="{{ asset('js/searchs.js') }}"></script>
    <script src="{{ asset('js/validar.js') }}"></script>
    <script>
        $("#aduanas").autocomplete({
            source: 'search/aduanas',
            minLength: 1,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });

        $("#via").autocomplete({
            source: 'search/via',
            minLength: 1,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
        $("#pais_origen").autocomplete({
            source: 'search/paisOrigen',
            minLength: 1,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
        $("#incoterm").autocomplete({
            source: 'search/incoterm',
            minLength: 1,
            select: function(event, ui) {
                event.preventDefault();
                console.log(ui.item.id); //imprimiendo id por consola
                $(this).val(ui.item.label);
            }
        });
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">

@stop
