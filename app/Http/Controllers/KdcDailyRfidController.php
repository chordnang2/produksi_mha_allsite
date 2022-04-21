<?php

namespace App\Http\Controllers;

use App\Models\KdcDailyRfid;
use Illuminate\Http\Request;

use App\Imports\KdcDailyRfidsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreKdcDailyRfidRequest;
use App\Http\Requests\UpdateKdcDailyRfidRequest;

class KdcDailyRfidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @param  \App\Http\Requests\StoreKdcDailyRfidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKdcDailyRfidRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KdcDailyRfid  $kdcDailyRfid
     * @return \Illuminate\Http\Response
     */
    public function show(KdcDailyRfid $kdcDailyRfid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KdcDailyRfid  $kdcDailyRfid
     * @return \Illuminate\Http\Response
     */
    public function edit(KdcDailyRfid $kdcDailyRfid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKdcDailyRfidRequest  $request
     * @param  \App\Models\KdcDailyRfid  $kdcDailyRfid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKdcDailyRfidRequest $request, KdcDailyRfid $kdcDailyRfid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KdcDailyRfid  $kdcDailyRfid
     * @return \Illuminate\Http\Response
     */
    public function destroy(KdcDailyRfid $kdcDailyRfid)
    {
        //
    }

    public function excel_import()
    {
        return view('KdcDailyRfids.import_excel');
    }
    public function excel_store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new KdcDailyRfidsImport, $file);

        return back()->withStatus('Excel file import berhasil!');
    }
    public function excel_data()
    {
        return view('KdcDailyRfids.data_excel');
    }
}
