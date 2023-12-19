<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanStatus extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    //配送單
    public function deliveryServiceOrders()
    {
        return $this->hasMany(DeliveryServiceOrder::class);
    }
}
