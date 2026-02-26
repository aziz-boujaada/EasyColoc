<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Colocation extends Model
{
    use HasFactory ; 


    protected $fillable = [
        'name' ,
        'owner_id',
        'status',
    ];

    public function users():BelongsToMany{
         return $this->belongsToMany(User::class , 'colocation_user')
         ->using(ColocationUsers::class)
         ->withPivot(['role','left_at']);
    }

    public function owner(){
        return $this->belongsTo(User::class , 'owner_id');
    }

    public function members(){
        return $this->users();
    }
}
