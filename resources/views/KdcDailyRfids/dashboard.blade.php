@extends('adminlte::page')

@section('title', 'Data Excel')

@section('content_header')

@stop

@section('content')


<H4>Tanggal</H3>
    <table>
        <tr>
            <th>Total |</th>
            <th>shif1</th>
            <th>shift2</th>
            <th>shift3</th>
        </tr>
        <tr>
            <td>Tonase</td>
            <td>
                {{$KdcDailyRfids['tonase_shift1']}}
            </td>
            <td>
                {{$KdcDailyRfids['tonase_shift2']}}
            </td>
            <td>
                {{$KdcDailyRfids['tonase_shift3']}}
            </td>
        <tr>
            <td>Ritasi</td>
            <td>
                {{$KdcDailyRfids['ritasi_shift1']}}
            </td>
            <td>
                {{$KdcDailyRfids['ritasi_shift2']}}
            </td>
            <td>
                {{$KdcDailyRfids['ritasi_shift3']}}
            </td>
        </tr>
        </tr>
    </table>

    <x-adminlte-card title="A" theme-mode="outline">
        <canvas id="myChart" height="50px"></canvas>
    </x-adminlte-card>


    {{-- {{$ritase= $KdcDailyRfids['ritasi']}}
    @foreach ( $ritase as $rit)
    {{$rit->count}}
    @endforeach --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   

    <script type="text/javascript">
        const mixedChart = new Chart(ctx, {
   type: 'bar',
   data: {
       datasets: [{
           label: 'Bar Dataset',
           data: [10, 20, 30, 40],
           // this dataset is drawn below
           order: 2
       }, {
           label: 'Line Dataset',
           data: [10, 10, 10, 10],
           type: 'line',
           // this dataset is drawn on top
           order: 1
       }],
       labels: ['January', 'February', 'March', 'April']
   },
   options: options
});
 
    </script>
    @stop

    @section('css')

    @stop

    @section('js')

    @stop