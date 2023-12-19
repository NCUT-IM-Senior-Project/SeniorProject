<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'keynote',
        'car_id',
        'driver_id',
        'plan_id',
        'departure_at',
        'return_at',
        'created_by',
    ];
}
