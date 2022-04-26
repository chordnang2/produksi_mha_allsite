<?php

namespace App\Imports;

use App\Models\KdcDaily0301;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class KdcDaily0301Import implements ToModel,WithStartRow,WithCalculatedFormulas
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new KdcDaily0301([
            'ticket_number' => $row[0],
            'brand' => $row[1],
            'silo' => $row[2],
            'date_time' => $row[3],
            'tractor' => $row[4],
            'driver' => $row[5],
            'vessel1' => $row[6],
            'vessel2' => $row[7],
            'capa1' => $row[8],
            'capa2' => $row[9],
            'company' => $row[10],
            'silo_2' => $row[11],
            'tgl_rfid' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12]),
            'jam' => $row[13],
            'shift' => $row[14],
            'ton' => $row[15],
            'group' => $row[16],
            'tgl_tmst' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[17]),
        ]);
    }
    public function startRow(): int
    {
        return 4;
    }
}
