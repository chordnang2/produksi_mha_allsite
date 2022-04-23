@extends('adminlte::page')

@section('title', 'Data Excel')

@section('content_header')

@stop

@section('content')
    <div class="pt-2">
        <x-adminlte-card title="KDC Hauling">
            <x-slot name="toolsSlot">
                <h3 class="card-title mr-2">{{ date('d/M/Y', strtotime($tanggal)) }}</h3>
            </x-slot>


            <div class="row">
                <div class="col-xl-6">
                    <x-adminlte-card title="Tonase" theme-mode="outline">
                        <canvas id="tonase_kdc" height="200"></canvas>
                    </x-adminlte-card>
                </div>
                <div class="col-xl-6">
                    <x-adminlte-card title="Ritasi" theme-mode="outline">
                        <canvas id="ritasi_kdc" height="200"></canvas>
                    </x-adminlte-card>
                </div>
            </div>
        </x-adminlte-card>
    </div>
    <div class="pt-2">
        <x-adminlte-card title="KDC Coal Getting">
            <x-slot name="toolsSlot">
                <h3 class="card-title mr-2">{{ date('d/M/Y', strtotime($tanggal)) }}</h3>
            </x-slot>


            <div class="row">
                <div class="col-xl-4">
                    <x-adminlte-card title="Tonase DT & EXA" theme-mode="outline">
                        <canvas id="tonase_coalgetting" height="300"></canvas>
                    </x-adminlte-card>
                </div>
                <div class="col-xl-4">
                    <x-adminlte-card title="Ritasi" theme-mode="outline">
                        <canvas id="ritasi_coalgetting" height="300"></canvas>
                    </x-adminlte-card>
                </div>
                <div class="col-xl-4">
                    <x-adminlte-card title="HM" theme-mode="outline">
                        <canvas id="hm_coalgetting" height="300"></canvas>
                    </x-adminlte-card>
                </div>
            </div>
        </x-adminlte-card>
    </div>
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>



        <script>
            Chart.register(ChartDataLabels);
            var plugin = {
                datalabels: {
                    anchor: 'start',
                    align: 'start',
                    offset: 0,
                    backgroundColor: 'white'
                }
            };
            var bordercolor = ['rgba(15, 10, 222, 1)'];



            var shift1_tonase = {{ $KdcDailyRfids['tonase_shift1'] }};
            var shift2_tonase = {{ $KdcDailyRfids['tonase_shift1'] }} + {{ $KdcDailyRfids['tonase_shift2'] }};
            var shift3_tonase = {{ $KdcDailyRfids['tonase_shift1'] }} + {{ $KdcDailyRfids['tonase_shift2'] }} +
                {{ $KdcDailyRfids['tonase_shift3'] }};

            const myChart = new Chart(tonase_kdc, {
                type: 'line',
                data: {
                    labels: ['Shift 1', 'Shift 2', 'Shift 3'],
                    datasets: [{
                        label: 'Tonase',
                        data: [shift1_tonase, shift2_tonase, shift3_tonase],
                        backgroundColor: [
                            'rgba(205, 209, 228, 1)',
                        ],
                        borderColor: bordercolor,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: plugin
                }
            });

            var shift1_tonase = {{ $KdcDailyRfids['ritasi_shift1'] }};
            var shift2_tonase = {{ $KdcDailyRfids['ritasi_shift1'] }} + {{ $KdcDailyRfids['ritasi_shift2'] }};
            var shift3_tonase = {{ $KdcDailyRfids['ritasi_shift1'] }} + {{ $KdcDailyRfids['ritasi_shift2'] }} +
                {{ $KdcDailyRfids['ritasi_shift3'] }};

            const myChart2 = new Chart(ritasi_kdc, {
                type: 'line',
                data: {
                    labels: ['Shift 1', 'Shift 2', 'Shift 3'],
                    datasets: [{
                        label: 'Ritasi',
                        data: [shift1_tonase, shift2_tonase, shift3_tonase],
                        backgroundColor: ['rgba(82, 78, 183, 1)', ],
                        borderColor: bordercolor,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: plugin
                }
            });

            var shift_day_tonase_coalgeting = {{ $KdcDailyCoalgetting['tonase_day'] }};
            var shift_night_tonase_coalgeting =
                {{ $KdcDailyCoalgetting['tonase_day'] + $KdcDailyCoalgetting['tonase_night'] }};

            const myChart3 = new Chart(tonase_coalgetting, {
                type: 'line',
                data: {
                    labels: ['Shift 1', 'Shift 2,'],
                    datasets: [{
                        label: 'Tonase',
                        data: [shift_day_tonase_coalgeting, shift_night_tonase_coalgeting],
                        backgroundColor: [
                            'rgba(45, 85, 255, 1)',
                        ],
                        borderColor: bordercolor,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: plugin
                }
            });


            var shift_day_ritasi_coalgeting = {{ $KdcDailyCoalgetting['ritasi_day'] }};
            var shift_night_ritasi_coalgeting =
                {{ $KdcDailyCoalgetting['ritasi_day'] + $KdcDailyCoalgetting['ritasi_night'] }};

            const myChart4 = new Chart(ritasi_coalgetting, {
                type: 'line',
                data: {
                    labels: ['Shift 1', 'Shift 2'],
                    datasets: [{
                        label: 'Ritasi',
                        data: [shift_day_ritasi_coalgeting, shift_night_ritasi_coalgeting],
                        backgroundColor: [
                            'rgba(3, 138, 255, 1)',
                        ],
                        borderColor: bordercolor,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: plugin
                }
            });

            var shift_day_hm_coalgeting = {{ $KdcDailyCoalgetting['hm_day'] }};
            var shift_night_hm_coalgeting =
                {{ $KdcDailyCoalgetting['hm_day'] + $KdcDailyCoalgetting['hm_night'] }};

            const myChart5 = new Chart(hm_coalgetting, {
                type: 'line',
                data: {
                    labels: ['Shift 1', 'Shift 2'],
                    datasets: [{
                        label: 'HM',
                        data: [shift_day_hm_coalgeting, shift_night_hm_coalgeting],
                        backgroundColor: [
                            'rgba(8, 14, 44, 1)',
                        ],
                        borderColor: bordercolor,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: plugin
                }
            });

           
        </script>
    @endpush
@stop

@section('css')

@stop

@section('js')

@stop
