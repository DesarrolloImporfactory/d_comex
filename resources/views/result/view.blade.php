@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">RESULTADO DE TU BUSQUEDA</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Resultado</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <a type="button" class="btn btn-primary" href="{{ route('back') }}">
        <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i> Realizar otra busqueda
    </a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-eye fa-beat-fade"></i> Mira el resultado de forma más detallada
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="declaracion">
                        <thead>
                            <tr>
                                <th>RUC/IMPORTADOR</th>
                                <th>PRODUCTO</th>
                                <th>MARCA</th>
                                <th>FOB UNITARIO</th>
                                <th>PAIS ORIGEN</th>
                                <th>CANTIDAD</th>
                                <th>SUBPARTIDA</th>
                                <th>DESCRIPCION PARTIDA</th>
                                <th>EMPRESA DE TRANSPORTE</th>
                                <th>EMBARCADOR</th>
                                <th>CIUDAD EMBARQUE</th>
                                <th>PAIS EMBARQUE</th>
                                <th>VIA</th>
                                <th>KILOS NETO</th>
                                <th>REGIMEN</th>
                                <th>DISTRITO</th>
                                <th>BL</th>
                                <th>AÑO</th>
                                <th>MES</th>
                                <th>ALMACEN</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#declaracion').DataTable({
                deferRender: true,
                scrollX: true,
                scrollY: 450,
                scrollCollapse: true,
                scroller: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.consulta.create') }}",
                    data: {
                        'operacion': '{{ $operacion }}',
                        'periodo': '{{ $periodo }}',
                        'desde': '{{ $desde }}',
                        'hasta': '{{ $hasta }}',
                        'producto': '{{ $producto }}',
                        'marca': '{{ $marca }}',
                        'arancelDesc': '{{ $arancelDesc }}',
                        'ruc': '{{ $ruc }}',
                        'nave': '{{ $nave }}',
                        'linea': '{{ $linea }}',
                        'embarcador': '{{ $embarcador }}',
                        'refrendo': '{{ $refrendo }}',
                        'agente_afianzado': '{{ $agente_afianzado }}',
                        'almacen': '{{ $almacen }}',
                        'distrito': '{{ $distrito }}',
                        'iva': '{{ $iva }}',
                        'pais_origen': '{{ $pais_origen }}',
                        'pais_embarque': '{{ $pais_embarque }}',
                        'ciudad_embarque': '{{ $ciudad_embarque }}',
                        'regimen': '{{ $regimen }}',
                        'incoterm': '{{ $incoterm }}',
                    },
                },
                dataType: 'json',
                type: "POST",
                columns: [{
                        data: 'ruc',
                        name: 'ruc',
                    },
                    {
                        data: 'producto',
                        name: 'producto',
                    },
                    {
                        data: 'marcas',
                        name: 'marcas',
                    },
                    {
                        data: 'fob_unitario',
                        name: 'fob_unitario',
                    },
                    {
                        data: 'pais_origen',
                        name: 'pais_origen',
                    },
                    {
                        data: 'unidades',
                        name: 'unidades',
                    },
                    {
                        data: 'subpartida',
                        name: 'subpartida',
                    },
                    {
                        data: 'desc_partida',
                        name: 'desc_partida',
                    },
                    {
                        data: 'linea',
                        name: 'linea',
                    },
                    {
                        data: 'remitente',
                        name: 'remitente',
                    },
                    {
                        data: 'ciudad_embarque',
                        name: 'ciudad_embarque',
                    },
                    {
                        data: 'pais_embarque',
                        name: 'pais_embarque',
                    },
                    {
                        data: 'via',
                        name: 'via',
                    },
                    {
                        data: 'kilos_neto',
                        name: 'kilos_neto',
                    },
                    {
                        data: 'regimen',
                        name: 'regimen',
                    },
                    {
                        data: 'distrito',
                        name: 'distrito',
                    },
                    {
                        data: 'bl',
                        name: 'bl',
                    },
                    {
                        data: 'year',
                        name: 'year',
                    },
                    {
                        data: 'mes',
                        name: 'mes',
                    },
                    {
                        data: 'dep_comercial',
                        name: 'dep_comercial',
                    },
                ],
            });
        });
    </script>
@stop

@section('css')
   
@endsection

@section('js')

@endsection

<!-- TABLA CON RESULTADOS EN MODAL -->
<!-- responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'DETALLES DE: ' + data[0] + ' ' + data[1];
                            }
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: 'table'
                        })
                    }
                } -->
