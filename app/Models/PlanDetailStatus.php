<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDetailStatus extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    //配送排程明細
    public function deliveryPlanDetails()
    {
        return $this->hasMany(DeliveryPlanDetails::class);
    }
}
