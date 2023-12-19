<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementData extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'vendor_client_id',
        'requirement_id',
    ];

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

    //需求項目
    public function requirementItem()
    {
        return $this->belongsTo(RequirementItem::class);
    }
}
