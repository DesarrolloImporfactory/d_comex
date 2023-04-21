<div>
    <div class="card">
        <div class="card-header">
            <b>DECLARACIONES POR REMITENTE</b>
        </div>
        <div class="card-body">
            <canvas id="chartRemitente"></canvas>
        </div>
    </div>
</div>
@push('js')
    <script>
        var cData = JSON.parse(`<?php echo $data; ?>`);
        const remi = document.getElementById('chartRemitente');

        const chartRemitente = new Chart(remi, {
            type: 'pie',
            data: {
                labels: cData.label,
                datasets: [{
                    label: 'Declaraciones',
                    data: cData.data,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
