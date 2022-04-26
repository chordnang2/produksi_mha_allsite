<?php

namespace App\Http\Controllers;

use App\Models\KdcDaily0301;
use Illuminate\Http\Request;
use App\Imports\KdcDaily0301Import;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreKdcDaily0301Request;
use App\Http\Requests\UpdateKdcDaily0301Request;

class KdcDaily0301Controller extends Controller
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
     * @param  \App\Http\Requests\StoreKdcDaily0301Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKdcDaily0301Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KdcDaily0301  $kdcDaily0301
     * @return \Illuminate\Http\Response
     */
    public function show(KdcDaily0301 $kdcDaily0301)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KdcDaily0301  $kdcDaily0301
     * @return \Illuminate\Http\Response
     */
    public function edit(KdcDaily0301 $kdcDaily0301)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKdcDaily0301Request  $request
     * @param  \App\Models\KdcDaily0301  $kdcDaily0301
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKdcDaily0301Request $request, KdcDaily0301 $kdcDaily0301)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KdcDaily0301  $kdcDaily0301
     * @return \Illuminate\Http\Response
     */
    public function destroy(KdcDaily0301 $kdcDaily0301)
    {
        //
    }


    // 

    public function excel_import()
    {
        return view('kdcdaily0301_importexcel');
    }
    public function excel_store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new KdcDaily0301Import, $file);

        return back()->withStatus('Excel file import berhasil!');
    }
    public function excel_data()
    {
        clock($data_kdcdaily0301 = KdcDaily0301::select(
            'id',
            'ticket_number',
            'brand',
            'silo',
            'date_time',
            'tractor',
            'driver',
            'vessel1',
            'vessel2',
            'capa1',
            'capa2',
            'company',
            'silo_2',
            'tgl_rfid',
            'jam',
            'shift',
            'ton',
            'group',
            'tgl_tmst',
        )
            ->where('tgl_rfid', '=', '2022-03-01')
            ->get()->toArray());


        json_encode($data_kdcdaily0301);
        return view('kdcdaily0301_dataexcel', ['json_data_kdcdaily0301' => $data_kdcdaily0301]);
    }

}
