@extends('layouts.mainAdmin')

@section('main-content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts" />

<div class="grid max-w-4xl bg-white p-4 rounded shadow mb-5 mx-auto">
    <div class="grid-cols-1">
        <div id="chartPPDB"></div>
    </div>
</div>

<div class="grid grid-cols-2 max-w-4xl gap-4 mx-auto">
    <!-- First Column -->
    <div class="grid grid-rows-2 w-auto gap-4">
        <!-- First Row in First Column -->
        <div class="bg-white p-4 rounded shadow">
            <div id="chartStatusPPDB"></div>
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


@endsection