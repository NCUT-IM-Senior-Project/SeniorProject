<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'keynote',
        'partner_id',
        'order_number',
        'logistics_id',
        'scheduled_at',
        'shipment_at',
        'delivery_status_id',
        'created_by',
    ];

    //使用者
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    //廠商
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    //客戶
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // 廠商或客戶
    public function partner()
    {
        return $this->belongsTo('App\Models\Vendor', 'partner_id', 'id')
            ->orWhere('App\Models\Client', 'partner_id', 'id');
    }

    //送貨單明細(廠商)
    public function deliveryVendorDetails()
    {
        return $this->hasMany(DeliveryVendorDetails::class);
    }

    //送貨單明細(客戶)
    public function deliveryClientDetails()
    {
        return $this->hasMany(DeliveryClientDetails::class);
    }

    //物流類型
    public function logistic()
    {
        return $this->belongsTo(Logistic::class, 'logistics_id', 'id');

    }

    //送貨單狀態
    public function deliveryOrderStatus()
    {
        return $this->belongsTo(DeliveryOrderStatus::class, 'delivery_status_id', 'id');
    }

    //配送排程明細
    public function deliveryPlanDetails()
    {
        return $this->hasOne(DeliveryPlanDetails::class);
    }

}
