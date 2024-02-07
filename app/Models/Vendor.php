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

    //聯絡人
    public function contactPerson()
    {
        return $this->hasMany(ContactPerson::class);
    }

    //需求資料
    public function requirementData()
    {
        return $this->hasMany(RequirementData::class);
    }

    //送貨單
    public function deliveryOrder()
    {
        return $this->hasMany(DeliveryOrder::class);
    }
}
