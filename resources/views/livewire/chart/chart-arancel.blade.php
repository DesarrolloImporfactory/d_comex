<div class="row">
    <div class="label border p-2 bg-dark text-light rounded mb-2"><i class="fa-solid fa-chart-line"></i>
        DECLARACIONES POR ARANCEL </div>
    <div class="col-md-12">
        <div wire:ignore id="chartArancel"></div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nº</th>
                            <th>SUBPARTIDA</th>
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
                                <td>{{ $item->subpartida }}</td>
                                <td>{{ number_format($item->total_fob,2) }}$</td>
                                <td>{{ number_format($item->total_cif,2) }}$</td>
                                <td>{{ $item->cantidad_declaraciones }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tabla->links() }}
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        Highcharts.chart('chartArancel', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'Declaraciones por Arancel/Subpartida en el periodo ' + JSON.parse(`<?php echo $periodo; ?>`)
            },
            accessibility: {
                announceNewData: {
                    enabled: false
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Cuota de mercado porcentual total'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> del total<br/>'
            },
            series: [{
                name: 'Subpartida',
                colorByPoint: true,
                data: JSON.parse(`<?php echo $chart; ?>`)
            }]
        });
    </script>
@endpush
