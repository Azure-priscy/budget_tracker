<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'category_id',
        'amount',
        'transaction_date',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
