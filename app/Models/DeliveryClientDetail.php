<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryClientDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_order_id',
        'name',
        'specification',
        'quantity',
        'weight',
        'description',
        'status',
    ];

    //送貨單
    public function deliveryOrder()
    {
        return $this->belongsTo(DeliveryOrder::class);    }
}
