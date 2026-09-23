<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public const TYPE_INCOME = 'income';
    public const TYPE_EXPENSE = 'expense';
    
    protected $fillable = [
                'name',
                'type',
            ];


    public function budgets()
{
    return $this->hasMany(Budget::class);
}

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
