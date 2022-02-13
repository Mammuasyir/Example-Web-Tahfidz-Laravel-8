@extends('template')

@section('content')


<h5 class="card-title">Hafalan siswa <span>/Halaqoh {{$title}}</span></h5>

<div class="card">
    <div class="card-body">
        <!-- Line Chart -->
        <div id="reportsChart"></div> 

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                        name: 'Juz',
                        data: <?php echo json_encode($data); ?>,
                    }],
                    chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                    },
                    markers: {
                        size: 4
                    },
                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2
                    },
                    xaxis: {
                        type: 'Nama',
                        categories: <?php echo json_encode($categories); ?>,
                    },
                    tooltip: {
                        x: {
                            format: 'dd/MM/yy HH:mm'
                        },
                    }
                }).render();
            });
        </script>
        <!-- End Line Chart -->

    </div>
</div>

@endsection