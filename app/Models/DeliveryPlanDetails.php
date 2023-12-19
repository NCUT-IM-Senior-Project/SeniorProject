<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPlanDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_service_id',
        'delivery_order_id',
        'sequence',
        'plans_details_status_id',
        'departure_at',
        'arrival_at',
        'start_unload_at',
        'end_unload_at',
        'pictrue',
    ];
}
