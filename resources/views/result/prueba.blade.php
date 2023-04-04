<div class="row">
    <div class="col-md-3">
        <button type="submit" form="formFiltros" id="sub" class="btn btn-primary mt-2">
            <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i> Realizar busqueda
        </button>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div id="alert">

            </div>
        </div>
    </div>
</div><br>
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
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header"><i class="fa-solid fa-magnifying-glass"></i> Criterios de busqueda</div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row has-search">
                            <input type="hidden" class="form-control" id="producto" name="producto">
                            <div class="col-md-4"><label for="">PRODUCTO:</label></div>
                            <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                    type="text" class="form-control" id="productoView" name="productoView"></div>
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
                            <input type="hidden" class="form-control" id="ruc" name="ruc">
                            <div class="col-md-4"><label for="">IMPORTADOR/RUC:</label></div>
                            <div class="col-md-8"><span class="fa fa-search form-control-feedback"></span><input
                                    type="text" class="form-control" id="rucView" name="rucView"></div>
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
            <div class="card card-primary card border-light"  id="card">
                <div class="card-header"><i class="fa-solid fa-filter"></i> Filtro de busqueda</div>
                <div class="card-body">

                    @csrf
                    <div class="form-group">
                        <i class="fa-regular fa-circle-xmark text-danger"></i> ADUANA:
                        <input type="text" name="distrito" id="aduanas" value="" class="form-control"
                            placeholder="Buscar por ciudad">
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
                                <option value="{{ $item->regimen }}">{{ $item->cod_regimen }} - {{ $item->regimen }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                    <div class="form-group">
                        <i class="fa-regular fa-circle-xmark text-danger"></i> INCOTERM:
                        <input type="text" name="incoterm" id="incoterm" value="" class="form-control"
                            placeholder="Buscar por tipo, ejem: CPT">
                    </div>

                </div>
            </div>
        </div>

    </div>
</form>