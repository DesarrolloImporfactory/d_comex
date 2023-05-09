<div class="row">
    <div class="label border p-2 bg-dark text-light rounded mb-2"><i class="fa-solid fa-chart-line"></i>
        DECLARACIONES POR PAIS DE ORIGEN </div>
    <div class="col-md-12">
        <div id="container"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>PAIS</th>
                        <th>RUC</th>
                        <th>DECLARACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1 ;
                    @endphp
                    @foreach ($tabla as $item)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$item->pais_origen}}</td>
                        <td>{{$item->ruc}}</td>
                        <td>{{$item->cantidad_declaraciones}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
</div>
@push('js')

    <script>
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Declaraciones por país de origen en el periodo '+JSON.parse(`<?php echo $periodo; ?>`),
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.name}</b>: {point.y}'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Cantidad',
                colorByPoint: true,
                data: JSON.parse(`<?php echo $chart; ?>`)
            }]
        });
    </script>
@endpush
