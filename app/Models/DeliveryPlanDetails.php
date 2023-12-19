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

    //送貨單
    public function deliveryOrder()
    {
        return $this->belongsTo(DeliveryOrder::class);
    }

    //排程細項狀態
    public function planDetailStatus()
    {
        return $this->belongsTo(PlanDetailStatus::class);
    }

    //配送單
    public function deliveryServiceOrder()
    {
        return $this->belongsTo(DeliveryServiceOrder::class);
    }
}
