<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }
    public function incomes()
    {
        return $this->hasMany(Income::class);
    }
    public function expenses()
    {
    return $this->hasMany(Expense::class);
    }
    public function totalIncome()
    {
        return $this->incomes()->sum('amount');
    }
    public function totalExpenses()
    {
        return $this->expenses()->sum('amount');
    }
    public function updateTotalIncome()
    {
        $this->total_income = $this->totalIncome();
        $this->save();
    }
    public function updateTotalExpenses()
    {
        $this->total_expenses = $this->totalExpenses();
        $this->save();
    }
    public function subusers()
    {
        return $this->hasMany(User::class, 'parent_user_id');
    }
    public function balance()
{
    $totalIncome = $this->total_income;
    $totalExpenses = $this->total_expenses;

    return $totalIncome - $totalExpenses;
}
public function incomeCategories()
{
    return $this->hasMany(IncomeCategory::class);
}
public function globalBalance()
{
    $balance = $this->balance();

    foreach ($this->subUsers as $subUser) {
        $balance += $subUser->balance();
    }

    return $balance;
}
public function transfersSent()
{
    return $this->hasMany(Transfer::class, 'sender_id');
}

public function transfersReceived()
{
    return $this->hasMany(Transfer::class, 'receiver_id');
}

}
