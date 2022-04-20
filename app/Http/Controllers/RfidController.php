<?php

namespace App\Http\Controllers;

use App\Models\Rfid;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreRfidRequest;
use App\Http\Requests\UpdateRfidRequest;
use App\Imports\RfidsImport;

class RfidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
     * @param  \App\Http\Requests\StoreRfidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRfidRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rfid  $rfid
     * @return \Illuminate\Http\Response
     */
    public function show(Rfid $rfid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rfid  $rfid
     * @return \Illuminate\Http\Response
     */
    public function edit(Rfid $rfid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRfidRequest  $request
     * @param  \App\Models\Rfid  $rfid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRfidRequest $request, Rfid $rfid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rfid  $rfid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rfid $rfid)
    {
        //
    }


    // excel

    public function excel_import()
    {
        return view('rfids.import_excel');
    }
    public function excel_store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new RfidsImport, $file);

        return back()->withStatus('Excel file import berhasil!');
    }
}
