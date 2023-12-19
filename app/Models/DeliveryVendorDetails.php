<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryVendorDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_order_id',
        'specification',
        'quantity',
        'main_color',
        'work_number',
        'description',
    ];

    //送貨單
    public function deliveryOrder()
    {
        return $this->belongsTo(DeliveryOrder::class);
    }
}
