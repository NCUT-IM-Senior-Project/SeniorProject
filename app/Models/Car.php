<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'number',
        'brand',
        'color',
        'type',
        'Oils',
        'tonnage',
        'tailgate',
        'driver_id',
    ];

    //使用者
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //配送單
    public function deliveryServiceOrders()
    {
        return $this->hasMany(DeliveryServiceOrder::class);
    }
}
