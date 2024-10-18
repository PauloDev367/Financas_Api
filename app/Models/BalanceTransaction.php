<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceTransaction extends Model
{
    protected $table = "balance_transaction";

    public function balance()
    {
        return $this->belongsTo(Balance::class, 'balance_id');
    }
}
