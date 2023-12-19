<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrderStatus extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    //送貨單
    public function deliveryOrders()
    {
        return $this->hasMany(DeliveryOrder::class);
    }
}
