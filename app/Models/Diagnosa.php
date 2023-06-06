<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $fillable = [
        'pasien_id',
        'tension',
        'temperature',
        'title',
        'ruanginap_id',
        'obat_id',
        'slug',
        'action',
        ];
}
