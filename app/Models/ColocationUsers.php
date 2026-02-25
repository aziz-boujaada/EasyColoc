<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColocationUsers extends Model
{
    use HasFactory ; 

    protected $fillable = [
        'user_id',
        'colocation_id',
        'role',
    ];
}
