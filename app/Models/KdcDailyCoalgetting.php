<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KdcDailyCoalgetting extends Model
{
    use HasFactory;

    protected $fillable = [
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
    ];
}
