<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RotationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'verdor_client_id',
    ];
}
