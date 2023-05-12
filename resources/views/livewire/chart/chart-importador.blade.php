<div class="row">
    <div class="label border p-2 bg-dark text-light rounded mb-2"><i class="fa-solid fa-chart-line"></i>
        DECLARACIONES POR IMPORTADOR </div>
    <div class="col-md-12">
        <div wire:ignore id="chartImportador"></div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nº</th>
                            <th>IMPORTADOR</th>
                            <th>FOB</th>
                            <th>CIF</th>
                            <th>DECLARACIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($tabla as $item)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $item->ruc }}</td>
                                <td>{{ $item->total_fob }}</td>
                                <td>{{ $item->total_cif }}</td>
                                <td>{{ $item->cantidad_declaraciones }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('js')

    <script>
        Highcharts.chart('chartImportador', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Declaraciones por importador en el periodo '+JSON.parse(`<?php echo $periodo; ?>`),
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
                name: 'Ruc',
                colorByPoint: true,
                data: JSON.parse(`<?php echo $chart; ?>`)
            }]
        });
    </script>
@endpush

