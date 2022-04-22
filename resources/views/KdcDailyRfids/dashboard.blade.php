@extends('adminlte::page')

@section('title', 'Data Excel')

@section('content_header')

@stop

@section('content')
<table>
    <tr>
        <th>/</th>
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


{{-- {{$ritase= $KdcDailyRfids['ritasi']}}
@foreach ( $ritase as $rit)
{{$rit->count}}
@endforeach --}}


@stop

@section('css')

@stop

@section('js')

@stop