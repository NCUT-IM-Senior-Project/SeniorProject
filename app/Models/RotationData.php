<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RotationData extends Model
{
    use HasFactory;

    protected $fillable = [
        'rotation_list_id',
        'driver_id',
        'start_at',
        'end_at',
    ];

    //使用者
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //輪值名單
    public function rotationList()
    {
        return $this->belongsTo(RotationList::class, 'rotation_list_id');
    }
}
