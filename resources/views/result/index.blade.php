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
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
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
                                <th>FECH EMBAR</th>
                                <th>FECH LLEGADA</th>
                                <th>FECH INGRESO</th>
                                <th>FECH PAGO</th>
                                <th>FECH SALIDA</th>
                                <th>AÑO</th>
                                <th>MES</th>
                                <th>ALMACEN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = '1';
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->ruc }}/{{ $item->razon_social }}</td>
                                    <td>{{ $item->producto }}</td>
                                    <td>{{ $item->marcas }}</td>
                                    <td>{{ $item->fob_unitario }}</td>
                                    <td>{{ $item->pais_origen }}</td>
                                    <td>{{ $item->unidades }}</td>
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
                                    <td>{{ $item->dep_comercial }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@stop

@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
    <script src=""></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                deferRender: true,
                scrollX: true,
                scrollY: 450,
                scrollCollapse: true,
                scroller: true,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
  
@endsection


