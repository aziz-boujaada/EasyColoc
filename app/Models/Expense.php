<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
     use HasFactory ;

     protected $fillable = [
        'title',
        'amount',
        'expense_date',
        'colocation_id',
        'payer_id',
        'category_id'
     ];

     public function colocation()
    {
        return $this->belongsTo(Colocation::class, 'colocation_id');
    }

    public function payer()
    {
        return $this->belongsTo(User::class, 'payer_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
