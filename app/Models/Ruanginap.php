<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruanginap extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_room',
        'status',
    ];
}
