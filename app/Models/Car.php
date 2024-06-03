<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    // 避免預設日期時間戳
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

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
        return $this->belongsTo(User::class, 'driver_id');
    }

    //配送單
    public function deliveryServiceOrders()
    {
        return $this->hasMany(DeliveryServiceOrder::class);
    }
}
