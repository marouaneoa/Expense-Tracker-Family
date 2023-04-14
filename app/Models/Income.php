<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function income_category()
    {
        return $this->belongsTo(IncomeCategory::class, 'income_category_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($income) {
            $income->user->updateTotalIncome();
        });

        static::deleted(function ($income) {
            $income->user->updateTotalIncome();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
