<?php

namespace App\Repositories\Ports;

use App\Models\Balance;

interface IBalanceRepository
{
    public function getAccountInfo(int $userId);
}
