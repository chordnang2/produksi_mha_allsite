<?php

namespace App\Http\Controllers;

use App\Models\KdcDailyCoalgetting;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KdcDailyCoalgettingImport;
use App\Http\Requests\StoreKdcDailyCoalgettingRequest;
use App\Http\Requests\UpdateKdcDailyCoalgettingRequest;
use Illuminate\Http\Request;

class KdcDailyCoalgettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKdcDailyCoalgettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKdcDailyCoalgettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KdcDailyCoalgetting  $kdcDailyCoalgetting
     * @return \Illuminate\Http\Response
     */
    public function show(KdcDailyCoalgetting $kdcDailyCoalgetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KdcDailyCoalgetting  $kdcDailyCoalgetting
     * @return \Illuminate\Http\Response
     */
    public function edit(KdcDailyCoalgetting $kdcDailyCoalgetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKdcDailyCoalgettingRequest  $request
     * @param  \App\Models\KdcDailyCoalgetting  $kdcDailyCoalgetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKdcDailyCoalgettingRequest $request, KdcDailyCoalgetting $kdcDailyCoalgetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KdcDailyCoalgetting  $kdcDailyCoalgetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(KdcDailyCoalgetting $kdcDailyCoalgetting)
    {
        //
    }

    public function excel_import()
    {
        return view('KdcDailyCoalgetting.import_excel');
    }
    public function excel_store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new KdcDailyCoalgettingImport, $file);

        return back()->withStatus('Excel file import berhasil!');
    }

    public function excel_data()
    {
        clock($data_kdcdailycoalgettings = KdcDailyCoalgetting ::select(
            'id',
            'ticket_number',
            'company',
            'room',
            'date_time',
            'dt',
            'pit',
            'area',
            'seam',
            'exa',
            'capa',
            'coal_brand',
            'penalty',
            'tanggal',
            'shift',
            'jam',
        )
            ->where('tanggal', '=', '2022-03-01')
            ->get()->toArray());


        json_encode($data_kdcdailycoalgettings);
        return view('KdcDailyCoalgetting.data_excel', ['json_data_kdcdailycoalgettings' => $data_kdcdailycoalgettings]);
    }
}
