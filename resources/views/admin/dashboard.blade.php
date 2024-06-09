@extends('layouts.mainAdmin')

@section('main-content')

<div class="grid grid-cols-4 w-full max-w-5xl rounded-lg shadow-xl bg-slate-200">
    <!-- First Card -->
    <div class="card w-full">
        <div class="card-body">
            <div class="flex items-center space-x-4">
                <div class="rounded-full bg-blue-700 w-20 h-20 flex justify-center items-center">
                    <i class="far fa-user text-2xl text-white"></i>
                </div>
                <div>
                    <p>Siswa Aktif</p>
                    <h2 class="text-2xl font-bold text-blue-700">
                        200
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- First Card -->

    <!-- Second Card -->
    <div class="card w-full">
        <div class="card-body">
            <div class="flex items-center space-x-4">
                <div class="rounded-full bg-blue-700 w-20 h-20 flex justify-center items-center">
                    <i class="fas fa-chalkboard-user text-2xl text-white"></i>
                </div>
                <div>
                    <p>Staff</p>
                    <h2 class="text-2xl font-bold text-blue-700">
                        200
                    </h2>
                </div>
            </div>
        </div>
        <!-- Second Row in First Column -->
        <div class="bg-white p-4 rounded shadow">
            <div id="chartGuru"></div>
        </div>
    </div>
    <!-- Second Column -->
    <div class="bg-white rounded shadow">
        <div id="chartSiswa"></div>
        <div id="chartAlumni"></div>
    </div>
</div>


<div class="flex mx-auto">
</div>

<div class="max-w-xl">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data for PPDB chart
        var ppdbCountByYear = @json($ppdbCountByYear);
        var ppdbOptions = {
            chart: {
                type: 'bar',
                height: 350
            },
            series: [{
                name: 'Jumlah Pendaftar',
                data: Object.values(ppdbCountByYear)
            }],
            xaxis: {
                categories: Object.keys(ppdbCountByYear),
                labels: {
                    rotate: -45
                }
            },
            title: {
                text: 'DATA PPDB BERDASARKAN TAHUN PENDAFTARAN'
            }
        };

        // Data dari controller
        var diterimaCount = <?php echo json_encode($lolosPpdbCount); ?>;
        var ditolakCount = <?php echo json_encode($ditolakPpdbCount); ?>;
        var prosesCount = <?php echo json_encode($prosesPpdbCount); ?>;

        // Data for Status PPDB chart
        var optionsStatusPPDB = {
            chart: {
                type: 'pie',
                height: 250
            },
            labels: ['Diterima', 'Ditolak', 'Dalam Proses'],
            series: [diterimaCount, ditolakCount, prosesCount],
            title: {
                text: 'STATUS PPDB'
            }
        };

        // Data for students chart
        var siswaCountByProgram = @json($siswaCountByProgram);
        var siswaOptions = {
            chart: {
                type: 'bar',
                height: 350
            },
            series: [{
                name: 'Jumlah Siswa',
                data: Object.values(siswaCountByProgram)
            }],
            xaxis: {
                categories: Object.keys(siswaCountByProgram),
                labels: {
                    rotate: -45
                }
            },
            title: {
                text: 'DATA SISWA AKTIF'
            }
        };

        var alumniCountByGraduationYear = @json($alumniCountByGraduationYear);
        var alumniOptions = {
            chart: {
                type: 'bar',
                height: 350
            },
            series: [{
                name: 'Jumlah Alumni',
                data: Object.values(alumniCountByGraduationYear)
            }],
            xaxis: {
                categories: Object.keys(alumniCountByGraduationYear),
                labels: {
                    rotate: -45
                }
            },
            title: {
                text: 'DATA ALUMNI BERDASARKAN TAHUN KELULUSAN'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chartAlumni"), alumniOptions);
        chart.render();

        // Data for teachers chart
        var guruCountByProgram = @json($guruCountByProgram);
        var guruOptions = {
            chart: {
                type: 'pie',
                height: 250
            },
            series: Object.values(guruCountByProgram),
            labels: Object.keys(guruCountByProgram),
            title: {
                text: 'DATA GURU AKTIF'
            }
        };

        // Inisialisasi grafik
        var ppdbChart = new ApexCharts(document.querySelector("#chartPPDB"), ppdbOptions);
        ppdbChart.render();

        var chartStatusPPDB = new ApexCharts(document.querySelector("#chartStatusPPDB"), optionsStatusPPDB);
        chartStatusPPDB.render();

        var siswaChart = new ApexCharts(document.querySelector("#chartSiswa"), siswaOptions);
        siswaChart.render();

        var guruChart = new ApexCharts(document.querySelector("#chartGuru"), guruOptions);
        guruChart.render();
    });
</script>

</div>

@endsection