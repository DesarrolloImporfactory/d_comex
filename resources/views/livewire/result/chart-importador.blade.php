<div class="row">
    <div class="label border p-2 bg-dark text-light rounded mb-2"><i class="fa-solid fa-magnifying-glass"></i>
        DECLARACIONES POR PAIS DE ORIGEN</div>
    <div class="col-md-6">
        <canvas id="chartImportador" class="chartImportador"></canvas>
    </div>
    <div class="col-md-6 mt-4">
        <div class="table-responsive">
            <table class="table table-bordered ml-4 mt-3">
                <thead class="thead-light">
                    <tr>
                        <th>PAIS</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->pais_origen }}</td>
                            <td>{{ $item->cantidad_declaraciones }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>

</div>
@push('js')
    <script>
        var cData = JSON.parse(`<?php echo $chart; ?>`);
        const impt = document.getElementById('chartImportador').getContext('2d');
        var labels = cData.label;
        const getDataColors = opacity => {
            const colors = ['#7448c2', '#21c0d7', '#d99e2b', '#cd3a81', '#9c99cc', '#e14eca', '#ffffff', '#ff0000',
                '#d6ff00', '#0038ff'
            ]
            return colors.map(color => opacity ? `${color + opacity}` : color)
        }

        new Chart(impt, {
            type: 'doughnut',
            data: {
                labels: cData.label,
                datasets: [{
                    label: 'Declaraciones',
                    data: cData.data,
                    backgroundColor: getDataColors(80),
                    borderColor: getDataColors(),
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: true,
                responsive: true,
                maxWidth: 800,
                maxHeight: 800,
                plugins: {
                    legend: {
                        display: true,
                        position: 'left',
                    }
                }
            }
        });
    </script>
@endpush
