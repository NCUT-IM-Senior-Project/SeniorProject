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
        'status',
    ];
// 避免預設日期時間戳
    public $timestamps = false;

    // 定義日期時間欄位
    protected $dates = [
        'scheduled_at',
        'shipment_at',
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

    //送貨單明細(廠商)
    public function deliveryVendorDetail()
    {
        return $this->hasOne(DeliveryVendorDetail::class, 'delivery_order_id');
    }

    //送貨單明細(客戶)
    public function deliveryClientDetail()
    {
        return $this->hasOne(DeliveryClientDetail::class, 'delivery_order_id');
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
