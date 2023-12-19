<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'keynote',
        'vendor_client_id',
        'order_number',
        'logistics_id',
        'scheduled_at',
        'shipment_at',
        'delivery_status_id',
        'created_by',
    ];
}
