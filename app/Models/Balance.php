<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = "balances";

    public function balanceTransactions()
    {
        return $this->hasMany(BalanceTransaction::class, 'balance_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
