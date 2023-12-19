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

    //使用者
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //配送排程明細
    public function deliveryPlanDetails()
    {
        return $this->hasMany(DeliveryPlanDetails::class);
    }

    //排程狀態
    public function planStatus()
    {
        return $this->belongsTo(PlanStatus::class);
    }

    //車輛
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
