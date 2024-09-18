<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'name',
        'address',
        'land_line',
        'fax',
        'description',
    ];

    //輪值資料
    public function rotationData()
    {
        return $this->hasOne(RotationData::class);
    }

    //輪值名單
    public function rotationLists()
    {
        return $this->hasMany(RotationList::class);
    }

    //聯絡人
    public function contactPerson()
    {
        return $this->hasMany(ContactPerson::class, 'partner_id');
    }

    //需求資料
    public function requirementData()
    {
        return $this->hasMany(RequirementItem::class, 'partner_id');
    }

    //送貨單
    public function deliveryOrder()
    {
        return $this->hasMany(DeliveryOrder::class);
    }

    public function requirementItems()
    {
        return $this->belongsToMany(RequirementItem::class, 'requirement_item_vendor', 'vendor_id', 'requirement_item_id');
    }
}
