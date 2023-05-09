<div class="row">
    <div class="label border p-2 bg-dark text-light rounded mb-2"><i class="fa-solid fa-chart-line"></i>
        DECLARACIONES POR ARANCEL </div>
    <div class="col-md-12">
        <div id="chartArancel"></div>
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
