<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'name',
        'phone',
    ];

    //廠商
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    //客戶
    public function client()
    {
        return $this->belongsTo(Client::class, 'partner_id', 'id');
    }
}
