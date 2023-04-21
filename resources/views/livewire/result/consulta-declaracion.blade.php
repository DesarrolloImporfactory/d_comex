<div>
    <div class="card">
        <div class="card-header">
            Declaraciones por Pais de origen
        </div>
        <div class="card-body">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
@push('js')
    <script>
        var cData = JSON.parse(`<?php echo $data; ?>`);
        const ctx = document.getElementById('myChart');

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cData.label,
                datasets: [{
                    label: 'Declaraciones',
                    data: cData.data,
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
