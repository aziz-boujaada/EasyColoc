<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ColocationUsers extends Pivot
{
    use HasFactory ; 

    protected $fillable = [
        'user_id',
        'colocation_id',
        'role',
    ];


     public function user(){
        return $this->belongsTo(User::class);
    }
    public function colocation(){
        return $this->belongsTo(Colocation::class);
    }
}
