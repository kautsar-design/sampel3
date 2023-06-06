<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekamedis extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'address',
        'weight',
        'height',
        'complaint',
        'tension',
        'temperature',
        'title',
        'obat_id',
        'total',
        'ruanginap_id',
        'action',
    ];
}
