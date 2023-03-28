@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">BUSCADOR</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Buscador</li>
                    </ol>
                </div>
            </div>
        </div>
        <button type="submit" form="formFiltros" class="btn btn-warning float-righ">Buscar</button>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <i class="fa-solid fa-magnifying-glass"></i> PERIODO DE BUSQUEDA
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">OPERACION:</label>
                                    <x-adminlte-select2 name="operacion">
                                        <option value="">Importaciones</option>
                                        <option value="">Exportaciones</option>
                                    </x-adminlte-select2>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">AÑO:</label>
                                    <x-adminlte-select2 name="year">
                                        <option value="" disabled>2020 - proximamente</option>
                                        <option value="" disabled>2021 - proximamente</option>
                                        <option value="" disabled>2022 - proximamente</option>
                                        <option value="">2023</option>
                                    </x-adminlte-select2>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">DESDE:</label>
                                    <x-adminlte-select2 name="desde">
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
                                        @foreach ($meses as $item)
                                            <option value="{{ $item->id }}">{{ $item->mes }}</option>
                                        @endforeach
                                    </x-adminlte-select2>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('admin.consulta.create') }}" id="formFiltros">
        @csrf
        <div class="row justify-content-center">
            {{-- <label for="">Buscador de usuarios: </label>
            <div class="input-group input-group-merge mt-1">
                <span class="input-group-text" id="basic-addon-search31"></span>
                <input  type="text" class="form-control" placeholder="Search..."
                    aria-label="Search..." aria-describedby="basic-addon-search31" />
            </div> --}}
            <div class="col-md-7">
                <div class="card card-primary">
                    <div class="card-header"><i class="fa-solid fa-magnifying-glass"></i> Criterios de busqueda</div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">PRODUCTO:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                        type="text" class="form-control" id="producto" name="producto"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">MARCA:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                        type="text" class="form-control" id="marca" name="marca"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">PARTIDA ARANCELARIA:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                        type="text" class="form-control" id="subpartida" name="arancelDesc"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">IMPORTADOR/RUC:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                        type="text" class="form-control" id="ruc" name="ruc"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">NAVE:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                        type="text" class="form-control" id="nave" name="nave"
                                        placeholder=""></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">EMPRESA DE TRANSPORTE/AGENCIA DE
                                        CARGA:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                        type="text" class="form-control" id="linea" name="linea"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">EMBARCADOR:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                        type="text" class="form-control" id="embarcador" name="embarcador"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">REFRENDO:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                        type="text" class="form-control" id="refrendo" name="refrendo"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">AGENTE DE ADUANA:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                        type="text" class="form-control" id="agente_afianzado"
                                        name="agente_afianzado">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">ALMACEN:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                        type="text" class="form-control" id="almacen" name="almacen"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header"><i class="fa-solid fa-filter"></i> Filtro de busqueda</div>
                    <div class="card-body">

                        @csrf
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> ADUANA:
                            <x-adminlte-select2 name="distrito">
                                <option value="">TODAS</option>
                                @foreach ($distritos as $item)
                                    <option value="{{ $item->distrito }}">{{ $item->distrito }}</option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> VIA DE TRANSPORTE:
                            <x-adminlte-select2 name="iva">
                                <option value="">TODAS</option>
                                @foreach ($transportes as $item)
                                    <option value="{{ $item->via }}">{{ $item->via }}</option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> PAIS DE ORIGEN:
                            <x-adminlte-select2 name="pais_origen">
                                <option value="">TODAS</option>
                                @foreach ($paisOrigen as $item)
                                    <option value="{{ $item->pais_origen }}">{{ $item->pais_origen }}</option>
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
                                    <option value="{{ $item->regimen }}">{{ $item->cod_regimen }} - {{ $item->regimen }}
                                    </option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> INCOTERM:
                            <x-adminlte-select2 name="incoterm">
                                <option value="">TODAS</option>
                                @foreach ($incoterm as $item)
                                    <option value="{{ $item->incoterm }}">{{ $item->incoterm }}</option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </form>
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
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@stop
