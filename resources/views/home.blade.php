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
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </x-adminlte-select2>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">AÑO:</label>
                                    <x-adminlte-select2 name="year">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </x-adminlte-select2>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">DESDE:</label>
                                    <x-adminlte-select2 name="desde">
                                        @foreach ($meses as $item)
                                            <option value="{{$item->id}}">{{$item->mes}}</option>
                                        @endforeach
                                    </x-adminlte-select2>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">HASTA:</label>
                                    <x-adminlte-select2 name="hasta">
                                        @foreach ($meses as $item)
                                            <option value="{{$item->id}}">{{$item->mes}}</option>
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
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header"><i class="fa-solid fa-magnifying-glass"></i> Criterios de busqueda</div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">PRODUCTO:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input type="text" class="form-control" id="producto" name="producto"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">MARCA:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input type="text" class="form-control" id="marca" name="marca"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">ARANCEL DESCRIPCION:</label></div>
                                <div class="col-md-8"><input type="text" class="form-control" id="arancelDesc" name="arancelDesc" placeholder="pendiente"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">IMPORTADOR/RUC:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input type="text" class="form-control" id="ruc" name="ruc"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">NAVE:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input type="text" class="form-control" id="nave" name="nave"></div>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="row has-search">
                                <div class="col-md-4"><label for="">EMPRESA DE TRANSPORTE:</label></div>
                                <div class="col-md-8"><input type="text" class="form-control" id="empresaTrans" name="empresaTrans" placeholder="pendiente"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">EMBARCADOR:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input type="text" class="form-control" id="embarcador" name="embarcador"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">REFRENDO:</label></div>
                                <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input type="text" class="form-control" id="refrendo" name="refrendo"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">AGENTE DE ADUANA:</label></div>
                                <div class="col-md-8"><input type="text" class="form-control" id="agenteAduana" name="agenteAduana" placeholder="pendiente"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">AGENCIA DE CARGA:</label></div>
                                <div class="col-md-8"><input type="text" class="form-control" id="agenciaCarga" name="agenciaCarga" placeholder="pendiente"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row has-search">
                                <div class="col-md-4"><label for="">ALMACEN:</label></div>
                                <div class="col-md-8"><input type="text" class="form-control" id="almacen" name="almacen"  placeholder="pendiente"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header"><i class="fa-solid fa-filter"></i> Filtro de busqueda</div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> ADUANA: <input type="text"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> VIA DE TRANSPORTE: <input
                                type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> PAIS DE ORIGEN: <input type="text"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> PAIS DE PROCEDENCIA: <input
                                type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> PAIS DE EMBARQUE: <input type="text"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> PUERTO DE EMBARQUE: <input
                                type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> REGIMEN: <input type="text"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <i class="fa-regular fa-circle-xmark text-danger"></i> INCOTERM: <input type="text"
                                class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/search.js')}}"></script>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/search.css')}}">
@stop
