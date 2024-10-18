<?php

namespace App\Repositories;

use App\Models\Balance;
use App\Repositories\Ports\IBalanceRepository;

class BalanceRepository implements IBalanceRepository
{
    public function getAccountInfo(int $userId)
    {
        return Balance::where("user_id", $userId)->first();
    }
}
