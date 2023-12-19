<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    // 關閉自動更新時間戳記
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    //使用者
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
