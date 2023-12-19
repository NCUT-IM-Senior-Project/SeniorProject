<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryClientDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_order_id',
        'name',
        'specification',
        'quantity',
        'weight',
        'description',
    ];

    //送貨單
    public function deliveryOrder()
    {
        return $this->belongsTo(DeliveryOrder::class);
    }
}
