<?php

namespace App\Imports;

use App\Models\KdcSims0305;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class KdcSims0305Import implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new KdcSims0305([
            'ticket_number' => $row[0],
            'company' => $row[1],
            'room' => $row[2],
            'date_time' => $row[3],
            'dt' => $row[4],
            'pit' => $row[5],
            'area' => $row[6],
            'seam' => $row[7],
            'exa' => $row[8],
            'capa' => $row[9],
            'coal_brand' => $row[10],
            'penalty' => $row[11],
            'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12]),
            'shift' => $row[13],
            'jam' => $row[14],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
