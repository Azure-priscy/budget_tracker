<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class budget extends Model
{
    protected $fillable = [
        'category_id',
        'monthly_limit',
        'start_date',
        'end_date',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
