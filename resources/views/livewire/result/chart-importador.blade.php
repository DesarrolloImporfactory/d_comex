<div>
    <div class="card">
        <div class="card-header">
           <b>DECLARACIONES POR IMPORTADOR</b>
        </div>
        <div class="card-body">
            <canvas id="chartImportador"></canvas>
        </div>
    </div>
</div>
@push('js')
    <script>
        var cData = JSON.parse(`<?php echo $data; ?>`);
        const impt = document.getElementById('chartImportador');

        new Chart(impt, {
            type: 'pie',
            data: {
                labels: cData.label,
                datasets: [{
                    label: 'Declaraciones',
                    data: cData.data,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4,
                    borderWidth: 1
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
