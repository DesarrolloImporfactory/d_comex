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
                    Header
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PRODUCTO</th>
                                <th>MARCA</th>
                                <th>FOB UNITARIO</th>
                                <th>INCOTERM</th>
                                <th>SUBPARTIDA</th>
                                <th>DESCRIPCION PARTIDA</th>
                                <th>RUC/IMPORTADOR</th>
                                <th>EMPRESA DE TRANSPORTE</th>
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
                                $count = "1";
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->producto}}</td>
                                    <td>{{ $item->marcas }}</td>
                                    <td>{{ $item->fob_unitario }}</td>
                                    <td>{{ $item->incoterm}}</td>
                                    <td>{{ $item->subpartida }}</td>
                                    <td>{{ $item->desc_partida }}</td>
                                    <td>{{ $item->ruc}}/{{ $item->razon_social}}</td>
                                    <td>{{ $item->linea }}</td>
                                    <td>{{ $item->ciudad_embarque }}</td>
                                    <td>{{ $item->pais_embarque }}</td>
                                    <td>{{ $item->via }}</td>
                                    <td>{{ $item->kilos_neto }}</td>
                                    <td>{{ $item->regimen }}</td>
                                    <td>{{ $item->distrito }}</td>
                                    <td>{{ $item->bl }}</td>
                                    
                                    <td>{{ $item->fecha_embarque }}</td>
                                    <td>{{ $item->fecha_llegada }}</td>
                                    <td>{{ $item->fecha_ingreso }}</td>
                                    <td>{{ $item->fecha_pago }}</td>
                                    <td>{{ $item->fecha_salida }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->mes }}</td>
                                    <td>{{ $item->dep_comercial}}</td>
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
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: {
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
                }
            });
        });
    </script>
@endsection
