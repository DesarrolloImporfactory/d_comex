<div class="row">
    <div class="label border p-2 bg-dark text-light rounded mb-2"><i class="fa-solid fa-chart-line"></i>
        DECLARACIONES POR EMBARCADOR </div>
    <div class="col-md-12">
        <div id="chartEmbarcador"></div>
    </div>

</div>
@push('js')

    <script>
        Highcharts.chart('chartEmbarcador', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Declaraciones por embarcador en el periodo '+JSON.parse(`<?php echo $periodo; ?>`),
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

