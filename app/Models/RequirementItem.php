<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementItem extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    //需求資料
    public function requirementData()
    {
        return $this->hasMany(RequirementData::class);
    }
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'requirement_item_vendor', 'requirement_item_id', 'vendor_id');
    }
}
