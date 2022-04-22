<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KdcDailyRfid extends Model
{
    use HasFactory;
    // protected $connection = 'sqlite';

    protected $fillable = [
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
    ];
}
