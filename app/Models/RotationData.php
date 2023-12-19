<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RotationData extends Model
{
    use HasFactory;

    protected $fillable = [
        'rotation_list_id',
        'driver_id',
        'date',
    ];
}
