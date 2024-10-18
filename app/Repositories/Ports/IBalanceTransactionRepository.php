<?php

namespace App\Repositories\Ports;

use App\Models\BalanceTransaction;

interface IBalanceTransactionRepository
{
    public function save(BalanceTransaction $balanceTransaction);
}
