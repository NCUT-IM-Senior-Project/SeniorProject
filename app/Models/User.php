<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'description',
        'status',
        'permission_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //權限
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    //輪值資料
    public function rotationData()
    {
        return $this->hasMany(RotationData::class);
    }

    //車輛
    public function car()
    {
        return $this->hasMany(Car::class);
    }

    //配送單
    public function deliveryServiceOrder()
    {
        return $this->hasMany(DeliveryServiceOrder::class);
    }

    //送貨單
    public function deliveryOrder()
    {
        return $this->hasMany(DeliveryOrder::class);
    }
}
