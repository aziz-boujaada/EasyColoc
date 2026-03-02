<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory ; 

    protected $fillable = [
        'expense_id',
        'colocations_id',
        'from_user_id',
        'to_user_id',
        'amount',
        'paid_at'
    ];

public function expense()
{
    return $this->belongsTo(Expense::class);
}
public function from_user()
{
    return $this->belongsTo(User::class, 'from_user_id');
}

public function to_user()
{
    return $this->belongsTo(User::class, 'to_user_id');
}
}
