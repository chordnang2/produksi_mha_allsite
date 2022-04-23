<?php

namespace App\Http\Controllers;

use App\Models\KdcDailyRfid;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\KdcDailyCoalgetting;
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
        clock($data_kdcdailyrfids = KdcDailyRfid::select(
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


        json_encode($data_kdcdailyrfids);
        return view('KdcDailyRfids.data_excel', ['json_data_kdcdailyrfids' => $data_kdcdailyrfids]);
    }

    public function dashboard()
    {
        $tanggal = '2022-03-01';
        $KdcDailyRfids['tonase_shift1'] = KdcDailyRfid::where('tgl_rfid', '=', $tanggal)
            ->where('shift', 'I')
            ->sum('ton');
        $KdcDailyRfids['tonase_shift2'] = KdcDailyRfid::where('tgl_rfid', '=', $tanggal)
            ->where('shift', 'II')
            ->sum('ton');
        $KdcDailyRfids['tonase_shift3'] = KdcDailyRfid::where('tgl_rfid', '=', $tanggal)
            ->where('shift', 'III')
            ->sum('ton');
        // DB::enableQueryLog();

        $KdcDailyRfids['ritasi_shift1'] = KdcDailyRfid::where('tgl_rfid', '=', $tanggal)
            ->where('shift', '=', 'I')
            ->count('id');
        $KdcDailyRfids['ritasi_shift2'] = KdcDailyRfid::where('tgl_rfid', '=', $tanggal)
            ->where('shift', '=', 'II')
            ->count('id');
        $KdcDailyRfids['ritasi_shift3'] = KdcDailyRfid::where('tgl_rfid', '=', $tanggal)
            ->where('shift', '=', 'III')
            ->count('id');

        // dd(DB::getQueryLog());

        $KdcDailyCoalgetting['tonase_day'] = KdcDailyCoalgetting::where('tanggal', '=', $tanggal)
            ->where('shift', '=', 'Day')
            ->sum('capa');
        $KdcDailyCoalgetting['tonase_night'] = KdcDailyCoalgetting::where('tanggal', '=', $tanggal)
            ->where('shift', '=', 'Night')
            ->sum('capa');

        $KdcDailyCoalgetting['ritasi_day'] = KdcDailyCoalgetting::where('tanggal', '=', $tanggal)
            ->where('shift', '=', 'Day')
            ->count('id');
        $KdcDailyCoalgetting['ritasi_night'] = KdcDailyCoalgetting::where('tanggal', '=', $tanggal)
            ->where('shift', '=', 'Night')
            ->count('id');

        $KdcDailyCoalgetting['hm_day'] = KdcDailyCoalgetting::where('tanggal', '=', $tanggal)
            ->where('shift', '=', 'Day')
            ->sum('jam');
        $KdcDailyCoalgetting['hm_night'] = KdcDailyCoalgetting::where('tanggal', '=', $tanggal)
            ->where('shift', '=', 'Night')
            ->sum('jam');

        // dd($KdcDailyCoalgetting);
        return view('KdcDailyRfids.dashboard', compact('KdcDailyRfids', 'KdcDailyCoalgetting', 'tanggal'));
    }
}
