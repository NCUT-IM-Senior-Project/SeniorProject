<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RotationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
    ];

    //輪值資料
    public function rotationData()
    {
        return $this->hasMany(RotationData::class);
    }

    //客戶
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    //廠商
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
