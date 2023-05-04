<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <select class="form-select" wire:model="perPage">
                    <option value="5"> 5 por página</option>
                    <option value="10">10 por página</option>
                    <option value="15">15 por página</option>
                </select>
            </div>
            <div class="col-md-4 has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input wire:keydown='render' wire:model="searchAll" type="text" class="form-control"
                    placeholder="Buscar en todo...">
            </div>
            <div class="col-md-2">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button wire:ignore.self wire:click="excel('xlsx')" wire:loading.remove type="button"
                        class="btn btn-outline-success"><i class="fa-sharp fa-regular fa-file-excel"></i>
                        Excel</button>

                    <button wire:ignore.self wire:click="excel('csv')" type="button" wire:loading.remove
                        class="btn btn-outline-success "><i class="fa-sharp fa-solid fa-file-csv"></i>
                        CSV</button>
                </div>
                <button wire:loading wire:target='excel' type="button" class="btn btn-outline-warning"><i
                        class="fa-solid fa-spinner fa-spin"></i> Descargando</button>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-select" wire:model="searchMes" style="width: 100px;">
                            <option value="">TODOS</option>
                            @foreach ($meses as $item)
                                <option value="{{ $item->mes }}">{{ $item->mes }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-3">
                        <a type="button" wire:click="limpiar" class="btn-sm" title="limpiar filtro">
                            <i class="fa-solid fa-rotate-right"></i> limpiar
                        </a>

                    </div>
                    <div class="col-md-5">
                        <div class="float-right">
                            <a type="button" class="btn btn-primary " href="{{ route('back') }}">
                                <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i> Regresar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div wire:keydown='render' class="col-md-3 mt-3" wire:loading wire:target="render">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow spinner-grow-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span>Buscando coincidencias....</span>
                </div>
            </div>
            @if (count($data))
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-bordered text-center example">
                        <thead>
                            <tr>
                                <th>RUC/IMPORTADOR</th>
                                <th>PRODUCTO</th>
                                <th>MARCA</th>
                                <th>FOB UNIT</th>
                                <th>PAIS ORIGEN</th>
                                <th>CANTIDAD</th>
                                <th>TIPO/UNIDAD</th>
                                <th>SUBPARTIDA</th>
                                <th>DESCRIPCION/PARTIDA</th>
                                <th>EMPRESA/DE/TRANSPORTE</th>
                                <th>EMBARCADOR</th>
                                <th>CIUDAD/EMBARQUE</th>
                                <th>PAIS EMBARQUE</th>
                                <th>VIA</th>
                                <th>KILOS NETO</th>
                                <th>REGIMEN</th>
                                <th>DISTRITO</th>
                                <th>BL</th>
                                <th>FECH EMBAR</th>
                                <th>FECH LLEGADA</th>
                                <th>FECH INGRESO</th>
                                <th>FECH PAGO</th>
                                <th>FECH SALIDA</th>
                                <th>AÑO</th>
                                <th>MES</th>
                                <th>CAPITULO</th>
                                <th>ALMACEN</th>
                                <th>PARTIDA</th>
                                <th>RZ/SOCIAL/DIR</th>
                                <th>NOTIFY</th>
                                <th>EMBARCADOR/CONSIGNE</th>
                                <th>EMBAR/CONSIGNE/ADDRESS</th>
                                <th>REFRENDO</th>
                                <th>NUME_SERIE</th>
                                <th>TIPO/AFORO</th>
                                <th>COD_REGIMEN</th>
                                <th>AGENTE/AFIANZADO</th>
                                <th>AGENCIA</th>
                                <th>MANIFIESTO</th>
                                <th>MANIFIESTO ADUANA</th>
                                <th>FACTURA</th>
                                <th>NAVE</th>
                                <th>ALMACEN_TEMP</th>
                                <th>TNAN</th>
                                <th>TASA ADV</th>
                                <th>DESCRIPCION/ARANCEL</th>
                                <th>DESC_COMER</th>
                                <th>TIPO CARGA</th>
                                <th>FOB</th>
                                <th>FLETE</th>
                                <th>SEGURO</th>
                                <th>CIF</th>
                                <th>COD_LIBERACION</th>
                                <th>ADV/PAG/PARTIDA</th>
                                <th>ADV/LIQ/PARTIDA</th>
                                <th>CARACTERISTICA</th>
                                <th>MARCA COMERCIAL</th>
                                <th>AÑO PRODUCIDO</th>
                                <th>REGIMEN TIPO</th>
                                <th>INCOTERM</th>
                                <th>CONSOLIDADORA</th>
                                <th>COD PROVINCIA</th>
                                <th>PROVINCIA</th>
                                <th>FORMULARIO</th>
                                <th>FORM VIA ENVIA</th>
                                <th>ESTADO MERCANCIA</th>
                                <th>DIAS SALIDA</th>
                                <th>FLETE2</th>
                                <th>CIF2</th>
                                <th>CFR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" wire:keydown='render' wire:model="searchRuc"
                                        style="width: 100px;" placeholder="Search..">
                                </td>
                                <td>
                                    <input type="text" wire:keydown='render' wire:model="searchProducto"
                                        style="width: 100px;" placeholder="Search..">
                                </td>
                                <td>
                                    <input type="text" wire:keydown='render' wire:model="searchMarca"
                                        style="width: 100px;" placeholder="Search..">
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input wire:keydown='render' type="text" wire:model="searchPartida"
                                        style="width: 100px;" placeholder="Search..">
                                </td>
                                <td></td>
                                <td>
                                    <input wire:keydown='render' type="text" wire:model="searchTransporte"
                                        style="width: 100px;" placeholder="Search..">
                                </td>
                                <td>
                                    <input wire:keydown='render' type="text" wire:model="searchEmbarcador"
                                        style="width: 100px;" placeholder="Search..">
                                <td></td>
                                <td></td>
                                <td>
                                    <select wire:model="searchVia" style="width: 100px;">
                                        <option value="">TODOS</option>
                                        @foreach ($vias as $item)
                                            <option value="{{ $item->via }}">{{ $item->via }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="text" wire:model="searchDistrito" style="width: 100px;"
                                        placeholder="Search..">
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="text" wire:model="searchMes" style="width: 100px;"
                                        placeholder="Search..">
                                </td>
                                <td></td>
                                <td>
                                    <input type="text" wire:model="searchAlmacen" style="width: 100px;"
                                        placeholder="Search..">
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->ruc }}/{{ $item->razon_social }}</td>
                                    <td>{{ $item->producto }}</td>
                                    <td>{{ $item->marcas }}</td>
                                    <td>{{ $item->fob_unitario }}</td>
                                    <td>{{ $item->pais_origen }}</td>
                                    <td>{{ $item->unidades }}</td>
                                    <td>{{ $item->tipo_unidad }}</td>
                                    <td>{{ $item->subpartida }}</td>
                                    <td>{{ $item->desc_partida }}</td>
                                    <td>{{ $item->linea }}</td>
                                    <td>{{ $item->remitente }}</td>
                                    <td>{{ $item->ciudad_embarque }}</td>
                                    <td>{{ $item->pais_embarque }}</td>
                                    <td>{{ $item->via }}</td>
                                    <td>{{ $item->kilos_neto }}</td>
                                    <td>{{ $item->regimen }}</td>
                                    <td>{{ $item->distrito }}</td>
                                    <td>{{ $item->bl }}</td>
                                    @if ($item->periodo == '2023')
                                        <td>{{ $item->fecha_embarque }}</td>
                                        <td>{{ $item->fecha_llegada }}</td>
                                        <td>{{ $item->fecha_ingreso }}</td>
                                        <td>{{ $item->fecha_pago }}</td>
                                        <td>{{ $item->fecha_salida }}</td>
                                    @else
                                        <td>{{ $item->fecha_embarque_dia }}/{{ $item->fecha_embarque_mes }}/{{ $item->fecha_embarque_year }}
                                        </td>
                                        <td>{{ $item->fecha_llegada_dia }}/{{ $item->fecha_llegada_mes }}/{{ $item->fecha_llegada_year }}
                                        </td>
                                        <td>{{ $item->fecha_ingreso }}</td>
                                        <td>{{ $item->fecha_pago_dia }}/{{ $item->fecha_pago_mes }}/{{ $item->fecha_pago_year }}
                                        </td>
                                        <td>{{ $item->fecha_salida_dia }}/{{ $item->fecha_salida_mes }}/{{ $item->fecha_salida_year }}
                                        </td>
                                    @endif
                                    <td>{{ $item->periodo }}</td>
                                    <td>{{ $item->mes }}</td>
                                    <td>{{ $item->capitulo }}</td>
                                    <td>{{ $item->dep_comercial }}</td>

                                    <td>{{ $item->partida }}</td>
                                    <td>{{ $item->razon_social_direccion }}</td>
                                    <td>{{ $item->notify }}</td>
                                    <td>{{ $item->embarcador_consigne }}</td>
                                    <td>{{ $item->embarcador_consigne_address }}</td>
                                    <td>{{ $item->refrendo }}</td>
                                    <td>{{ $item->nume_serie }}</td>
                                    <td>{{ $item->tipo_aforo }}</td>
                                    <td>{{ $item->cod_regimen }}</td>
                                    <td>{{ $item->agente_afianzado }}</td>
                                    <td>{{ $item->agencia }}</td>
                                    <td>{{ $item->manifiesto }}</td>
                                    <td>{{ $item->manifiesto_aduana }}</td>
                                    <td>{{ $item->factura }}</td>
                                    <td>{{ $item->nave }}</td>
                                    <td>{{ $item->almacen_temp }}</td>
                                    <td>{{ $item->tnan }}</td>
                                    <td>{{ $item->tasa_advalorem }}</td>
                                    <td>{{ $item->desc_aran }}</td>
                                    <td>{{ $item->desc_comer }}</td>
                                    <td>{{ $item->tipo_carga }}</td>
                                    <td>{{ $item->fob }}</td>
                                    <td>{{ $item->flete }}</td>
                                    <td>{{ $item->seguro }}</td>
                                    <td>{{ $item->cif }}</td>
                                    <td>{{ $item->codigo_liberacion }}</td>
                                    <td>{{ $item->adv_pag_partida }}</td>
                                    <td>{{ $item->adv_liq_partida }}</td>
                                    <td>{{ $item->caracteristica }}</td>
                                    <td>{{ $item->marca_comercial }}</td>
                                    <td>{{ $item->year_producido }}</td>
                                    <td>{{ $item->regimen_tipo }}</td>
                                    <td>{{ $item->incoterm }}</td>
                                    <td>{{ $item->consolidadora }}</td>
                                    <td>{{ $item->cod_provincia }}</td>
                                    <td>{{ $item->provincia }}</td>
                                    <td>{{ $item->formulario }}</td>
                                    <td>{{ $item->form_via_envio }}</td>
                                    <td>{{ $item->estado_mercancia }}</td>
                                    <td>{{ $item->dias_salida }}</td>
                                    <td>{{ $item->flete2 }}</td>
                                    <td>{{ $item->cif2 }}</td>
                                    <td>{{ $item->cfr }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div wire:click='render' class="col-md-8 text-center mt-3">
                        {{ $data->links() }}
                    </div>
                    {{-- <div class="alert alert-light ">
                        <span>Total de registros encontrados: {{ $acum }}</span>
                    </div> --}}
                </div>
            @else
                <div class="alert alert-light mt-3">{{ $searchAll }} no existen en nuestra base de datos....
                </div>
            @endif

        </div>
    </div>
</div>
<style>
    .example {
        font-size: 12px;
    }
</style>
</div>
