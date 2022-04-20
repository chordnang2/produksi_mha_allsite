<?php

namespace App\Imports;

use App\Models\Rfid;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class RfidsImport implements ToModel, WithStartRow, WithMultipleSheets,WithCalculatedFormulas
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function sheets(): array
    {
        return [
            'ENTRY RFID' => new RfidsImport(),
        ];
    }
    public function model(array $row)
    {
        return new Rfid([
            'ticket_number' => $row[1],
            'brand' => $row[2],
            'silo' => $row[3],
            'date_time' => $row[4],
            'tractor' => $row[5],
            'driver' => $row[6],
            // 'vessel1' => $row[7],
            // 'vessel2' => $row[8],
            // 'capa1' => $row[9],
            // 'capa2' => $row[10],
            // 'company' => $row[11],
            // 'silo_2' => $row[12],
            // 'tgl_rfid' => $row[13],
            // 'jam' => $row[14],
            // 'shift' => $row[15],
            // 'ton' => $row[9]+$row[10],
            // 'group' => $row[17],
            // 'tgl_tmst' => $row[18],
        ]);
    }
    public function startRow(): int
    {
        return 5;
    }
}
