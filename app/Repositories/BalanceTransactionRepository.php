<?php

namespace App\Repositories;

use App\Models\BalanceTransaction;
use App\Repositories\Ports\IBalanceTransactionRepository;

class BalanceTransactionRepository implements IBalanceTransactionRepository
{

    public function save(BalanceTransaction $balanceTransaction)
    {
        $balanceTransaction->save();
        return $balanceTransaction;
    }
}
